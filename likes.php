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
$authorLike = getLikeAuthor($user);
$auth = getAuth();
$data = ['user_id' => $auth['id']];
$getlikes = getLikes($data);
$likes = storeLikesPost($data);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<article class="posts-wrapper">
    <div class="container">
        <div class="row g-4">

            <h2 class="h2">Mes publications aimées !</h2>

            <?php foreach ($likes

            as $like): ?>

            <div class="like-post py-5">
                <div class="card-body">
                    <?php $storeLikesPost = getPost($like['post_id']); ?>

                    <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . $storeLikesPost['thumbnail'])): ?>

                    <div class="post-thumbnail">
                        <a href="/posts/show.php?id=<?php echo $storeLikesPost['id']; ?>">
                            <img src="<?php echo $storeLikesPost['thumbnail']; ?>"
                                 width="300" height="300"
                            >
                        </a>

                        <?php endif; ?>

                        <div class="post-body">
                            <p><?php echo $storeLikesPost['body']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
</article>