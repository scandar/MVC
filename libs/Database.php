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
            $this->db = parent::__construct(
                DB_TYPE.':host='.DB_HOST.';
                dbname='.DB_NAME,
                DB_USER,
                DB_PASSWORD
            );
        }
        return $this->db;
    }

    public function insert($table,$params)
    {
        return $this->query('insert', $table, $params);
    }

    public function update($table,$params,$key)
    {
        return $this->query('update', $table, $params, $key);
    }

    public function select($table,$params = null)
    {
        return $this->query('select', $table, $params);
    }

    public function delete($table,$params)
    {
        return $this->query('delete', $table, $params);
    }

    public function query($type, $table, $params = null,$key=null)
    {
        $qstr = $this->switchStatment($type, $table, $params, $key);
        $sth = $this->prepare($qstr);

        if (count($params)) {
            $keys = array_keys($params);
            for ($i = 0, $j = count($params); $i< $j; $i++) {
                $sth->bindParam($i+1, $params[$keys[$i]]);
            }
        }

        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function switchStatment($type, $table, $params, $where=null)
    {
        if (count($params)) {
            foreach ($params as $key => $value) {
                $keys[] = $key;
                $values[] = '?';
            }
            $keys = implode(", ",$keys);
            $values = implode(", ",$values);
        }
        if (isset($where)) {
            $keys = array_keys($params);
            $values = array_values($params);

            for($i = 0, $j = count($params); $i < $j; $i++) {
                $x[] = $keys[$i] . " = ?";
            }
            $keyvalues = implode(", ", $x);
        }

        switch ($type) {
            case 'insert':
                $qstr = "INSERT INTO $table ($keys) VALUES($values)";
                break;

            case 'select':
                if (count($params)) {
                    $qstr = "SELECT * FROM $table WHERE $keys = $values";
                } else {
                    $qstr = "SELECT * FROM $table";
                }
                break;

            case 'update':
                $qstr = "UPDATE $table SET $keyvalues WHERE id = $where";
                break;

            case 'delete':
                $qstr = "DELETE FROM $table WHERE $keys = $values";
                break;

            default:break;
        }
        if ($qstr)
            return $qstr;
        return false;
    }
}
