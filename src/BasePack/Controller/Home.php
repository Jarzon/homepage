<?php
namespace Homepage\BasePack\Controller;

use Prim\Controller;
use Homepage\BasePack\Service\Capture;

class Home extends Controller
{
    public function index()
    {
        $projects = [
            ['Libellum', ['http://libellum.localhost/', 'https://libellum.ca/', 'https://github.com/Jarzon/Libellum/']]
        ];

        $capture = new Capture();

        foreach ($projects as list($name, $urls)) {
            $capture->screenshot($urls[0], "{$this->options['app']}cache/preview/$name.png", false);
        }

        $this->render('index', 'BasePack', [
            'projects' => $projects
        ]);
    }
}
