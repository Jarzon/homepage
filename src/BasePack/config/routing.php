<?php
/**
 * @var $this \Prim\Router
 */
$this->get('/', 'BasePack\Home', 'index');
$this->get('/open/{projectName:.+}', 'BasePack\Home', 'open');