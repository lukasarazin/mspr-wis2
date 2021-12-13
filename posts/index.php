<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

$posts = getPosts();

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

    <main id="main">

        <section class="py-5">
            <div class="container">

                <div class="action-wrapper mb-5 d-flex justify-content-between align-items-center align-content-center">
                    <h3>Liste des publications (publiées par tous les inscrits sur le réseau)</h3>
                    <a href="/posts/create.php" class="btn btn-outline-primary">Ajouter une publication</a>
                </div>

                <div class="posts-wrapper">

                    <div class="row g-4">
                        <?php foreach ($posts as $post): ?>
                            <div class="col-md-6 col-lg-4">
                                <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/post.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

            </div>
        </section>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>