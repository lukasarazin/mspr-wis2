<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/dates-post.php';

if ($id = getValue($_GET['id'])) {
    $user = getUser($id);
} else {
    $user = getAuth();
}

$auth = getAuth();
$data = [
    'user' => $auth['id'],
    'post_id' => getValue($_POST['post_id']),
    'user_id' => $auth['id'],
];
$posts = getUserPosts($user['id']);
$authorPost = getPostAuthor($post);
$timePost = $post['created_at'];
$timeupdate = $post['updated_at'];
$timePostAgo = createdPostTime($timePost);
$timePostAgoFromUpdate = upadtedPostTime($timeupdate);
$current_time = time();
$likes = getPostLikes($post['id']);
$comments = getPostComments($post['id']);
$countlikes = count($likes);
$countcomments = count($comments);
?>

<article class="post-item">
    <div class="post-header">

        <a class="post-author" href="/users/show.php?id=<?php echo $authorPost['id']; ?>" rel="author">

            <img class="rounded-circle post-author-img" src="<?php echo $authorPost['avatar']; ?>"
                 alt="Photo de <?php echo $authorPost['username']; ?>"
                 title="Photo de <?php echo $authorPost['username']; ?>"
                 width="30"
                 height="30"
                 loading="lazy">

            <span class="post-author-name"><?php echo $authorPost['username'] ?></span>
        </a>

        <?php if ($auth['id'] === $authorPost['id'] || isAdmin($auth)): ?>
            <a class="post-edit-link" href="/posts/edit.php?id=<?php echo $post['id']; ?>">
                <?php require 'svg/pen.svg.php'; ?>
            </a>
        <?php endif; ?>
    </div>

    <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . $post['thumbnail'])): ?>
        <div class="post-thumbnail">
            <a href="/posts/show.php?id=<?php echo $post['id']; ?>">
                <img src="<?php echo $post['thumbnail']; ?>"
                     width="400" height="400"
                     title="Publication de <?php echo $authorPost['username'] ?>"
                     alt="publication de <?php echo $authorPost['username'] ?>">
            </a>
        </div>
    <?php endif; ?>

    <div class="post-body">
        <p><?php echo $post['body']; ?></p>
    </div>

    <div class="post-footer">
        <div class="post-like">

            <?php if ($countlikes === 0): ?>
                <?php if (($auth['id']) !== $post['id']): ?>
                    <form action="/api/users/like.php?id=<?php echo $post['id']; ?>" method="POST">
                        <span class="visually-hidden">Images aimées</span>
                        <button class="like-button" type="submit">
                            <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/svg/heart.svg.php'; ?>
                        </button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <?php if (($auth['id']) !== $post['id']): ?>
                    <form action="/api/users/like.php?id=<?php echo $post['id']; ?>" method="POST">
                        <span class="visually-hidden">Images aimées</span>
                        <button class="like-button" type="submit">
                            <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/svg/heart-post.svg.php'; ?>
                        </button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>

            <data value="<?= $countlikes ?>"><?= $countlikes ?> J'aime</data>

        </div>

        <a href="/posts/show.php?id=<?php echo $post['id'] ?>" style="text-decoration: none;">
            <data value="<?= $countcomments ?>"><?= $countcomments ?> commentaires</data>
        </a>

        <div class="text-muted">
            <?php if ($post['updated_at'] !== $post['created_at']) : ?>
                <time><small><?php echo $timePostAgoFromUpdate ?></small></time>
            <?php else: ?>
                <time><small><?php echo $timePostAgo ?></small></time>
            <?php endif; ?>
        </div>

</article>