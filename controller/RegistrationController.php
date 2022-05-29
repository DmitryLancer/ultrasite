<?php

include __DIR__ . '/../view/index.html';

function cleanParameters($value)
{
    return filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
}
$login = cleanParameters('login');
$gender = cleanParameters('gender');

require_once __DIR__ . '/../model/User.php';

$user = new \model\User();
$user->password = cleanParameters('pass');
$user->name = cleanParameters('name');
$user->age = cleanParameters('age');





function isLoginValid($login)
{
    if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        return false;
    } else {
        return true;
    }
}



if (!empty($_POST)) {
    if (!isLoginValid($login)) {
        echo 'Недопустимая длина логинаfffff';
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




