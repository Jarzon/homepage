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
        $projects = $this->getBuilder()->getProjects();

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
