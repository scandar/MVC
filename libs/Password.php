<?php


class Password
{

    public static function make($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

}
