<?php
namespace Homepage\BasePack\Controller;

use Prim\Controller;

/**
 * Class Home
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        $this->render('index');
    }
}
