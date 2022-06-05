<?php

namespace model;

class Post
{

    public $title;
    public $content;


    public function strTitle()
    {
        $titleLenght = mb_strlen($this->title);

        return $titleLenght;
    }

    public function strContent()
    {
        $str = mb_strlen($this->content);

        return $str;
    }










}