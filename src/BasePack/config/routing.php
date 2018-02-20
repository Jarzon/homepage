<?php
/**
 * @var $this \Prim\Router
 */
$this->get('/[{project:.+}]', 'BasePack\Home', 'index');