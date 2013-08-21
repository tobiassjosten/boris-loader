<?php

namespace Boris\Loader\Provider;

abstract class AbstractProvider implements ProviderInterface
{
    public $name = 'boris';

    public function getDir()
    {
        $dir = getcwd();

        while ($dir) {
            if ($this->assertDir($dir)) {
                return $dir;
            }

            $dir = substr($dir, 0, strrpos($dir, '/'));
        }

        return false;
    }

    protected function assertDir($dir)
    {
        return false;
    }

    public function initialize(\Boris\Boris $boris, $dir)
    {
        $boris->setPrompt($this->name.'> ');
    }

}
