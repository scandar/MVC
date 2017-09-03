<?php

/**
 *
 */
class Help extends Controller
{
    function __construct()
    {
        parent::__construct();
        echo "help controller<br>";
    }

    public function other($arg = null)
    {
        echo "other method<br>";
        if ($arg) {
            echo "arg: " . $arg;
        }

        require 'models/help_model.php';
        $model = new Help_Model();
    }

}
