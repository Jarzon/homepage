<?php
namespace Homepage\BasePack\Service;

class Capture
{
    protected $options;

    public function __construct(array $options = [])
    {
        $this->options = $options += [
            'root' => ''
        ];
    }

    public function screenshot(string $url, string $destination, $async = true)
    {
        $flags = "--hide-scrollbars --screenshot=\"{$destination}\"";

        return $this->buildCommand($flags, $url, $async);
    }

    public function pdf(string $url, string $destination, $async = true) : array
    {
        $flags = "--print-to-pdf=\"{$destination}\"";

        return $this->buildCommand($flags, $url, $async);
    }

    private function buildCommand(string $flags, string $url, bool $async = true) : array
    {
        $executable = ($this->isWindows())? '"C:/Program Files (x86)/Google/Chrome/Application/chrome.exe"': '/usr/bin/google-chrome';

        $flags .= ' --headless --disable-gpu';

        return $this->exec("$executable $flags $url", $async);
    }

    private function exec(string $cmd, bool $async = true) : array
    {
        $stdout = '';
        if($async) {
            $stdout = " > /dev/null &";
        }

        $output = [];

        if ($this->isWindows() && $async) {
            pclose(popen("start /B ". $cmd, "r"));
        } else {
            exec($cmd . $stdout, $output);
        }

        return $output;
    }

    private function isWindows() : bool
    {
        return substr(php_uname(), 0, 7) === "Windows";
    }
}