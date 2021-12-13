<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

$id = $_GET['id'];

restorePost($id);

header('Location: /admin/posts');