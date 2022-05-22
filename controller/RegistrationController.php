<?php

include __DIR__ . '/../view/index.html';



$login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
$age = filter_var(trim($_POST['age']),
    FILTER_SANITIZE_STRING);
$gender = filter_var(trim($_POST['gender']),
    FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo 'Недопустимая длина логина';
    exit();
} else {
    if (mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
        echo 'Недопустимая длина пароля (от 2 до 6 символов)';
        exit();
    } else {
        if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
            echo 'Недопустимая длина имени';
            exit();
        } else {
            if ($age < 6 || $age > 70) {
                echo 'Возраст (от 6 до 70 лет!)';
                exit();
            } else {
                if ($gender == '') {
                    echo 'Укажите свой пол!';
                    exit();
                }
            }
        }
    }
}

header('Location: /content-page.php', false, 301);


$mysql = new mysqli('localhost', 'root', 'root', 'test1');
$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`, `age`, `gender`) VALUES('$login', '$pass', '$name', '$age', '$gender')");

$mysql->close();

