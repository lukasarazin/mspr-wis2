<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';
middleware('auth');
$id = $_GET['id'];

deletePost($id);

header("Location: " . $_SERVER['HTTP_REFERER']);