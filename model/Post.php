<?php

namespace model;

class Post
{

    public $title;
    public $content;


    public function strTitle()
    {
        $str = mb_strlen($this -> title);

        return $str;
    }

    public function strContent()
    {
        $str = mb_strlen($this -> content);

        return $str;
    }










}