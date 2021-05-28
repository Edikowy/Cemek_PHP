<?php
namespace src\model;


class Lokale extends Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
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
    
    public function one($id)
    {
        $sql = 'SELECT * FROM lokale where id='.(int)$id;
        $query = $this->conn->query($sql);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (isset($result[0])) {
            return $result[0];
        } else {
            return null;
        }
    }
    
    public function add($data)
    {
        $sql = 'INSERT INTO lokale (name, url) VALUES (:name, :url)';
        $query = $this->conn->prepare($sql);
        $query->bindValue(':name', $data['name'], \PDO::PARAM_STR);
        $query->bindValue(':url', $data['url'], \PDO::PARAM_STR);
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