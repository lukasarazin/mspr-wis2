<?php
$page = ['title' => 'Accueil'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

middleware('auth');
?>

<main id="main">


    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

    $posts = getPosts(); ?>

    <section id="main-hero">
        <div class="container">

        </div>
    </section>

    <section id="main-body" class="py-5">
        <div class="container">

            <div class="title-wrapper mb-5">
                <h3>VOTRE FEED</h3>
            </div>

            <div class="wrapper">
                <div class="posts-wrapper col-lg-4">
                    <?php foreach ($posts as $post): ?>
                        <div class="post-type">
                            <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/post.php'; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>