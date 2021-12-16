<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$user_id = $_GET['id'];
$data = ['user_id' => $user_id];
$auth = getAuth();

$followers = getFollowers($data);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<article class="posts-wrapper">
    <div class="container">

        <div class="row g-4">
            <?php foreach ($followers as $follower): ?>
            <?php $user = getUser($follower['user_id']); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card mt-5 p-3">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center">
                                <a href="/users/show.php?id=<?php echo $user['id']; ?>">
                                    <img class="user-img rounded-circle"
                                         src="<?php echo getAvatarUrl($user['email']); ?>"
                                         alt="Photo de profil"
                                         title="Photo de profil"
                                         loading="lazy"
                                         width="30">
                                </a>

                                <span class="font-weight-bold text-primary p-2">
                                    <a href="/users/show.php?id=<?php echo $user['id']; ?>"
                                       rel="author"><?php echo $user['username']; ?>
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