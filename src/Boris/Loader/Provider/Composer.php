<?php

namespace Boris\Loader\Provider;

class Composer extends AbstractProvider
{
    public $name = 'composer';

    public function assertDir($dir)
    {
        if (is_file("$dir/composer.json")) {
            if (is_file("$dir/vendor/autoload.php")) {
                return true;
            }

            echo "A $dir/composer.json file exists but $dir/vendor dir does not. Try running composer install.\n";
        }

        return false;
    }

    public function initialize(\Boris\Boris $boris, $dir)
    {
        $config = json_decode(file_get_contents("$dir/composer.json"), true);
        if (isset($config['name'])) {
            $this->name = $config['name'];
        }

        parent::initialize($boris, $dir);

        echo "Using $dir/composer.json\n";

        $loader = require "$dir/vendor/autoload.php";

        $boris->onStart(function ($worker, $vars) use ($loader) {
            $worker->setLocal('loader', $loader);
        });
    }

}
