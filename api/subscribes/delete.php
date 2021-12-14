<?php

require $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require $_SERVER['DOCUMENT_ROOT'] . '/functions/subscribes.php';

middleware('auth');

$id = $_GET['id'];

deleteSubscribe($id);

header('Location: /');

