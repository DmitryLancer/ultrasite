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
        $mysql = new mysqli('localhost', 'root', 'root', 'test1');

        $params = [
            $user->login,
            $user->password,
            $user->name,
            $user->age,
            $user->gender,
        ];
        $newParams = [];
        foreach ($params as $param) {
            $newParam = '"' . $param . '"';
            $newParams[] = $newParam;
        }

        $str = implode(', ', $newParams);
        $val = '(' . $str . ')';





        // 1) завернули в двойные кавычки
        // 2) разделили запятыми
        // 3) засунили в скобки

        var_dump($val);

        $sql = 'INSERT INTO `users`
            (`login`, `pass`, `name`, `age`, `gender`)
            VALUES' . $val;


        $result = $mysql->query($sql);
        var_dump($sql);
        var_dump($result);

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



