<?php

require $_SERVER['DOCUMENT_ROOT'] . 'functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . 'functions/comments.php';

$id = $_GET['id'];

deleteComment($id);

header('Location: /crud/');

