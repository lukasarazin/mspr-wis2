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


$posts = getUserPosts($user['id']);
$count = count($posts);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

    <main id="main">

        <section class="py-5" id="profil">
            <div class="container-fluid">

                <div class="profil-hero">

                    <div>
                        <img class="img-fluid img-profil rounded-circle"
                             src="<?php echo getAvatarUrl($user['email']); ?>"
                             alt="Photo de <?php echo $user['username']; ?>"
                             title="Photo de profil"
                             width="80"
                             height="80"
                             loading="lazy">

                    </div>
                    <div class="stats-profil">
                        <strong><?= $count ?></strong>
                        <p>Publications</p>
                    </div>
                    <div class="stats-profil">
                        <strong>692</strong>
                        <p>Abonnés</p>
                    </div>
                    <div class="stats-profil">
                        <strong>228</strong>
                        <p>Abonnements</p>
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
                            <a href="/" class="btn btn-primary">S'abonner</a>
                        </div>

                       <!-- <div class="comments-wrapper">
                            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/comments/show.php' ?>
                        </div>
                        <div class="create-comment">
                            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/comments/create.php' ?>
                        </div> -->

                            <div class="profil-header action-wrapper mb-5 d-flex justify-content-end align-items-center align-content-center">
                                <a href="/posts/create.php" class="btn btn-outline-primary">Ajouter une
                                    publication</a>
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