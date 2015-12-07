### Using ENV vars with the Symfony2 provider

With the following example ~/.borisrc you can use ENV vars to change the Symfony2 configuration environment and debug mode
easily before envoking Boris.
```php
<?php
require '<path-to-your>/boris-loader.php';

// getenv returns false if ENV var is not found
$config = getenv('BORIS_SYMFONY_ENV');
$debug = getenv('BORIS_SYMFONY_DEBUG');

// Use found value or set defaults
$config = $config ? $config : 'dev';
$debug = $debug ? $debug : true;

\Boris\Loader\Loader::load($boris, array(
    new \Boris\Loader\Provider\Symfony2($config, $debug),
));
```

Before envoking Boris you can export the ENV vars as suits
```
$ export BORIS_SYMFONY_ENV=prod
$ export BORIS_SYMFONY_DEBUG=false
$ boris
```
