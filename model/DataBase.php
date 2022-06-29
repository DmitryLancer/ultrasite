<?php

namespace model;
use PDO;

class DataBase
{
    public $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=test3', 'root', 'root');
    }

    public function temp($post)
    {
        $sql = 'INSERT INTO post (title, body, author_id) VALUES (:title, :body, :author_id)';
        $stmt = $this->dbh->prepare($sql);
        $result = $stmt->execute([
            'title' => $post->title,
            'body' => $post->body,
            'author_id' => 1,

        ]);
    }

    public function temp2($user)
    {
        $sql = 'INSERT INTO users (login, pass, name, age, gender) VALUES (:login, :pass, :name, :age, :gender)';
        $stmt = $this->dbh->prepare($sql);
        $result = $stmt->execute([
            'login' => $user->login,
            'pass' => $user->pass,
            'name' => $user->name,
            'age' => $user->age,
            'gender' => $user->gender,
        ]);
    }
}
