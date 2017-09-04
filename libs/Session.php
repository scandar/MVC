<?php
/**
 *
 */
class Session
{
    public static function init()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }

    public static function destroy()
    {
        unset($_SESSION);
        session_destroy();
    }
}
