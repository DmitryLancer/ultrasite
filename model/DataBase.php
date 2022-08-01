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

    public function execute($sql, $parameters)
    {
        $stmt = $this->dbh->prepare($sql);
        $result = $stmt->execute($parameters);

        return $result;
    }


<<<<<<< Updated upstream
=======
        $parameters = [
            'login' => $user->login,
            'pass' => $user->pass,
            'name' => $user->name,
            'age' => $user->age,
            'gender' => $user->gender,
        ];
        $result = $stmt->execute($parameters);
    }

    public function login($user)
    {

        $sql = "SELECT * FROM `users` WHERE `login` = '$user->login' and `pass` = '$user->pass'";
        $stmt = $this->dbh->prepare($sql);
        $parameters = [
            'login' => $user->login,
            'pass' => $user->pass,
        ];
        $result = $stmt->execute($parameters);

        if($stmt->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }
>>>>>>> Stashed changes
}
