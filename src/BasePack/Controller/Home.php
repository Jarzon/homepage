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
        // TODO: replace links text by a image a chain for the website link an github icon for the repo

        $cache = new Cache([
            'cache_folder' => "{$this->options['app']}cache/"
        ]);

        $projects = $this->getBuilder()->getProjects();

        $capture = new Capture([
            'chrome_path' => (Capture::isWindows())? '"C:/Program Files (x86)/Google/Chrome/Application/chrome.exe"': '/usr/bin/google-chrome'
        ]);

        foreach ($projects as $name => $project) {
            $cache->registerBatchCache('projects', $name, 3600, function($name) use($capture, $project) {
                $capture->screenshot($project->dev, "{$this->options['root']}public/img/preview/$name.png");

                return true;
            });
        }

        $this->render('index', 'BasePack', [
            'projects' => $projects
        ]);
    }

    function execInBackground($cmd) {
        if (substr(php_uname(), 0, 7) == "Windows"){
            pclose(popen("start /B ". $cmd, "r"));
        }
        else {
            exec($cmd . " > /dev/null &");
        }
    }

    public function isWindows() : bool
    {
        return substr(php_uname(), 0, 7) === "Windows";
    }

    public function exec(string $cmd, bool $async = true) : array
    {
        $stdout = '';
        if(!$this->isWindows() && $async) {
            $stdout = " > /dev/null &";
        }

        $output = [];

        if ($this->isWindows() && $async) {
            pclose(popen("start /B ". $cmd, "r"));
        } else {
            exec($cmd . $stdout, $output);
        }

        return $output;
    }

    public function open($projectName)
    {
        $builder = $this->getBuilder();

        $projects = $builder->getProjects();

        if(!isset($projects[$projectName])) {
            exit;
        }

        $output = '';

        $cmd = "\"$builder->editor\" \"{$projects[$projectName]->location}\"";

        exec($cmd, $output);

        var_dump($output);
    }
}
