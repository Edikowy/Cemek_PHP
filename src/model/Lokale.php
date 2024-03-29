<?php
namespace src\model;

/**
 *
 * @author    Edikowy
 * @copyright 2021 Edikowy. All Rights Reserved.
 * @license   MIT License
 * @link      https://github.com/Edikowy/Cemek_PHP
 */
class Lokale extends Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function linki()
    {
        $sql = 'SELECT * from lokale';
        $query = $this->conn->query($sql);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (isset($result)) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function add($data)
    {
        $sql = 'INSERT INTO lokale (id, name) VALUES (NULL, :name)';
        $query = $this->conn->prepare($sql);
        $query->bindValue(':name', $data['name'], \PDO::PARAM_STR);
        $query->execute();
    }
    
    public function del($id)
    {
        $sql = 'DELETE FROM lokale where id=:id';
        $query = $this->conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
    }
}

