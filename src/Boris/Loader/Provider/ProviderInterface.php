<?php

namespace Boris\Loader\Provider;

interface ProviderInterface
{
    public function getDir();

    public function initialize(\Boris\Boris $boris, $dir);

}
