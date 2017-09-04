<?php

/**
 *
 */
class Dashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('logged_in');
        if (!$logged) {
            $this->logout();
        }
    }

    public function logout()
    {
        Session::destroy();
        header('Location: '.Route::link('login'));
        exit();
    }
}
