<?php

require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/crud/functions/posts.php';

$id = $_GET['id'];

deletePost($id);

header('Location: /crud/admin/posts');