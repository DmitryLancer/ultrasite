<?php

namespace controller;


use model\DataBase;
use PDO;

class PostController extends Controller
{
    public function actionIndex()
    {
        include __DIR__ . '/../view/content.php';

        require __DIR__ . '/../model/Post.php';

        $post = new \model\Post();
        $database = new DataBase();

        $post->title = $this->cleanParameters('title');
        $post->body = $this->cleanParameters('body');

        $errors = [];

        $flag = 0;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!($_POST['action'] == 'registration')) {
                if ($post->strTitle() < 2 ||  $post->strTitle() > 50) {
                    $errors['title'] = '<small class="text-danger">Недопустимая длина заголовка (от 2 до 50 символов)</small>';
                    $flag = 1;

                }
                if ($post->strBody() < 10 ||  $post->strBody() > 250) {
                    $errors['body'] = '<small class="text-danger">Недопустимая длина текста (от 10 до 250 символов)</small>';
                    $flag = 1;

                }

                if ($flag == 1) {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }

                if ($flag == 0) {
                    $database->savePost($post);
                }
            }
        }
    }
}