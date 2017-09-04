<?php

/**
 *
 */
class View
{

    function __construct()
    {
        //
    }

    public function render($name, $include = true)
    {
        if ($include)
        {
            require 'views/header.php';
            require 'views/' .$name. '.php';
            require 'views/footer.php';
        }
        else
        {
            require 'views/' .$name. '.php';
        }
    }
}
