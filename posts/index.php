<?php require_once '../functions/posts.php';

$posts = getPosts();

require_once '../template-parts/layout/header.php'; ?>

    <main id="main">

        <section class="py-5">
            <div class="container">

                <div class="action-wrapper mb-5 d-flex justify-content-between align-items-center align-content-center">
                    <h3>Liste des publications (publiées par tous les inscrits sur le réseau)</h3>
                    <a href="http://localhost/crud/posts/create.php" class="btn btn-outline-primary">Ajouter une publication</a>
                </div>

                <div class="posts-wrapper">

                    <div class="row g-4">
                        <?php foreach ($posts as $post): ?>
                            <div class="col-md-6 col-lg-4">
                                <?php require '../template-parts/post.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>
        </section>

    </main>

<?php require_once '../template-parts/layout/footer.php'; ?>