<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$user_id = $_GET['id'];
$data = ['user_id' => $user_id];

$subscriptions = getFollowers($data);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>


<section class="posts-wrapper">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($subscriptions as $subscription): ?>
                <div class="col-md-6 col-lg-4">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/subscription.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>