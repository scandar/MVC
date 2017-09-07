<?php

/**
 *
 */
class Login_Model extends Model
{
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function run()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sth = $this->db
             ->prepare("SELECT * FROM users WHERE username = ?");

        $sth->bindParam(1, $username);
        // $sth->bindParam(2, $password);

        $sth->execute();
        $data = $sth->fetchObject();
        $count = $sth->rowCount();
        if ($count) {
            $verify = password_verify($password, $data->password);
        }
        // print_r($data);
        // die();

        if ($verify) {
            $this->login($data);
        } else {
            Session::destroy();
            header('Location: '.Route::link('login'));
        }
    }

    public function login($data)
    {
        Session::destroy();
        Session::init();
        Session::set('logged_in',true);
        Session::set('user_id',$data->id);
        Session::set('username',$data->username);
        Session::set('role',$data->role);

        header('Location: '.Route::link('dashboard'));
    }
}
