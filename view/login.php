

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
<div class="container mt-4" style="width: 500px;" >
    <?php
    if($_COOKIE['user'] == ''):
        ?>
    <h1>Форма авторизации</h1>
    <form action="../index.php" method="post">
        <p>Логин:</p>
        <input type="text" class="form-control" name="login" id="login"> <br>
        <p>Пароль:</p>
        <input type="text" class="form-control" name="pass" id="pass"> <br>
        <input type="hidden" value="login" name="action">

        <button style="margin: 0 auto; display: block;" class="btn btn-success" type="">Авторизоваться</button>
    </form>

    <?php else: ?>
        <p>Привет <?=$_COOKIE['user']?> . Чтобы выйти нажмите <a href="../model/exit.php ">сюда</a> </p>
    <?php endif;?>

</div>








</body>
</html>

