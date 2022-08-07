


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-4" style="width: 500px;">
	<div class="alert alert-success">Аккаунт успешно зарегистрирован!</div>
		<h1>Создание поста</h1>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php
            if (!empty($errors['success'])) {
                echo $errors['success'];
            }?>
			<p>Заголовок: </p>
			<input type="text" class="form-control" name="title" id="title" value="<?php echo $_POST['title'] ?>"> <br>
            <?php
            if (!empty($errors['title'])) {
                echo $errors['title'];
            }?>
			<p>Текст: </p>
			<textarea style="width: 500px; height:500px" class="form-control" name="body" id="body" value="<?php echo $_POST['body'] ?>">
			 </textarea><br>
            <?php
            if (!empty($errors['body'])) {
                echo $errors['body'];
            }?>
			<button style="margin: 0 auto; display: block; margin-top: 35px;" class="btn btn-success" type="submit">Отправить пост!</button>
            <input type="hidden" value="post" name="action">
		</form>

	</div>



</body>
</html>



<!-- <input style="height: 500px;" type="text" class="form-control" name="#" id="#"> -->