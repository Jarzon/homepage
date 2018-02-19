<?php
namespace Homepage\BasePack\Controller;

use Prim\Controller;

use Jarzon\Cache;
use Jarzon\Capture;

class Home extends Controller
{
    public function index()
    {
        // TODO: Link to your github profile

        // TODO: replace links text by a image a chain for the website link an github icon for the repo

        $cache = new Cache([
            'options' => ['cache_folder' => $this->options['app'].'cache/']
        ]);

        $projects = [
            ['Libellum', ['http://libellum.localhost/', 'https://libellum.ca/', 'https://github.com/Jarzon/Libellum/']],
            ['JV', ['http://webagency.localhost/', 'https://jasonvaillancourt.ca/', 'https://github.com/Jarzon/webagency/']],
            ['MasterJ', ['http://masterj.localhost/', 'https://masterj.net/', 'https://github.com/Jarzon/Masterj/']],
            ['Tasks', ['http://tasks.localhost/', 'https://tasks.masterj.net/', 'https://github.com/Jarzon/Tasks/']],
            ['Game', ['http://localhost/game/', 'https://www.masterj.net/game/', 'https://github.com/Jarzon/RPG/']],
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
            $cache->registerCache($name, 3600, function($name) use($capture, $urls) {
                $capture->screenshot($urls[0], "{$this->options['app']}cache/preview/$name.png", false);

                return true;
            });
        }

        foreach ($phpunit as $name) {
            $cache->registerCache($name, 3600, function($name) use($capture) {
                $capture->screenshot("http://localhost/phpunit/$name/", "{$this->options['app']}cache/preview/$name.png", false);

                return true;
            });
        }

        $this->render('index', 'BasePack', [
            'projects' => $projects,
            'phpunit' => $phpunit
        ]);
    }
}
