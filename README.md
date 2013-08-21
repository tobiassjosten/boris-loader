# boris-loader

Loads project specific contexts into [d11wtq/boris](https://github.com/d11wtq/boris) REPL.

Currently supports [Symfony](http://symfony.com/), [Drupal](https://drupal.org/) and [Composer](http://getcomposer.org/).

[![Build Status](https://travis-ci.org/tobiassjosten/boris-loader.png?branch=master)](https://travis-ci.org/tobiassjosten/boris-loader)

## Usage

The easiest (and recommended) way of using *boris-loader* is by hooking into Boris via your `.borisrc` file, either in your `$HOME` or your current working directory. Simply clone this repository somewhere and add the following lines to your `.borisrc`.

    <?php
    require __DIR__.'/../../../../boris-loader.php';
    \Boris\Loader\Loader::load($boris);

If you are interested only in, for example, the Symfony and Composer providers you can have boris-loader exclusively use that.

    <?php
    require __DIR__.'/../../../../boris-loader.php';
    \Boris\Loader\Loader::load($boris, array(
        new \Boris\Loader\Provider\Symfony(),
        new \Boris\Loader\Provider\Composer(),
    ));
