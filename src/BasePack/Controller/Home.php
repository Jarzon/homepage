<?php
namespace Homepage\BasePack\Controller;

use Prim\Controller;

use Jarzon\Cache;
use Jarzon\Capture;

class Home extends Controller
{
    protected function getBuilder()
    {
        return include("{$this->options['app']}config/projects.php");
    }

    public function index()
    {
        $cache = new Cache([
            'cache_folder' => "{$this->options['app']}cache/"
        ]);

        $projects = $this->getBuilder()->getProjects();

        $capture = new Capture([
            'chrome_path' => (Capture::isWindows())? "\"{$this->options['chrome_path']}\"": $this->options['chrome_path']
        ]);

        foreach ($projects as $name => $project) {
            $cache->registerBatchCache('projects', $name, 3600, function($name) use($capture, $project) {
                $location = $project->dev;

                // Since chrome headless doesn't have a profile, self generated cert won't be accepted, so replace https by http
                if(strpos($location, 'localhost') !== false) {
                    $location = str_replace('https', 'http', $location);
                }

                $capture->screenshot($location, "{$this->options['root']}public/img/preview/$name.png");

                return true;
            });
        }

        $this->render('index', 'BasePack', [
            'projects' => $projects
        ]);
    }

    public function open($projectName)
    {
        $builder = $this->getBuilder();

        $projects = $builder->getProjects();

        if(!isset($projects[$projectName])) {
            exit;
        }

        $output = '';

        $quote = '"';

        if(Capture::isWindows()) {
            $quote = '\\"';
        }

        $cmd = "$quote{$this->options['editor']}$quote {$projects[$projectName]->location}";

        if(Capture::isWindows()) {
            shell_exec("SCHTASKS /F /Create /TN _tempcmd /TR \"$cmd\" /SC DAILY /RU INTERACTIVE");
            shell_exec('SCHTASKS /RUN /TN "_tempcmd"');
            shell_exec('SCHTASKS /DELETE /TN "_tempcmd" /F');
        } else {
            exec($cmd, $output);
        }
    }
}
