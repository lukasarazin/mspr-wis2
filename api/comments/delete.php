<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';

middleware('auth');

$id = $_GET['id'];

deleteComment($id);

header('Location: /crud/');

