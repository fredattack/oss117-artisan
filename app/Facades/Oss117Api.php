<?php

namespace App\Facades;

class Oss117Api
{
    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return self::resolve($name, $arguments);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private static function resolve(string $name, array $arguments)
    {
        return (app()->make(\App\Services\ApiService::class))->$name(...$arguments);
    }
}
