<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$user_id = $_GET['id'];
$data = ['user_id' => $user_id];

$followers = getFollowers($data);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<section class="posts-wrapper">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($followers as $follower): ?>
                <div class="col-md-6 col-lg-4">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/subscriber.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>