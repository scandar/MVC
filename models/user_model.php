<?php

/**
 *
 */
class User_Model extends Model
{
    public function fetchUsers($key = NULL)
    {
        if ($key && !is_numeric($key))
        {
            $result = $this->select('users',['username' => $key]);
        }
        elseif (is_numeric($key))
        {
            $result = $this->select('users',['id' => $key]);
        }
        else
        {
            $result = $this->db->select('users');
        }

        return $result;
    }

    public function create()
    {
        $username = $_POST['username'];
        $password = Password::make($_POST['password']);
        $role = $_POST['role'];

        if (!count($this->db->select('users',['username'=>$username]))) {
            if (!empty($username) && !empty($_POST['password']) && !empty($role)) {
                $this->db->insert('users', [
                    'username' => $username,
                    'password'=>$password,
                    'role'=>$role
                ]);
            }
        }

        header("Location: ". Route::link('user/list'));

    }

    public function edit($id)
    {
        $users = $this->db->select('users',['id' =>$id]);
        return $users[0];
    }

    public function update($id)
    {
        $users = $this->db->select('users',['id' =>$id]);
        $username = $_POST['username'];
        $password = Password::make($_POST['password']);
        $role = $_POST['role'];

        if ($users[0]['role'] != 'owner') {
            if (!empty($username) && !empty($role)) {

                $values = [
                    'username' => $username,
                    'role' => $role,
                ];

                if (!empty($_POST['password'])) {
                    $values['password'] = $password;
                }

                $this->db->update('users',$values,$id);
            }
        }

        header("Location: ". Route::link('user/list'));
    }

    public function destroy($id)
    {
        $users = $this->db->select('users',['id'=>$id]);
        if (count($users)) {
            if ($users[0][role] != 'owner') {
                $this->db->delete('users', ['id' => $id]);
            }
        }
        header("Location: ". Route::link('user/list'));
    }
}
