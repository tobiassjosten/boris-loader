<?php

namespace Boris\Loader;

class Loader
{
    public static function load(\Boris\Boris $boris, array $providers = null)
    {
        if (!$providers) {
            $providers = array(new Provider\Composer());
        }

        foreach ($providers as $provider) {
            if (!$provider instanceof Provider\ProviderInterface) {
                throw new \InvalidArgumentException(
                    get_class($provider)." isn't a valid Boris provider"
                );
            }

            if ($dir = $provider->getDir()) {
                $provider->initialize($boris, $dir);
                break;
            }
        }
    }
}
