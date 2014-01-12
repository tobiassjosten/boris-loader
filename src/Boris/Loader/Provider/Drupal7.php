<?php

namespace Boris\Loader\Provider;

class Drupal7 extends AbstractProvider
{
    public $name = 'drupal7';

    public function assertDir($dir)
    {
      return (file_exists("$dir/includes/common.inc") && file_exists("$dir/misc/drupal.js") && ((basename($dir) != 'core') || !file_exists("$dir/../composer.json")));
    }

    public function initialize(\Boris\Boris $boris, $dir)
    {
        parent::initialize($boris, $dir);

        chdir($dir);

        define('DRUPAL_ROOT', $dir);

        require_once "$dir/includes/bootstrap.inc";

        drupal_override_server_variables();

        drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
    }
}

