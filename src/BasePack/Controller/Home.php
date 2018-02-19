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
            'cache_folder' => "{$this->options['app']}cache/"
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

        $pastProjects = [
            ['Berlos', ['http://localhost/archived/Berlos/', 'https://github.com/Jarzon/Berlos/']],
            ['JVA', ['http://localhost/archived/JVA/index.htm', 'https://github.com/Jarzon/JVA/']],
            ['Assur-Info', ['http://localhost/archived/assur-info/web/app.php/', 'https://github.com/Jarzon/Assur-Info/']],
            ['Assur-Price', ['http://localhost/archived/assur-price/web/', 'https://github.com/Jarzon/Assur-Price/']],
            ['Dragon-Lord', ['http://localhost/archived/Dragon-Lord/web/', 'https://github.com/Jarzon/dragon-lord/']],
            ['ebl', ['http://localhost/archived/ebl/web/', 'https://github.com/Jarzon/ebl/']],
            ['stats', ['http://localhost/archived/stats/', 'https://github.com/Jarzon/stats/']],
        ];

        $motds = [
            ['motd', ['http://motd.localhost/', 'https://github.com/Jarzon/motd/']],
            ['PAP', ['http://ub.localhost/', 'https://github.com/Jarzon/Berlos/']],
            ['Yoshi3', ['http://yoshi3.localhost/', 'https://github.com/Jarzon/JVA/']],
            ['Omnis', ['http://oh.localhost/', 'https://github.com/Jarzon/Assur-Info/']],
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

        foreach ($pastProjects as list($name, $urls)) {
            $cache->registerCache($name, 3600, function($name) use($capture, $urls) {
                $capture->screenshot($urls[0], "{$this->options['app']}cache/preview/$name.png", false);

                return true;
            });
        }

        foreach ($motds as list($name, $urls)) {
            $cache->registerCache($name, 3600, function($name) use($capture, $urls) {
                $capture->screenshot($urls[0], "{$this->options['app']}cache/preview/$name.png", false);

                return true;
            });
        }

        $this->render('index', 'BasePack', [
            'projects' => $projects,
            'pastProjects' => $pastProjects,
            'phpunit' => $phpunit,
            'motds' => $motds
        ]);
    }
}
