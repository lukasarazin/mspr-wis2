<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$user_id = $_GET['id'];
$data = ['user_id' => $user_id];

$likes = getLikes($data);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<section class="posts-wrapper">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($likes as $like): ?>
                <div class="col-md-6 col-lg-4">
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/like.php'; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>