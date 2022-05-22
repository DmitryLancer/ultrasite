<?php  

	$title = filter_var(trim($_POST['title']),
	FILTER_SANITIZE_STRING);
	$body = filter_var(trim($_POST['body']),
	FILTER_SANITIZE_STRING);
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



?>