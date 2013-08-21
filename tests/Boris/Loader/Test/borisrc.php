<?php
require __DIR__.'/../../../../boris-loader.php';
\Boris\Loader\Loader::load($boris, array(
    new \Boris\Loader\Test\Provider\Thrower()
));
