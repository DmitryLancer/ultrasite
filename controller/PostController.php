<?php

namespace controller;

use PDO;

class PostController
{
    public function actionIndex()
    {
        include __DIR__ . '/../view/content-page.php';

        require __DIR__ . '/../model/Post.php';

        $post = new \model\Post();

            function cleanParameters($value)
            {
                return filter_var(trim($_POST[$value]), FILTER_SANITIZE_STRING);
            }
            

        $post->title = cleanParameters('title');
        $post->body = cleanParameters('body');

        $err = [];
        $flag = 0;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!($_POST['action'] == 'registration')) {
                if ($post->strTitle() < 2 ||  $post->strTitle() > 50) {
                    $err['title'] = '<small class="text-danger">Недопустимая длина заголовка (от 2 до 50 символов)</small>';
                    $flag = 1;

                }
                if ($post->strBody() < 10 ||  $post->strBody() > 250) {
                    $err['body'] = '<small class="text-danger">Недопустимая длина текста (от 10 до 250 символов)</small>';
                    $flag = 1;

                }
                if ($flag == 0) {
                    $dbh = new PDO('mysql:host=localhost;dbname=test3', 'root', 'root');

                    $sql = 'INSERT INTO post (title, body, author_id) VALUES (:title, :body, :author_id)';
                    $stmt = $dbh->prepare($sql);
                    $result = $stmt->execute([
                        'title' => $post->title,
                        'body' => $post->body,
                        'author_id' => 1,

                    ]);
                }
            }
        }
    }
}