<?php

namespace model;

class User
{
    public $login;
    public $pass;
    public $name;
    public $age;
    public $gender;


    public function isLoginValid()
    {
        if (mb_strlen($this->login) < 5 || mb_strlen($this->login) > 90) {
            return false;
        } else {
            return true;
        }
    }

    public function isPassValid()
    {
        if (mb_strlen($this->pass) < 2 || mb_strlen($this->pass) > 6) {
            return false;
        } else {
            return true;
        }
    }

    public function isNameValid()
    {
        if (mb_strlen($this->name) < 3 || mb_strlen($this->name) > 50) {
            return false;
        } else {
            return true;
        }
    }

    public function isAgeValid()
    {
        if ($this->age < 6 || $this->age > 70) {
            return false;
        } else {
            return true;
        }
    }

    public function isGenderValid()
    {
        if ($this->gender == '') {
            echo 'Укажите свой пол!';
            return false;
        } else {
            return true;
        }
    }



}