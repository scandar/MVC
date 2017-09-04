<?php
/**
 *
 */
class Route
{
    public static function asset($name)
    {
        echo URL . $name;
    }
    public static function link($name)
    {
        return URL . $name;
    }
}
