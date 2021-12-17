<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/dates-post.php';

if ($id = getValue($_GET['id'])) {
    $user = getUser($id);
} else {
    $user = getAuth();
}

$posts = getUserPosts($user['id']);
$post = getPost($_GET['id']);
$authorPost = getPostAuthor($post);
$auth = getAuth();
$data = ['user_id' => $auth['id']];
$getlikes = getLikes($data);
$likes = seeMyLikePost($data);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<article class="posts-wrapper">
    <div class="container">
        <div class="row g-4">

            <?php foreach ($likes as $like): ?>
                <?php var_dump($like); ?>
            <?php endforeach; ?>


        </div>
    </div>
</article>