<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

$post = getPost($_GET['id']);
$author = getPostAuthor($post);

$page = [
    'title' => $post['title'],
    'description' => $post['excerpt'],
];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

    <main id="main">

        <section class="py-5">
            <div class="container">

                <h1 class="h1"><?php echo $post['title']; ?></h1>

                <span>Publié le <time><?php echo $post['created_at'] = date('d F Y'); ?></time> par
                    <a href="/users/show.php?id=<?php echo $author['id']; ?>"
                       rel="author"><?php echo $author['username']; ?>
                    </a>
                </span>

                <p class="lead"><?php echo $post['excerpt']; ?></p>

                <?php echo $post['body']; ?>

                <div class="comments-wrapper">
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/comments/show.php' ?>
                </div>
                <div class="create-comment">
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/comments/create.php' ?>
                </div>

            </div>
        </section>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>