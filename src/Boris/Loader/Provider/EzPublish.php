<?php

namespace Boris\Loader\Provider;

class EzPublish extends AbstractProvider
{
    public $name = 'ezpublish';

    public function assertDir($dir)
    {
        return is_file("$dir/ezpublish/bootstrap.php.cache")
            && is_file("$dir/ezpublish/EzPublishKernel.php");
    }

    public function initialize(\Boris\Boris $boris, $dir)
    {
        parent::initialize($boris, $dir);

        putenv("EZPUBLISH_SITEACCESS=fr");

        require "$dir/ezpublish/bootstrap.php.cache";
        require_once "$dir/ezpublish/EzPublishKernel.php";

        $kernel = new \EzPublishKernel('dev', true);
        $kernel->loadClassCache();
        $kernel->boot();

        $boris->onStart(function ($worker, $vars) use ($kernel) {
            $worker->setLocal('kernel', $kernel);
            $worker->setLocal('container', $kernel->getContainer());
        });
    }

}
