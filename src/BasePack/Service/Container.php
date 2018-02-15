<?php
namespace Homepage\BasePack\Service;

class Container extends \Prim\Container
{
    /**
     * @return \Prim\Controller
     */
    public function getController(string $obj) : object
    {
        $this->parameters["$obj.class"] = $obj;

        return $this->init($obj, $this->getView(), $this, $this->options);
    }

    /**
     * @return \Prim\Controller
     */
    public function getErrorController() : object
    {
        $obj = 'errorController';

        return $this->init($obj, $this->getView(), $this, $this->options);
    }
}