<?php

require_once '../functions/helpers.php';
require_once '../functions/users.php';

if ($id = getValue($_GET['id'])) {
    $user = getUser($id);
} else {
    $user = getAuth();
}

$posts = getUserPosts($user['id']);

require_once '../template-parts/layout/header.php'; ?>

    <main id="main">

        <section class="py-5" id="profil">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <img class="img-fluid img-profil"
                             src="<?php echo getAvatarUrl($user['email']); ?>"
                             alt="Photo de <?php echo $user['username']; ?>"
                             title="Photo de profil"
                             width="200"
                             height="200"
                             loading="lazy">


                        <div class="about_me">
                            <h1 class="h1"><?php echo $user['username']; ?>
                                <a href="users/edit.php?id=<?php echo $user['id']; ?>">

                                    <img src="/crud/assets/svg/pen.svg" alt="edit" width="20" height="20">

                                    <img src="assets/svg/pen.svg" alt="edit" width="20" height="20">

                                </a>
                            </h1>
                        </div>
                        <span> <?php echo $user['first_name']; ?> </span>
                        <span> <?php echo $user['last_name']; ?> </span>
                    </div>

                    <div class="col-md-10">
                        <section id="posts_profil">
                            <div class="container">
                                <h2 class="h2">Mes publications</h2>
                                <div class="row g-4">
                                    <?php foreach ($posts as $post): ?>
                                        <div class="col-md-6 col-lg-4">
                                            <?php require '../template-parts/post.php'; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>


    </main>

<?php require_once '../template-parts/layout/footer.php'; ?>