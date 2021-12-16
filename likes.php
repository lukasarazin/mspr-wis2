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


var_dump($likes);
require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<section class="posts-wrapper">
    <div class="container">
        <div class="row g-4">

            <?php foreach ($likes as $like): ?>
                <div class="col-md-6 col-lg-4">
                    <?php var_dump (getPost($like['post_id'])) ?>
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
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</section>