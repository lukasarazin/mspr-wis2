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

            <?php $showPosts = getPost($like['post_id']); ?>
            <div class="col-md-6">
                <div class="card card-body posts">
                    <strong class="card-title m-0"><?php echo $showPosts['username']; ?></strong>
                    <span class="artist small"><?php echo $showPosts['artist']; ?></span>
                    <div class="excerpt">
                        <p class="mt-4 opinion"><?php echo $showPosts['excerpt']; ?></p>
                    </div>
                </div>


                <?php var_dump($like); ?>

                <span class="post-author-name"><?php echo $showPosts['username'] ?></span>


            <?php endforeach; ?>


        </div>
    </div>
</article>