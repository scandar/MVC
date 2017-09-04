<?php
/**
 *
 */
class Database extends PDO
{
    private $db;

    function __construct()
    {
        if (!$this->db) {
            $this->db = parent::__construct('mysql:host=127.0.0.1;dbname=mvcdb','root','password');
        }
        return $this->db;
    }
}
