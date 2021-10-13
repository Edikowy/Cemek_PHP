<?php
namespace src\model;

/**
 *
 * @author Edikowy
 * @copyright (c) 2015-2021, Edikowy. All Rights Reserved.
 * @license MIT License
 * @link https://github.com/Edikowy/Cemek_PHP
 */
class Wpisy extends Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $sql = 'SELECT a.id, c.name, a.url, a.title, a.content, a.date_add, a.autor, a.id_lokale FROM wpisy AS a LEFT JOIN lokale AS c ON a.id_lokale=c.id';
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
        $sql = 'SELECT a.id, c.name, a.url, a.title, a.content, a.date_add, a.autor FROM wpisy AS a LEFT JOIN lokale AS c ON a.id_lokale=c.id where a.id=' . (int) $id;
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
        $sql = 'SELECT id, name, url, title, content, date_add, autor FROM wpisy WHERE id_lokale=' . (int) $id;
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
        $sql = 'INSERT INTO wpisy (id, name, url, title, content, date_add, autor, id_lokale) VALUES (
            NULL, :name, :url, :title, :content, :date_add, :autor, :id_lokale)';
        $query = $this->conn->prepare($sql);
        $query->bindValue(':name', $data['name'], \PDO::PARAM_STR);
        $query->bindValue(':url', $data['url'], \PDO::PARAM_STR);
        $query->bindValue(':title', $data['title'], \PDO::PARAM_STR);
        $query->bindValue(':content', $data['content'], \PDO::PARAM_STR);
        $query->bindValue(':date_add', $data['date_add'], \PDO::PARAM_STR);
        $query->bindValue(':autor', $data['autor'], \PDO::PARAM_STR);
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

