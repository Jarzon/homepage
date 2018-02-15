<?php
namespace PrimBase\BasePack\Service;

use PrimPack\Container\Toolbar;
use Jarzon\Container\Localization;

class Container extends \Prim\Container
{
    use Localization;

    /**
     * Use this Class to add Services to the container; The joy of static Containers
     */

    /**
     * @return \Prim\Controller
     */
    public function getController(string $obj) : object
    {
        $this->parameters["$obj.class"] = $obj;

        //You can inject Services into the Controller like so:
        // return $this->init($obj, $this->getView(), $this, $this->getService());

        return $this->init($obj, $this->getView(), $this, $this->options, $this->getLocalizationService());
    }

    /**
     * @return \Prim\Controller
     */
    public function getErrorController() : object
    {
        $obj = 'errorController';

        return $this->init($obj, $this->getView(), $this, $this->options, $this->getLocalizationService());
    }
}