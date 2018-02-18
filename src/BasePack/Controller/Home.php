<?php
namespace Homepage\BasePack\Controller;

use Prim\Controller;
use Jarzon\Capture;

class Home extends Controller
{
    public function index()
    {
        $projects = [
            ['Libellum', ['http://libellum.localhost/', 'https://libellum.ca/', 'https://github.com/Jarzon/Libellum/']]
        ];

        $capture = new Capture([
            'chrome_path' => (Capture::isWindows())? '"C:/Program Files (x86)/Google/Chrome/Application/chrome.exe"': '/usr/bin/google-chrome'
        ]);

        foreach ($projects as list($name, $urls)) {
            $capture->screenshot($urls[0], "{$this->options['app']}cache/preview/$name.png", false);
        }

        $this->render('index', 'BasePack', [
            'projects' => $projects
        ]);
    }
}
