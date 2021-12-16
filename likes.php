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

$auth = getAuth();
$data = ['user_id' => $auth['id']];
$likes = getLikes($data);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<article class="posts-wrapper">
    <div class="container">
        <div class="row g-4">

            <?php foreach ($likes as $like): ?>
                <?php var_dump($like); ?>
                <div class="profil-img">
                    <a href="/users/show.php?id=<?php echo $user['id']; ?>">
                        <img class="user-img rounded-circle"
                             src="<?php echo getAvatarUrl($user['email']); ?>"
                             alt="Photo de profil"
                             title="Photo de profil"
                             loading="lazy"
                             width="30">
                    </a>
                </div>



            <?php endforeach; ?>


        </div>
    </div>
</article>