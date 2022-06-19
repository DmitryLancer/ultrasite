


<?php

//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);


if(empty($POST)) {
    include_once __DIR__ . '/controller/RegistrationController.php';


}




if ($_POST['action'] == 'registration') {
	include_once __DIR__ . '/controller/RegistrationController.php';
}

if ($_POST['action'] == 'post') {
    include_once __DIR__ . '/view/content-page.php';
}

