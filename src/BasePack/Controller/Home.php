<?php
namespace Homepage\BasePack\Controller;

use Prim\Controller;

class Home extends Controller
{
    public function index()
    {
        $this->render('index');
    }
}
