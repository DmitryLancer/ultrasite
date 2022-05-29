<?php  

//	$title = filter_var(trim($_POST['title']),
//	FILTER_SANITIZE_STRING);
//	$body = filter_var(trim($_POST['body']),
//	FILTER_SANITIZE_STRING);


function cleanParameters($value)
{
//    var_dump($value);
    $result = filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
//    var_dump($result);

    return $result;
}

$title = cleanParameters('title');
$body = cleanParameters('body');

	// if(mb_strlen($title) < 2 || mb_strlen($title) > 50) {
		
	// 	echo 'Недопустимая длина заголовка (от 2 до 50 символов)';
	// 	exit();
	// } else if (mb_strlen($body) < 10 || mb_strlen($body) > 250) {
	// 	echo 'Недопустимая длина текста (от 10 до 250 символов)';
	// 	exit();
	// }

	$err = [];
	$flag = 0;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (mb_strlen($title) < 2 ||  mb_strlen($title) > 50) {
			$err['title'] = '<small class="text-danger">Недопустимая длина заголовка (от 2 до 50 символов)</small>';
			$flag = 1;
			
		}
		if (mb_strlen($body) < 10 ||  mb_strlen($body) > 250) {
			$err['body'] = '<small class="text-danger">Недопустимая длина текста (от 10 до 250 символов)</small>';
			$flag = 1;
			
		}
		if ($flag == 0) {
			Header("Location:/content-page.php" . $_SERVER['HTTP_REFER'] . "?mes=success");

			$mysql = new mysqli('localhost', 'root', 'root', 'test2');
			$mysql->query("INSERT INTO `content-bd` (`title`, `body`) VALUES('$title', '$body')");
		
			$mysql->close();
		}
	}

	if ($_GET['mes'] == 'success') {
		$err['success'] = '<div class="alert alert-success">Пост успешно отправлен!</div>';
	}




	// header('Location /index.html');

?>