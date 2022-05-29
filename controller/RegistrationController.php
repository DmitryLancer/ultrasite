<?php

include __DIR__ . '/../view/index.html';

function cleanParameters($value)
{
    return filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
}

$user = new \model\User();
$user->password = cleanParameters('pass');
var_dump($user->password);
var_dump($user);

$login = cleanParameters('login');
$name = cleanParameters('name');
$age = cleanParameters('age');
$gender = cleanParameters('gender');


function isLoginValid($login)
{
    if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        return false;
    } else {
        return true;
    }
}

function isPassValid($pass)
{
    if (mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
        return false;
    } else {
        return true;
    }
}

function isNameValid($name)
{
    if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
        return false;
    } else {
        return true;
    }
}

function isAgeValid($age)
{
    if ($age < 6 || $age > 70) {
        return false;
    } else {
        return true;
    }
}

if (!empty($_POST)) {
    if (!isLoginValid($login)) {
        echo 'Недопустимая длина логинаfffff';
    } else {
        if (!isPassValid($pass)) {
            echo 'Недопустимая длина пароля (от 2 до 6 символов)';
        } else {
            if (!isPassValid($name)) {
                echo 'Недопустимая длина имени';
            } else {
                if (!isPassValid($age)) {
                    echo 'Возраст (от 6 до 70 лет!)';
                } else {
                    if ($gender == '') {
                        echo 'Укажите свой пол!';
                    }
                }
            }
        }
    }
    $mysql = new mysqli('localhost', 'root', 'root', 'test1');
    $result = $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`, `age`, `gender`) VALUES('$login', '$pass', '$name', '$age', '$gender')");
    $mysql->close();


    if ($result) {
        include_once __DIR__ . '/../view/content-page.php';
    } else {
        echo 'Не удалось сохранить в бд';
    }
}




