<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

middleware('auth');

if ($id = getValue($_GET['id'])) {
    $user = getUser($id);
} else {
    $user = getAuth();
}

$posts = getUserPosts($user['id']);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

    <main id="main">

        <section class="profil py-5" id="profil">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">

                        <form action="/api/users/update.php?id=<?php echo $user['id']; ?>" method="POST"
                              enctype="multipart/form-data">

                            <img class="img-fluid img-profil"
                                 src="<?php echo $user['avatar']; ?>" alt="" width="400" height="400"
                                 alt="Photo de <?php echo $user['username']; ?>"
                                 title="Photo de profil"
                                 width="200"
                                 height="200"
                                 loading="lazy">

                            <div class="mb-3">
                                <label for="avatar" class="form-label"></label>
                                <input class="form-control" id="avatar" type="file" accept=".png,.jpg,.jpeg"
                                       name="avatar">
                            </div>

                            <fieldset class="mb-3">
                                <legend>Pseudo</legend>
                                <input type="text" name="username" id="username"
                                       value="<?php echo $user['username']; ?>">
                            </fieldset>

                            <fieldset class="mb-3">
                                <legend>Prénom</legend>
                                <input type="text" placeholder="Prénom" name="first_name" id="first_name"
                                       value="<?php echo $user['first_name']; ?>">
                            </fieldset>

                            <fieldset class="mb-3">
                                <legend>Nom</legend>
                                <input type="text" placeholder="Nom" name="last_name" id="last_name"
                                       value="<?php echo $user['last_name']; ?>">
                            </fieldset>

                            <button type="submit" class="btn btn-outline-info">Confirmer</button>

                        </form>

                    </div>
                    <div class="col-md-10">
                        <section>
                            <div class="container">

                                <h2 class="h2">Liste des publications</h2>

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
                </div>


            </div>
        </section>


    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>