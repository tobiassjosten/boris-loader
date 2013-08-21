<?php

namespace Boris\Loader\Test\Provider;

use Boris\Loader\Provider\AbstractProvider;

class Thrower extends AbstractProvider
{
    public $name = 'composer';

    public function assertDir($dir)
    {
        return true;
    }

    public function initialize(\Boris\Boris $boris, $dir)
    {
        throw new \Exception('Works!');
    }

}
