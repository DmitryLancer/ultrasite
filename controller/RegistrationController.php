<?php

include __DIR__ . '/../view/index.html';

function cleanParameters($value)
{
    return filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
}
//$login = cleanParameters('login');
//$gender = cleanParameters('gender');

require_once __DIR__ . '/../model/User.php';

$user = new \model\User();
$user->login = cleanParameters('login');
$user->password = cleanParameters('pass');
$user->name = cleanParameters('name');
$user->age = cleanParameters('age');
$user->gender = cleanParameters('gender');




//if (!empty($_POST)) {
//    if (!$user->isLoginValid()) {
//        echo 'Недопустимая длина логина';
//    } else {
//        if (!$user->isPassValid()) {
//            echo 'Недопустимая длина пароля (от 2 до 6 символов)';
//        } else {
//            if (!$user->isNameValid()) {
//                echo 'Недопустимая длина имени';
//            } else {
//                if (!$user->isAgeValid()) {
//                    echo 'Возраст (от 6 до 70 лет!)';
//                } else {
//                    if (!$user->isGenderValid()) {
//                        echo 'Укажите свой пол!';
//                    }
//                }
//            }
//        }
//    }




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
//        $temp = 3;
//        var_dump($temp);
//        die();

        $mysql = new mysqli('localhost', 'root', 'root', 'test1');
        $sql = 'INSERT INTO `users` 
            (`login`, `pass`, `name`, `age`, `gender`) 
            VALUES(' . $user->login . ', isPassValid(), isNameValid(), isAgeValid(), isGenderValid())';

        $result = $mysql->query($sql);
        var_dump($sql);
        $mysql->close();
    }




}

//if ($result = $_POST['action'] == 'registration')  {
//    include_once __DIR__ . '/../view/content-page.php';
//
//} else {
//    echo 'Не удалось сохранить в бд';
//
//}



