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
$authorPost = getPostAuthor($post);
$posts = getUserPosts($user['id']);
$subscriptions = getUserSubscribers($user['id']);
$unfollow = getValue($_POST['subscriber_id']);
$count = count($posts);
$countfollowing = count($subscriptions);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

<main id="main">

    <section class="py-5" id="profil">
        <div class="container-fluid">

            <div class="profil-hero">

                <div>
                    <img class="img-fluid img-profil rounded-circle"
                    <img src="<?php echo $user['avatar']; ?>" alt="" width="400" height="400"
                         alt="Photo de <?php echo $user['username']; ?>"
                         title="Photo de profil"
                         width="80"
                         height="80"
                         loading="lazy">

                </div>
                <div class="stats-profil">
                    <data value="<?= $count ?>"><?= $count ?></data>
                    <?php if ($count === 1): ?>
                        <p>Publication</p>
                    <?php else: ?>
                        <p>Publications</p>
                    <?php endif; ?>
                </div>
                <div class="stats-profil">
                    <data value="692">692</data>
                    <p>Abonnés</p>
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

            <div class="container">
                <div class="about_me d-flex">
                    <h4 class="h4"><?php echo $user['username']; ?></h4>
                    <a href="/users/edit.php?id=<?php echo $user['id']; ?>" class="px-4 pt-3">
                        <img src="/assets/svg/pen.svg" alt="edit" width="20" height="20">
                    </a>
                </div>

                <span>biography</span>
            </div>

            <section id="posts_profil">
                <div class="container">

                    <div class="mx-auto mt-4">
                        <?php if (($auth['id']) !== $user['id']): ?>
                            <form action="/api/users/follow.php?id=<?php echo $auth['id']; ?>" method="POST"
                                  class="mt-4">
                                <input type="hidden" id="subscriber_id" name="subscriber_id"
                                       value="<?php echo $user['id']; ?>">
                                <button id="follow" class="btn btn-primary btn-sm mx-auto shadow-none mb-4"
                                        type="submit">
                                    S'abonner
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>

                    <div class="mx-auto">
                        <?php if (($auth['id']) !== $user['id']): ?>
                            <form action="/api/users/unfollow.php?id=<?php echo $auth['id']; ?>" method="POST">
                                <input type="hidden" id="subscriber_id" name="subscriber_id"
                                       value="<?php echo $user['id']; ?>">
                                <button id="unfollow" class="btn btn-danger btn-sm mx-auto shadow-none mb-5"
                                        type="submit">
                                    Se désabonner
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>


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

<script>

    document.addEventListener('DOMContentLoaded', function () {

        let button = document.getElementById('follow');


        if (button) {
            button.addEventListener('click', function () {

                if (bool === 0) {
                    button.innerHTML = "voir plus";
                    bool = 1;
                } else {
                    button.innerHTML = "voir moins";
                    bool = 0;
                }

                square.classList.remove('rounded-circle');
                (GetId("curseur").style.display=="hidden")

            });
        }
    });

</script>
