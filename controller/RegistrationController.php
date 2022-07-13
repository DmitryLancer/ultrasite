<?php

namespace controller;

use model\DataBase;
use PDO;

class RegistrationController extends Controller
{
    public function actionIndex()
    {
        include __DIR__ . '/../view/reigistration.php';

        require_once __DIR__ . '/../model/User.php';

        $user = new \model\User();


        $user->login = $this->cleanParameters('login');
        $user->pass = $this->cleanParameters('pass');
        $user->name = $this->cleanParameters('name');
        $user->age = $this->cleanParameters('age');
        $user->gender = $this->cleanParameters('gender');

//Сохранять должен только если все поля заполнены правильно


        if ($user->isLoginValid() && $user->isPassValid() && $user->isNameValid() && $user->isAgeValid() && $user->isGenderValid()) {
            $database = new DataBase();
            $sql = $user->prepareInsertSQL();
            $parameters = $user->prepareParameters();
            $database->execute($sql, $parameters);

            if ($result = $_POST['action'] == 'registration') {
                include_once __DIR__ . '/../view/content.php';

                } else {
                    echo 'Не удалось сохранить в бд';
                }
        }

        if (!empty($_POST)) {
            if (!$user->isLoginValid()) {
                echo 'Недопустимая длина логина';
            } else {
                if (!$user->isPassValid()) {
                    echo 'Недопустимая длина пароля (от 2 до 6 символов)';
                } else {
                    if (!$user->isNameValid()) {
                        echo 'Недопустимая длина имени';
                    } else {
                        if (!$user->isAgeValid()) {
                            echo 'Возраст (от 6 до 70 лет!)';
                        } else {
                            if (!$user->isGenderValid()) {
                                echo 'Укажите свой пол!';
                            }
                        }
                    }
                }
            }
        }
    }
    public function actionLogin()
    {
        // КАК ПОДКЛЮЧИТЬ ЧИСТКУ КОДА ?????

        $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

        $mysql = new mysqli('localhost', 'root', 'root', 'test3');

        $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' and `pass` = '$pass'");

        $user = $result->fetch_assoc();

        if(count($user) == 0) {
            echo 'Пользователь не найден';
            exit();
        }

        setcookie('user', $user['name'], time() + 3600, '/');


        $mysql->close();
        header('Location: /');




    }
}