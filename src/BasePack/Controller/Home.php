<?php
namespace Homepage\BasePack\Controller;

use Prim\Controller;
use Jarzon\Capture;

class Home extends Controller
{
    public function index()
    {
        $projects = [
            ['Libellum', ['http://libellum.localhost/', 'https://libellum.ca/', 'https://github.com/Jarzon/Libellum/']],
            ['JV', ['http://webagency.localhost/', 'https://jasonvaillancourt.ca/', 'https://github.com/Jarzon/webagency/']],
            ['MasterJ', ['http://masterj.localhost/', 'https://masterj.net/', 'https://github.com/Jarzon/Masterj/']],
            ['Tasks', ['http://tasks.localhost/', 'https://tasks.masterj.net/', 'https://github.com/Jarzon/Tasks/']],
        ];

        $phpunit = [
            'Prim',
            'Cache',
            'Forms',
            'Localization',
            'Pagination',
        ];

        $capture = new Capture([
            'chrome_path' => (Capture::isWindows())? '"C:/Program Files (x86)/Google/Chrome/Application/chrome.exe"': '/usr/bin/google-chrome'
        ]);

        foreach ($projects as list($name, $urls)) {
            $capture->screenshot($urls[0], "{$this->options['app']}cache/preview/$name.png", false);
        }

        foreach ($phpunit as $name) {
            $capture->screenshot("http://localhost/phpunit/$name/", "{$this->options['app']}cache/preview/$name.png", false);
        }

        $this->render('index', 'BasePack', [
            'projects' => $projects,
            'phpunit' => $phpunit
        ]);
    }
}
