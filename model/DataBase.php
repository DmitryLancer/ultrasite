<?php

namespace model;
use PDO;

class DataBase implements \Countable
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


}
