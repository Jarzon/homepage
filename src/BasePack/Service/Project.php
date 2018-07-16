<?php
namespace Homepage\BasePack\Service;

class Project
{
    public $name = '',
        $dev = null,
        $prod = null,
        $github = null,
        $location = null,
        $phpunit = null;

    public function __construct(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function dev(string $location)
    {
        $this->dev = $location;

        return $this;
    }

    public function prod(string $location)
    {
        $this->prod = $location;

        return $this;
    }

    public function location(string $location)
    {
        $this->location = $location;

        return $this;
    }

    public function github(string $location)
    {
        $this->github = "https://github.com/$location";

        return $this;
    }

    public function phpunit(string $location)
    {
        $this->phpunit = "https://localhost/phpunit/$location";

        return $this;
    }
}