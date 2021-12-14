<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$auth = getAuth();

if (getValue($auth)) {
    header('Location: /');
    exit;
}

