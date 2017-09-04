<?php

/**
 *
 */
class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
        if (Session::get('logged_in')) {
            header('Location: '. Route::link('dashboard'));
        }
        // $this->view->render('login/index');
    }

    public function run()
    {
        $this->model->run();
    }
}
