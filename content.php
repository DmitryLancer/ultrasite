<?php  

//	$title = filter_var(trim($_POST['title']),
//	FILTER_SANITIZE_STRING);
//	$body = filter_var(trim($_POST['body']),
//	FILTER_SANITIZE_STRING);


function cleanParam($value)
{
//    var_dump($value);
    $res = filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
//    var_dump($result);

    return $res;
}

$title = cleanParam('title');
$content = cleanParam('content');


function strlen($value)
{
    $str = mb_strlen($value);

    return $str;
}


require_once __DIR__ . '/../model/Post.php';
$post = new \model\Post();






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
        if (!($_POST['action'] == 'registration')) {
		if (!$post->strTitle() < 2 ||  !$post->strTitle() > 50) {
			$err['title'] = '<small class="text-danger">Недопустимая длина заголовка (от 2 до 50 символов)</small>';
			$flag = 1;
			
		}
		if (!$post->strContent() < 10 ||  !$post->strContent() > 250) {
			$err['body'] = '<small class="text-danger">Недопустимая длина текста (от 10 до 250 символов)</small>';
			$flag = 1;
			
		}
		if ($flag == 0) {
			Header("Location:/content-page.php" . $_SERVER['HTTP_REFER'] . "?mes=success");

			$mysql = new mysqli('localhost', 'root', 'root', 'test2');
			$mysql->query("INSERT INTO `content-bd` (`title`, `body`) VALUES('$title', '$body')");
		
			$mysql->close();

            if ($_GET['mes'] == 'success') {
                $err['success'] = '<div class="alert alert-success">Пост успешно отправлен!</div>';
            }
		}

//            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                if (!($_POST['action'] == 'registration')) {
//                    if (strlen('title') < 2 ||  strlen('title') > 50) {
//                        $err['title'] = '<small class="text-danger">Недопустимая длина заголовка (от 2 до 50 символов)</small>';
//                        $flag = 1;
//
//                    }
//                    if (strlen('content') < 10 ||  strlen('content') > 250) {
//                        $err['body'] = '<small class="text-danger">Недопустимая длина текста (от 10 до 250 символов)</small>';
//                        $flag = 1;
//
//                    }
//                    if ($flag == 0) {
//                        Header("Location:/content-page.php" . $_SERVER['HTTP_REFER'] . "?mes=success");
//
//                        $mysql = new mysqli('localhost', 'root', 'root', 'test2');
//                        $mysql->query("INSERT INTO `content-bd` (`title`, `body`) VALUES('$title', '$body')");
//
//                        $mysql->close();
//
//                        if ($_GET['mes'] == 'success') {
//                            $err['success'] = '<div class="alert alert-success">Пост успешно отправлен!</div>';
//                        }
//                    }


        }
    }





	// header('Location /index.html');

?>