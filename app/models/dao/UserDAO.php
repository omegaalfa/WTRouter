<?php

namespace App\Models\DAO;

use App\Models\Users;
use Modulos\Classes\Registry;

class UserDAO
{
    private $conn;

    public function __construct()
    {
        $registry = Registry::getInstance();
        $this->conn = $registry->getRegistry('PDO');
    }

    public function insert(Post $post)
    {
        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO posts (title, content) VALUES (:title, :content)'
            );

            $stmt->bindValue(':title', $post->getTitle());
            $stmt->bindValue(':content', $post->getContent());
            $stmt->execute();

            $this->conn->commit();
        } catch (Exception $e) {
            $this->conn->rollback();
        }
    }

    public function getAll()
    {
        $statement = $this->conn->query(
            'SELECT * FROM users'
        );

        return $this->processResults($statement);
    }

    private function processResults($statement)
    {
        $results = array();

        if ($statement) {
            while ($row = $statement->fetch(\PDO::FETCH_OBJ)) {
                $post = new Users();

                $post->setUsername($row->username);
                $post->setEmail($row->email);


                $results[] = $post;
            }
        }

        return $results;
    }

}

