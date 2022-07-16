<?php
namespace src\model;

/**
 *
 * @category  Kategoria
 * @package   Pakiet
 * @author    Edikowy
 * @copyright 2021 Edikowy. All Rights Reserved.
 * @license   MIT License
 * @link      https://github.com/Edikowy/Cemek_PHP
 */
class Wpisy extends Model
{
    
    public function index()
    {
        $sql = 'SELECT a.id, a.title, a.autor, a.date_add, a.content, a.id_lokale FROM wpisy AS a LEFT JOIN lokale AS c ON a.id_lokale=c.id';
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
        $sql = 'SELECT a.id, a.title, a.autor, a.date_add, a.content FROM wpisy AS a LEFT JOIN lokale AS c ON a.id_lokale=c.id where a.id=' . (int) $id;
        $query = $this->conn->query($sql);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (! empty($result[0])) {
            return $result[0];
        } else {
            return null;
        }
    }
    
    public function lokal($id)
    {
        $sql = 'SELECT id, title, autor, date_add, content FROM wpisy WHERE id_lokale=' . (int) $id;
        $query = $this->conn->query($sql);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (! empty($result)) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function add($data)
    {
        $sql = 'INSERT INTO wpisy (id, title, autor, date_add, content, id_lokale) VALUES (
            NULL, :title, :autor, :date_add, :content, :id_lokale)';
        $query = $this->conn->prepare($sql);
        $query->bindValue(':title', $data['title'], \PDO::PARAM_STR);
        $query->bindValue(':autor', $data['autor'], \PDO::PARAM_STR);
        $query->bindValue(':date_add', $data['date_add'], \PDO::PARAM_STR);
        $query->bindValue(':content', $data['content'], \PDO::PARAM_STR);
        $query->bindValue(':id_lokale', $data['id_lokale'], \PDO::PARAM_INT);
        $query->execute();
    }
    
    public function del($id)
    {
        $sql = 'DELETE FROM wpisy where id=:id';
        $query = $this->conn->prepare($sql);
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
    }
}

