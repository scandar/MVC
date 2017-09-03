<?php

/**
 *
 */
class Err extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view->render('errors/index');
        // echo "Error 404 not found!";
    }
}
