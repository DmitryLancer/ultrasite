


<?php


spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});



//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

//if(empty($POST)) {
//    include_once __DIR__ . '/controller/RegistrationController.php';
//    $RegistrationController = new \controller\RegistrationController();
//    $RegistrationController->actionLogin();
//
//}



if(empty($POST)) {
    include_once __DIR__ . '/controller/RegistrationController.php';
    $RegistrationController = new \controller\RegistrationController();
    $RegistrationController->actionIndex();

}


if ($_POST['action'] == 'post') {
    include_once __DIR__ . '/controller/PostController.php';
    $postController = new \controller\PostController();
    $postController->actionIndex();
}

