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
$data = [
    'user' => $auth['id'],
    'subscriber_id' => getValue($_POST['subscriber_id']),
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
            <div class="profil-hero">
                <div class="stats-profil">
                    <data value="<?= $count ?>"><?= $count ?></data>
                    <?php if ($count === 1): ?>
                        <p>Publication</p>
                    <?php else: ?>
                        <p>Publications</p>
                    <?php endif; ?>
                </div>
                <div class="stats-profil">
                    <data value="<?= $countfollowers ?>"><?= $countfollowers ?></data>
                    <?php if ($countfollowers === 1): ?>
                        <a href="/subscribers.php?id=<?php echo $user['id']; ?>">Abonné</a>
                    <?php else: ?>
                        <a href="/subscribers.php?id=<?php echo $user['id']; ?>">Abonnés</a>
                    <?php endif; ?>
                </div>

                <div class="stats-profil">
                    <data value="<?= $countfollowing ?>"><?= $countfollowing ?></data>
                    <?php if ($countfollowing === 1): ?>
                        <a href="/subscriptions.php?id=<?php echo $user['id']; ?>">Abonnement</a>
                    <?php else: ?>
                        <a href="/subscriptions.php?id=<?php echo $user['id']; ?>">Abonnements</a>
                    <?php endif; ?>
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
                                        Se désabonner
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

                    <?php if (($auth['id']) === $user['id']): ?>
                        <div class="profil-header action-wrapper mb-5 d-flex justify-content-end align-items-center align-content-center">
                            <a href="/posts/create.php" class="btn btn-outline-primary">Ajouter une
                                publication</a>
                        </div>
                    <?php endif; ?>

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

