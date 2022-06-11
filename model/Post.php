<?php

namespace model;

class Post
{

    public $title;
    public $body;


    public function prepareValuesSql()
    {
        $params = [
            $this->title,
            $this->body,

        ];
        $newParams = [];
        foreach ($params as $param) {
            $newParam = '"' . $param . '"';
            $newParams[] = $newParam;
        }

        $str = implode(', ', $newParams);
        $val = '(' . $str . ')';

        return $val;
    }


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
























}