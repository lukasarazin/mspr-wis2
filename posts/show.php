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

        <section class="post-item w-50 mx-auto mt-5 mb-5">
            <div class="container">

                    <div class="body-header-2 mt-2">
                       <span>Publié le <time><?php echo $post['created_at'] = date('d M Y'); ?></time> par
                    <a href="/users/show.php?id=<?php echo $author['id']; ?>"
                       rel="author"><?php echo $author['username']; ?>
                    </a>
                </span>
                    </div>

                <div class="post-header-2 mt-3">

                    <p><?php echo $post['body']; ?></p>

                </div>

                <div class="post-thumbnail-2">
                <img src="<?php echo $post['thumbnail']; ?>" alt="" max-width="400" height="400"
                     title="Pulication de <?php echo $author['username']; ?>"/>
                </div>

                <hr>

                <div id="com-ancre"></div>
                <div class="comments-wrapper">
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/comments/show.php' ?>
                </div>

                <div class="create-comment mb-5">
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/comments/create.php' ?>
                </div>

            </div>

        </section>

    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>