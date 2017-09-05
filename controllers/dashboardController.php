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
        $this->view->scripts = ['dashboard/script'];
    }

    public function logout()
    {
        Session::destroy();
        header('Location: '.Route::link('login'));
        exit();
    }

    public function ajaxInsert()
    {
        $this->model->ajaxInsert();
    }

    public function ajaxGet()
    {
        $this->model->ajaxGet();
    }

    public function ajaxDelete()
    {
        $this->model->ajaxDelete();
    }
}
