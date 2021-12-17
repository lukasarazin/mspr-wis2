<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/database.php';

$post = getPost($_GET['id']);
$author = getPostAuthor($post);

$page = ['title' => 'Publication de ' . $author['username']];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

middleware('auth');

?>

    <main id="main">

        <section class="py-3">
            <div class="container-fluid post-show">

                <span>Publié le <time><?php echo $post['created_at'] = date('d M Y'); ?></time> par
                    <a href="/users/show.php?id=<?php echo $author['id']; ?>"
                       rel="author"><?php echo $author['username']; ?>
                    </a>
                </span>

                <p><?php echo $post['body']; ?></p>

                <img src="<?php echo $post['thumbnail']; ?>" alt="" width="400" height="400"
                     title="Pulication de <?php echo $author['username']; ?>"/>

                <hr>
                <div id="com-ancre"></div>
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