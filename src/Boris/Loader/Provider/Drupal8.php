<?php

namespace Boris\Loader\Provider;

class Drupal8 extends AbstractProvider
{
    public $name = 'drupal';

    public function assertDir($dir)
    {
        return is_file("$dir/core/lib/Drupal.php");
    }

    public function initialize(\Boris\Boris $boris, $dir)
    {
        parent::initialize($boris, $dir);

        $classloader = require_once $dir .'/core/vendor/autoload.php';
        $request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $kernel = new \Drupal\Core\DrupalKernel::createFromRequest($request, $classloader, 'dev');
        $kernel->boot();
        $kernel->prepareLegacyRequest($request);
        \Drupal::getContainer()->set('request', $request);

        $boris->onStart(function ($worker, $vars) use ($kernel) {
            $worker->setLocal('kernel', $kernel);
            $worker->setLocal('container', $kernel->getContainer());
        });
    }
}
