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

        $projects = [
            // Websites

            'Libellum' => [
                'location' => 'Libellum/',
                'dev' => 'http://libellum.localhost/',
                'prod' => 'https://libellum.ca/',
                'github' => 'https://github.com/Jarzon/Libellum/'
            ],
            'JV' => [
                'location' => 'webagency/',
                'dev' => 'http://webagency.localhost/',
                'prod' => 'https://jasonvaillancourt.ca/',
                'github' => 'https://github.com/Jarzon/webagency/'
            ],
            'MasterJ' => [
                'location' => 'masterj/',
                'dev' => 'http://masterj.localhost/',
                'prod' => 'https://masterj.net/',
                'github' => 'https://github.com/Jarzon/Masterj/'
            ],
            'Tasks' => [
                'location' => 'tasks/',
                'dev' => 'http://tasks.localhost/',
                'prod' => 'https://tasks.ca/',
                'github' => 'https://github.com/Jarzon/Tasks/'
            ],
            'Game' => [
                'location' => 'game/',
                'dev' => 'http://localhost/game/',
                'prod' => 'https://www.masterj.net/game/',
                'github' => 'https://github.com/Jarzon/RPG/'
            ],

            // Services

            'Prim' => [
                'location' => 'Services/Prim/',
                'dev' => 'http://localhost/phpunit/prim/',
                'github' => 'https://github.com/Jarzon/Prim/'
            ],
            'Cache' => [
                'location' => 'Services/Cache/',
                'dev' => 'http://localhost/phpunit/cache/',
                'github' => 'https://github.com/Jarzon/Cache/'
            ],
            'Forms' => [
                'location' => 'Services/Forms/',
                'dev' => 'http://localhost/phpunit/forms/',
                'github' => 'https://github.com/Jarzon/Forms/'
            ],
            'Localization' => [
                'location' => 'Services/Localization/',
                'dev' => 'http://localhost/phpunit/localization/',
                'github' => 'https://github.com/Jarzon/Localization/'
            ],
            'Pagination' => [
                'location' => 'Services/Pagination/',
                'dev' => 'http://localhost/phpunit/pagination/',
                'github' => 'https://github.com/Jarzon/Pagination/'
            ],
            'Capture' => [
                'location' => 'Services/capture/',
                'dev' => 'http://localhost/phpunit/capture/',
                'github' => 'https://github.com/Jarzon/Capture/'
            ],

            // Past Projects

            'Berlos' => [
                'location' => 'archived/Berlos/',
                'dev' => 'http://localhost/archived/Berlos/',
                'github' => 'https://github.com/Jarzon/Berlos/'
            ],
            'JVA' => [
                'location' => 'archived/JVA/',
                'dev' => 'http://localhost/archived/JVA/index.htm',
                'github' => 'https://github.com/Jarzon/JVA/'
            ],
            'Assur-Info' => [
                'location' => 'archived/assur-info/',
                'dev' => 'http://localhost/archived/assur-info/web/app.php/',
                'github' => 'https://github.com/Jarzon/Assur-Info/'
            ],
            'Assur-Price' => [
                'location' => 'archived/assur-price/',
                'dev' => 'http://localhost/archived/assur-price/web/',
                'github' => 'https://github.com/Jarzon/Assur-Price/'
            ],
            'Dragon-Lord' => [
                'location' => 'archived/dragon-lord/',
                'dev' => 'http://localhost/archived/Dragon-Lord/web/',
                'github' => 'https://github.com/Jarzon/dragon-lord/'
            ],
            'ebl' => [
                'location' => 'archived/ebl/',
                'dev' => 'http://localhost/archived/ebl/web/',
                'github' => 'https://github.com/Jarzon/ebl/'
            ],
            'stats' => [
                'location' => 'archived/stats/',
                'dev' => 'http://localhost/archived/stats/',
                'github' => 'https://github.com/Jarzon/stats/'
            ],

            // Motds

            'motd' => [
                'location' => 'motds/motd',
                'dev' => 'http://motd.localhost/',
                'github' => 'https://github.com/Jarzon/motd/'
            ],
            'PAP' => [
                'location' => 'motds/ub',
                'dev' => 'http://ub.localhost/',
                'github' => 'https://github.com/Jarzon/ub/'
            ],
            'Yoshi3' => [
                'location' => 'motds/yoshi3',
                'dev' => 'http://yoshi3.localhost/',
                'github' => 'https://github.com/Jarzon/yoshi3/'
            ],
            'Omnis' => [
                'location' => 'motds/omnishaven',
                'dev' => 'http://oh.localhost/',
                'prod' => 'https://www.masterj.net/game/',
                'github' => 'https://github.com/Jarzon/OmnisHaven/'
            ],
        ];

        $capture = new Capture([
            'chrome_path' => (Capture::isWindows())? '"C:/Program Files (x86)/Google/Chrome/Application/chrome.exe"': '/usr/bin/google-chrome'
        ]);

        foreach ($projects as $name => $infos) {
            $cache->registerBatchCache('projects', $name, 300, function($name) use($capture, $infos) {
                $capture->screenshot($infos['dev'], "{$this->options['root']}public/img/preview/$name.png", false);

                return true;
            });
        }

        $this->render('index', 'BasePack', [
            'projects' => $projects
        ]);
    }
}
