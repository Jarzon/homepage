<?php
namespace Homepage\BasePack\Service;

class Builder
{
    protected $projects = [];
    protected $lastProject = [];
    protected $editor = '';

    public function __construct(string $editor)
    {
        $this->editor = $editor;
    }

    public function add(string $name)
    {
        $project = new Project($name);
        $this->projects[$name] = $project;
        $this->lastProject = $name;

        return $project;
    }

    public function getProjects() : array
    {
        return $this->projects;
    }
}