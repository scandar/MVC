<?php

/**
 *
 */
class Dashboard_Model extends Model
{
    public function ajaxInsert()
    {
        if (!empty($_POST['text'])) {
            $text = htmlspecialchars($_POST['text']);

            $sth = $this->db->prepare("INSERT INTO data (text) VALUES (?)");
            $sth->bindParam(1, $text);
            $sth->execute();

            $data = ['text' => $text, 'id' => $this->db->lastInsertId()];
            echo json_encode($data);
        } else {
            return false;
        }
    }

    public function ajaxGet()
    {
        $sth = $this->db->prepare("SELECT * FROM data");
        $sth->execute();
        echo json_encode($sth->fetchAll(PDO::FETCH_ASSOC));
    }

    public function ajaxDelete()
    {
        $id = $_POST['id'];

        $sth = $this->db->prepare("DELETE FROM data WHERE id = ?");
        $sth->bindParam(1, $id);
        $sth->execute();

    }
}
