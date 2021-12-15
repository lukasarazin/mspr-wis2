<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/subscriptions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/dates.php';

$subscriber = getSubscriber($_GET['id']);

// foreach ()
$subscriptions = getFollowers();

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<section>
    <div class="container mt-5">

        <?php foreach ($subscribers as $subscriber): ?>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/subscriptions.php'; ?>
        <?php endforeach; ?>
    </div>
</section>