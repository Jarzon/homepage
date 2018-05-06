<?php
namespace Homepage\BasePack\Controller;

use Prim\Controller;

use Jarzon\Cache;
use Jarzon\Capture;

class Home extends Controller
{
    public function index()
    {
        // TODO: replace links text by a image a chain for the website link an github icon for the repo

        $cache = new Cache([
            'cache_folder' => "{$this->options['app']}cache/"
        ]);

        $projects = include("{$this->options['app']}config/projects.php");

        $capture = new Capture([
            'chrome_path' => (Capture::isWindows())? '"C:/Program Files (x86)/Google/Chrome/Application/chrome.exe"': '/usr/bin/google-chrome'
        ]);

        foreach ($projects as $name => $infos) {
            $cache->registerBatchCache('projects', $name, 3600, function($name) use($capture, $infos) {
                $capture->screenshot($infos['dev'], "{$this->options['root']}public/img/preview/$name.png");

                return true;
            });
        }

        $this->render('index', 'BasePack', [
            'projects' => $projects
        ]);
    }
}
