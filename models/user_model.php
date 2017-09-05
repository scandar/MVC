<?php

/**
 *
 */
class User_Model extends Model
{
    public function fetchUsers($username = NULL)
    {
        if ($username && !is_numeric($username)) {
            $sth = $this->db->prepare("SELECT id,username,role FROM users WHERE username = ?");
            $sth->bindParam(1,$username);
        } elseif (is_numeric($username)) {
            $sth = $this->db->prepare("SELECT id,username,role FROM users WHERE id = ?");
            $sth->bindParam(1,$username);
        } else {
            $sth = $this->db->prepare("SELECT id,username,role FROM users");
        }
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $role = $_POST['role'];

        if (!count($this->fetchUsers($username))) {
            if (!empty($username) && !empty($_POST['password']) && !empty($role)) {

                $sth = $this->db->prepare("INSERT INTO users (username, password, role) VALUES(?,?,?)");
                $sth->bindParam(1,$username);
                $sth->bindParam(2,$password);
                $sth->bindParam(3,$role);
                $sth->execute();

            }
        }

        header("Location: ". Route::link('user/list'));

    }

    public function edit($id)
    {
        $users = $this->fetchUsers($id);
        return $users[0];
    }
    public function update($id)
    {
        $users = $this->fetchUsers($id);

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $role = $_POST['role'];

        if ($users[0]['role'] != 'owner') {
            if (!empty($username) && !empty($role)) {

                $stmt = "UPDATE users SET username = ?, role = ? ";
                if (!empty($_POST['password'])) {
                    $stmt .= ",password = ? ";
                }
                $stmt .= "WHERE id = '$id'";

                $sth = $this->db->prepare($stmt);
                $sth->bindParam(1,$username);
                $sth->bindParam(2,$role);

                if (!empty($_POST['password'])) {
                    $sth->bindParam(3,$password);
                }
                $sth->execute();
            }
        }

        header("Location: ". Route::link('user/list'));
    }

    public function destroy($id)
    {
        $users = $this->fetchUsers($id);
        if (count($users)) {
            if ($users[0][role] != 'owner') {
                $sth = $this->db->prepare("DELETE FROM users WHERE id = ?");
                $sth->bindParam(1, $id);
                $sth->execute();
            }
        }
        header("Location: ". Route::link('user/list'));

    }

}
