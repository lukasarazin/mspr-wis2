<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

middleware('auth');

$id = $_GET['id'];

if (getValue($_POST) && $id) {


    $data = [
        'body'      => getValue($_POST['body']),
    ];

    $postId = updatePost($id, $data);


    header("Location: /posts/show.php?id=$postId");
    exit();
}