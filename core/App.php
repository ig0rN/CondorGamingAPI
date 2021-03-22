<?php

namespace Core;

class App
{
    /**
     * List of important params for app
     *
     * @var array
     */
    protected static array $registry;

    /**
     * Register param
     *
     * @param $key
     * @param $value
     */
    public static function bind($key, $value): void
    {
        self::$registry[$key] = $value;
    }

    /**
     * Return registered param
     *
     * @param $key
     * @return null | mixed
     */
    public static function get($key)
    {
        if (array_key_exists($key, self::$registry)) {
            return self::$registry[$key];
        }

        return null;
    }
}