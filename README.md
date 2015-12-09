# boris-loader

Loads project specific contexts into [d11wtq/boris](https://github.com/d11wtq/boris) REPL.

Currently supports [Composer](http://getcomposer.org/), [Drupal](https://drupal.org/), [eZ Publish](http://ez.no/) and [Symfony](http://symfony.com/).

[![Build Status](https://travis-ci.org/tobiassjosten/boris-loader.png?branch=master)](https://travis-ci.org/tobiassjosten/boris-loader)

## Usage

The easiest (and recommended) way of using *boris-loader* is by hooking into Boris via your `.borisrc` file, either in your `$HOME` or your current working directory. Simply clone this repository somewhere and add the following lines to your `.borisrc`.

    <?php
    require 'path/to/cloned/boris-loader.php';
    \Boris\Loader\Loader::load($boris);

By default, boris-loader will try to load any [Composer](https://getcomposer.org/) configuration it can find. If you are working with projects like [Symfony](http://symfony.com/) or [Drupal](https://drupal.org/), you can have boris-loader look for and run their respective bootstrap.

    <?php
    require __DIR__.'/../../../../boris-loader.php';
    \Boris\Loader\Loader::load($boris, array(
        new \Boris\Loader\Provider\Symfony2(),
        new \Boris\Loader\Provider\Composer(),
    ));

### Providers

- [Composer](https://getcomposer.org/): \Boris\Loader\Provider\Composer().
- [Drupal 7](https://drupal.org/): \Boris\Loader\Provider\Drupal7().
- [Drupal 8](https://drupal.org/): \Boris\Loader\Provider\Drupal8().
- [eZ Publish](http://ez.no/): \Boris\Loader\Provider\EzPublish().
- [Symfony2](http://symfony.com/): \Boris\Loader\Provider\Symfony2().


### Symfony2 provider optional arguments
You can optionally pass the Symfony environment name and debug mode to the Symfony2 provider as arguments. The arguments default to 'dev' environment and true for debug mode.

    <?php
    require __DIR__.'/../../../../boris-loader.php';
    \Boris\Loader\Loader::load($boris, array(
        new \Boris\Loader\Provider\Symfony2('prod', false),
    ));
    
See [this document](symfony2_env_vars.md) for an example of using ENV vars to make this dynamic in your ~/.borisrc
