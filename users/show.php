<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

middleware('auth');

if ($id = getValue($_GET['id'])) {
    $user = getUser($id);
} else {
    $user = getAuth();
}


$post = getPost($_GET['id']);
$auth = getAuth();
$subscriber_id = getValue($_GET['id']) ? $_GET['id'] : $auth['id'];
$data = [
    'user' => $auth['id'],
    'subscriber_id' => $subscriber_id,
    'user_id' => $auth['id'],
];
$authorPost = getPostAuthor($post);
$posts = getUserPosts($user['id']);
$subscriptions = getUserSubscribers($user['id']);
$subscribers = getSubscribersUser($user['id']);
$likes = getUserLikes($user['id']);
$follow = follow(['subscribe_id']);
$count = count($posts);
$countfollowing = count($subscriptions);
$countfollowers = count($subscribers);
$countlikes = count($likes);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

<main id="main-user">

    <section class="py-5" id="profil">
        <div class="container">


            <div class="profil-header">

                    <img class="rounded-circle" src="<?php echo $user['avatar']; ?>"
                         alt="Photo de <?php echo $user['username']; ?>"
                         title="Photo de <?php echo $user['username']; ?>"
                         width="150"
                         height="150"
                         loading="lazy">


                <div class="about_me">
                    <h4 class="h4"><?php echo $user['username']; ?></h4>
                    <?php if (($auth['id']) === $user['id']): ?>
                        <a href="/users/edit.php?id=<?php echo $user['id']; ?>" class="px-4 pt-3">
                            <img src="/assets/svg/pen.svg" alt="edit" width="20" height="20">
                        </a>
                    <?php endif; ?>
                </div>

                <p class="mt-4 mx-auto"><?php echo $user['biography']; ?></p>
            </div>
            <div class="profil-hero mb-5">
                <div class="stats-profil">
                    <data value="<?= $count ?>"><?= $count ?></data>
                    <?php if ($count === 1): ?>
                        <p>Publication</p>
                    <?php elseif ($count === 0): ?>
                        <p>Publication</p>
                    <?php else: ?>
                        <p>Publications</p>
                    <?php endif; ?>
                </div>
                <div class="stats-profil">
                    <data value="<?= $countfollowers ?>"><?= $countfollowers ?></data>
                        <a href="/subscribers.php?id=<?php echo $user['id']; ?>">Abonn??<?php $countfollowers > 1 ? 's' : null; ?></a>
                </div>

                <div class="stats-profil">
                    <data value="<?= $countfollowing ?>"><?= $countfollowing ?></data>
                    <a href="/subscriptions.php?id=<?php echo $user['id']; ?>">Abonnement<?php $countfollowers > 1 ? 's' : null; ?></a>
                </div>

            </div>


            <section id="posts_profil">
                <div class="container">

                    <?php if (isFollowed($data)): ?>
                        <div class="mx-auto" id="toggle-unfollow">
                            <?php if (($auth['id']) !== $user['id']): ?>
                                <form action="/api/users/follow.php?id=<?php echo $auth['id']; ?>" method="POST">
                                    <input type="hidden" id="subscriber_id" name="subscriber_id"
                                           value="<?php echo $user['id']; ?>">
                                    <button id="unfollow" class="btn btn-danger btn-sm mx-auto shadow-none mb-5"
                                            type="submit">
                                        Se d??sabonner
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="mx-auto" id="toggle">
                            <?php if (($auth['id']) !== $user['id']): ?>
                                <form action="/api/users/follow.php?id=<?php echo $auth['id']; ?>" method="POST">
                                    <input type="hidden" id="subscriber_id" name="subscriber_id"
                                           value="<?php echo $user['id']; ?>">
                                    <button id="follow" class="btn btn-primary btn-sm mx-auto shadow-none mb-5"
                                            type="submit">
                                        S'abonner
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="subscribers-wrapper">
                        <?php // require_once $_SERVER['DOCUMENT_ROOT'] . '/subscribers/show.php' ?>

                    </div>
                    <div class="create-subscribers">
                        <?php // require_once $_SERVER['DOCUMENT_ROOT'] . '/subscribers/create.php' ?>
                    </div>

                    <div class="row g-4">
                        <?php foreach ($posts as $post): ?>
                            <div class="col-md-6 col-lg-4">
                                <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/post.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        </div>
    </section>


</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>

