<?php

namespace Daijulong\Console\Traits;

trait Color
{
    private static $colors;

    /**
     * @return mixed
     * @throws \ReflectionException
     */
    public static function getColors()
    {
        if (!empty(static::$colors)) {
            return static::$colors;
        }
        $reflect = new \ReflectionClass(static::class);
        static::$colors = $reflect->getConstants();
        return static::$colors;
    }

    /**
     * @param $color
     * @return string
     * @throws \ReflectionException
     */
    public static function getColor($color)
    {
        $colors = static::getColors();
        $color = strtoupper($color);
        return key_exists($color, $colors) ? "\033[" . $colors[$color] . 'm' : '';
    }
}
