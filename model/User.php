<?php

namespace model;

class User
{
    public $password;

    public function isPassValid()
    {
        if (mb_strlen($this->password) < 2 || mb_strlen($this->password) > 6) {
            return false;
        } else {
            return true;
        }
    }
}