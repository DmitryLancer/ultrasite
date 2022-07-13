<?php

namespace model;

class Login
{
    public $login;
    public $pass;

    public function prepareInsertSQL()
    {
//        $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' and `pass` = '$pass'");
        $sql = "SELECT * FROM `users` WHERE `login` = '$login' and `pass` = '$pass'";
        return $sql;
    }
    public function prepareParameters()
    {
        $parameters = [
            'login' => $this->login,
            'pass' => $this->pass,
        ];
        return $parameters;
    }




}