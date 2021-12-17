<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

middleware('auth');

if ($id = getValue($_GET['id'])) {
    $user = getUser($id);
    //$userAvatar = getUserAvatar($id);
} else {
    $user = getAuth();
}

$posts = getUserPosts($user['id']);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

    <main id="main-user">

        <section class="profil py-5" id="profil">
            <div class="container post-show">
                <div class="card align-items-center m-5 shadow rounded-3">
                    <div class="card-header">
                        <h2>Modifiez votre profil</h2>
                    </div>
                    <div class="card-body p-2">
                        <form class="user-edit-form" action="/api/users/update.php?id=<?php echo $user['id']; ?>"
                              method="POST"
                              enctype="multipart/form-data">

                            <img class="img-profil mt-5" src="<?php echo $user['avatar']; ?>"
                                 alt="Photo de <?php echo $user['username']; ?>"
                                 title="Photo de <?php echo $user['username']; ?>"
                                 width="400"
                                 height="400"
                                 loading="lazy">

                            <div class="mb-5">
                                <label for="avatar" class="form-label"></label>
                                <input class="form-control" id="avatar" type="file" accept=".png,.jpg,.jpeg"
                                       name="avatar">
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Nom d'utilisateur</label>
                                <input class="form-control" type="text" name="username" id="username"
                                       value="<?php echo $user['username']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="biography" class="form-label">Résumé de votre profil</label>
                                <input class="form-control" type="text" name="biography" id="biography"
                                       value="<?php echo $user['biography']; ?>">
                            </div>

                            <!-- <div class="mb-3">
                                 <label>Site web</label>
                                 <input class="form-control" type="url" name="link" id="link"
                                        value=" //echo $user['first_name']; ?>">
                             </div> -->

                            <div class="mb-3">
                                <label for="first_name" class="form-label">Prénom</label>
                                <input class="form-control" type="text" placeholder="Prénom" name="first_name"
                                       id="first_name"
                                       value="<?php echo $user['first_name']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Nom</label>
                                <input class="form-control" type="text" placeholder="Nom" name="last_name"
                                       id="last_name"
                                       value="<?php echo $user['last_name']; ?>">
                            </div>
                        </form>
                    </div>

                    <button type="submit" class="btn-log mb-5 rounded-3">Confirmer</button>

                </div>



            </div>

        </section>


    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>