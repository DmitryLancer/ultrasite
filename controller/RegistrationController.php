<?php

namespace controller;

use model\DataBase;
use mysqli;
use PDO;
use model\User;




class RegistrationController extends Controller
{

    public function actionIndex()
    {
        if (empty($_POST['action'])) {
            include __DIR__ . '/../view/reigistration.php';
        }

        $user = new User();


        //to do: Переписать часть кода
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
                $errors = [];
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
        $user = new User();
        $user->login = $this->cleanParameters('login');
        $user->pass = $this->cleanParameters('pass');

        $database = new DataBase();
        $isExist = $database->login($user);

        if ($isExist) {
            setcookie('user', $user->login, time() + 3600, '/');
        } else {
            echo 'Пользователь не найден'; // можно сделать отдельную страницу с ошибкой
        }
    }
}