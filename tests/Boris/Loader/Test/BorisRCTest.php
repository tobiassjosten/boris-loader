<?php

namespace Boris\Loader\Test;

class BorisRCTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Exception
     * @expectedExceptionMessage Works!
     */
    public function testBorisRC()
    {
        $boris = new \Boris\Boris();

        $config = new \Boris\Config(array(__DIR__.'/borisrc.php'));
        $config->apply($boris);

        $options = new \Boris\CLIOptionsHandler();
        $options->handle($boris);

        $boris->start();
    }
}
