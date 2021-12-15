<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/dates-post.php';

$auth = getAuth();
$authorPost = getPostAuthor($post);
$timePost = $post['created_at'];
$timeupdate = $post['updated_at'];
$timePostAgo = createdPostTime($timePost);
$timePostAgoFromUpdate = upadtedPostTime($timeupdate);
$current_time = time();

?>

<article class="post-item">
    <div class="post-header">

        <div class="profil-img">
            <a href="/users/show.php?id=<?php echo $authorPost['id']; ?>">
                <img class="user-img rounded-circle"
                     src="<?php echo getAvatarUrl($authorPost['email']); ?>"
                     alt="Photo de profil"
                     title="Photo de profil"
                     loading="lazy"
                     width="30">
            </a>
        </div>

        <a class="author-name" href="/users/show.php?id=<?php echo $authorPost['id']; ?>"
           rel="author"><?php echo $authorPost['username'] ?></a>

        <?php if ($auth['id'] === $authorPost['id'] || isAdmin($auth)): ?>

            <a class="edit-link" href="/posts/edit.php?id=<?php echo $post['id']; ?>">
                <?php require 'svg/pen.svg.php'; ?>
            </a>

        <?php endif; ?>
    </div>

    <div class="post-img">
        <a href="/posts/show.php?id=<?php echo $post['id'] ?>" class="stretched-link">
            <img src="<?php echo $post['thumbnail']; ?>" class="card-img-top" alt="un chateau fort très fort">
            <?php // echo $post['title']; ?>
        </a>
    </div>

    <div class="post-body">
        <p><?php echo $post['body']; ?></p>
        <div class="time-published">
            <?php if ($post['updated_at'] !== $post['created_at']) : ?>
                <time><small><?php echo $timePostAgoFromUpdate ?></small></time>
            <?php else: ?>
                <time><small><?php echo $timePostAgo ?></small></time>
            <?php endif; ?>
        </div>
        <!-- <small class="card-text">Publié le <time><?php echo $post['created_at'] = date('d M Y'); ?></time></small> -->
    </div>

</article>