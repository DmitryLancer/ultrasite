<?php

namespace model;

class Post
{

    public $title;
    public $body;
    public $author_id;


    public function strTitle()
    {
        $titleLenght = mb_strlen($this->title);

        return $titleLenght;
    }

    public function strBody()
    {
        $bodyLenght = mb_strlen($this->body);

        return $bodyLenght;
    }

    public function prepareInsertSQL()
    {
        $sql = 'INSERT INTO post (title, body, author_id) VALUES (:title, :body, :author_id)';
        return $sql;
    }
    public function prepareParameters()
    {
        $parameters = [
            'title' => $this->title,
            'body' => $this->body,
            'author_id' => $this->author_id,
        ];
        return $parameters;
    }
























}