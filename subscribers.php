<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$user_id = $_GET['id'];
$data = ['user_id' => $user_id];
$auth = getAuth();

$getUser = getUser($user_id);
$followers = getFollowers($data);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<article class="posts-wrapper">
    <div class="container">
        <div class="row g-4">
            <?php foreach ($followers

            as $follower): ?>
            <div class="col-md-6 col-lg-4">

                <div class="col-lg-8">
                    <div class="card mt-5 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center">
                                <a href="/users/show.php?id=<?php echo $getUser['id']; ?>">
                                    <img class="user-img rounded-circle"
                                         src="<?php echo getAvatarUrl($getUser['email']); ?>"
                                         alt="Photo de profil"
                                         title="Photo de profil"
                                         loading="lazy"
                                         width="30">
                                </a>

                                <span class="font-weight-bold text-primary p-2">
                            <a href="/users/show.php?id=<?php echo $getUser['id']; ?>"
                               rel="author"><?php echo $getUser['username']; ?>
                            </a>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
</article>