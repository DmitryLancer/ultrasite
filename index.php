


<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);




//if(empty($POST)) {
//
//    require_once __DIR__ . '/controller/RegistrationController.php';
//    $registrationController = new \controller\RegistrationController();
//    $registrationController->actionIndex();
//
//}
//
//if ($_POST['action'] == 'registration') {
//
//    require_once __DIR__ . '/controller/PostController.php';
//    $postController = new \controller\PostController();
//    $postController->actionIndex();
//
////	include_once __DIR__ . '/controller/RegistrationControllerOld.php';
//}
if(empty($POST)) {
    include_once __DIR__ . '/controller/RegistrationController.php';
    $RegistrationController = new \controller\RegistrationController();
    $RegistrationController->actionIndex();

}


//if ($_POST['action'] == 'registration') {
//    include_once __DIR__ . '/controller/RegistrationController.php';
//    $RegistrationController = new \controller\RegistrationController();
//    $RegistrationController->actionIndex();
//}

if ($_POST['action'] == 'post') {
    include_once __DIR__ . '/controller/PostController.php';
    $postController = new \controller\PostController();
    $postController->actionIndex();
}

//include_once __DIR__ . '/controller/RegistrationController.php';
//if ($_POST['action'] == 'registration') {
//
//    require_once __DIR__ . '/controller/PostController.php';
//    $postController = new \controller\PostController();
//    $postController->actionIndex();
//
////	include_once __DIR__ . '/controller/RegistrationControllerOld.php';
//}

//if ($_POST['action'] == 'post') {
//    include_once __DIR__ . '/view/content-page.php';
//}

