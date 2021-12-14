<?php

$page = ['title' => 'Toutes les publications'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

$posts = getPosts();

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/admin/header.php';
?>

    <main id="main">
        <div class="container py-5">
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
    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/admin/footer.php'; ?>