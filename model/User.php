<?php

namespace model;

class User
{
    public $password;
    public $name;
    public $age;

    public function isPassValid()
    {
        if (mb_strlen($this->password) < 2 || mb_strlen($this->password) > 6) {
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
}