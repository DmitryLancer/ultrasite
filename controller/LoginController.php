<?php





namespace controller;

use model\DataBase;

class LoginController extends Controller
{

    public function actionLogin()
    {
        include __DIR__ . '/../view/login.php';

        require_once __DIR__ . '/../model/Login.php';

        $login = new \model\Login();

        $login->login = $this->cleanParameters('login');
        $login->pass = $this->cleanParameters('pass');



        $database = new DataBase();
        $sql = $login->prepareInsertSQL();
        $parameters = $login->prepareParameters();
        $database->execute($sql, $parameters);

//        $mysql = new mysqli('localhost', 'root', 'root', 'test3');
//
//        $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' and `pass` = '$pass'");

//        $user = $result->fetch_assoc();

        if(count($database) == 0) {
            echo 'Пользователь не найден';
            exit();
        }

        setcookie('user', $database['name'], time() + 3600, '/');


//        $mysql->close();
//        header('Location: /');

    }


}