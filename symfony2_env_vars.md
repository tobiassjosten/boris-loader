### Using Environment variables wiht the Symfony2 provider

With the following example ~/.borisrc you can change the Symfony2 configuration environment and debug mode without 

    <?php
    require <path-to>/boris-loader.php';
    
    // getenv) returns false if ENV var is not found
    $env = getenv('BORIS_SYMFONY_ENV');
    $debug = getenv('BORIS_SYMFONY_DEBUG');
    
    // Use found value or defaults
    $env = $env ? $env : 'dev';
    $debug = $debug ? $debug : true;
    
    \Boris\Loader\Loader::load($boris, [ new \Boris\Loader\Provider\Symfony2($env, $debug),]);
    
