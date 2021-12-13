<?php
require_once '../functions/comments.php';
require_once '../functions/helpers.php';
require_once '../functions/users.php';
require_once '../functions/dates.php';

$comment = getComment($_GET['id']);

// foreach ()
$comments = getPostComments($post['id']);

require_once '../template-parts/layout/header.php';

?>

<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<section>
    <div class="container mt-5">

        <?php foreach ($comments as $comment): ?>

            <?php require '../template-parts/comments.php'; ?>
        <?php endforeach; ?>
    </div>
</section>