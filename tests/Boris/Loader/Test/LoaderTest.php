<?php

namespace Boris\Loader\Test;

use Mockery as M;

class LoaderTest extends \PHPUnit_Framework_TestCase
{
    public function testLoad()
    {
        $boris = M::mock('\Boris\Boris');

        $provider = M::mock('\Boris\Loader\Provider\ProviderInterface');
        $provider->shouldReceive('getDir')->times(1)->andReturn(true);
        $provider->shouldReceive('initialize')->times(1);

        \Boris\Loader\Loader::load($boris, array($provider));
    }

    public function testLoadPass()
    {
        $boris = M::mock('\Boris\Boris');

        $provider = M::mock('\Boris\Loader\Provider\ProviderInterface');
        $provider->shouldReceive('getDir')->times(1)->andReturn(false);
        $provider->shouldReceive('initialize')->times(0);

        \Boris\Loader\Loader::load($boris, array($provider));
    }

    public function testDefaultProvider()
    {
        $boris = M::mock('\Boris\Boris');
        $boris->shouldReceive('setPrompt')->with('test-works> ')->times(1);
        $boris->shouldReceive('onStart')->times(1);

        chdir(__DIR__.'/Provider/Composer');

        \Boris\Loader\Loader::load($boris);
    }
}
