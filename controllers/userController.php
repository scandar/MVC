<?php

/**
 *
 */
class User extends Controller
{

    function __construct()
    {
        parent::__construct();

        if (!Session::get('logged_in') || Session::get('role') != 'owner') {
            header('Location: '. Route::link('home'));
        }
    }

    public function index()
    {
        header("Location: " . Route::link('user/list'));
    }

    public function list()
    {
        $this->view->users = $this->model->fetchUsers();
        $this->view->render('user/index');
    }

    public function create()
    {
        $this->model->create();
    }

    public function edit($id)
    {
        $this->view->user = $this->model->edit($id);
        $this->view->render('user/edit');
    }

    public function update($id)
    {
        $this->model->update($id);
    }

    public function destroy($id)
    {
        $this->model->destroy($id);
    }
}
