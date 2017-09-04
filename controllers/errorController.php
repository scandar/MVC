<?php

/**
 *
 */
class Err extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->index();
    }

    public function index()
    {
        $this->view->render('error/index');
    }
}
