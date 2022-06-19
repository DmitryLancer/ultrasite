<?php



include __DIR__ . '/../view/reigistration-page.php';



require_once __DIR__ . '/../model/User.php';



$user = new \model\User();

function cleanParameters($value)
{
    return filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
}

$user->login = cleanParameters('login');
$user->pass = cleanParameters('pass');
$user->name = cleanParameters('name');
$user->age = cleanParameters('age');
$user->gender = cleanParameters('gender');

//Сохранять должен только если все поля заполнены правильно

if (!empty($_POST)) {

}
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




$dbh = new PDO('mysql:host=localhost;dbname=test3', 'root', 'root');
$sql = 'INSERT INTO users (login, pass, name, age, gender) VALUES (:login, :pass, :name, :age, :gender)';
$stmt = $dbh->prepare($sql);
$result = $stmt->execute([
    'login' => $user->login,
    'pass' => $user->pass,
    'name' => $user->name,
    'age' => $user->age,
    'gender' => $user->gender,
]);


//var_dump($result);

if ($result = $_POST['action'] == 'registration') {
    include_once __DIR__ . '/../view/content-page.php';

} else {
    echo 'Не удалось сохранить в бд';
}




