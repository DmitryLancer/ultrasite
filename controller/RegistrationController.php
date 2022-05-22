<?php

include __DIR__ . '/../view/index.html';

function cleanParameters($value)
{
    var_dump($value);
    $result = filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
    var_dump($result);

    return $result;
}
function isLoginValid($login)
{
    if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        return false;
    } else {
        return true;
    }
}


$login = cleanParameters('login');
$name = cleanParameters('name');
$pass = cleanParameters('pass');
$age = cleanParameters('age');
$gender = cleanParameters('gender');



if (!isLoginValid($login)) {
    echo 'Недопустимая длина логина';
} else {
    if (mb_strlen($pass) < 2 || mb_strlen($pass) > 6) {
        echo 'Недопустимая длина пароля (от 2 до 6 символов)';
    } else {
        if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
            echo 'Недопустимая длина имени';
        } else {
            if ($age < 6 || $age > 70) {
                echo 'Возраст (от 6 до 70 лет!)';
            } else {
                if ($gender == '') {
                    echo 'Укажите свой пол!';
                }
            }
        }
    }
}

// header('Location: /content-page.php', false, 301);


$mysql = new mysqli('localhost', 'root', 'root', 'test1');
$mysql->query("INSERT INTO `users` (`login`, `pass`, `name`, `age`, `gender`) VALUES('$login', '$pass', '$name', '$age', '$gender')");

$mysql->close();

