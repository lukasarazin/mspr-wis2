<?php
$page = ['title' => 'Accueil'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

middleware('auth');
?>

<main id="main">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

    $posts = getPosts();

    require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

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


<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
<script>
    function addDarkmodeWidget() {
        new Darkmode().showWidget();
    }

    window.addEventListener('load', addDarkmodeWidget);

    const options = {
        bottom: '64px', // default: '32px'
        right: 'unset', // default: '32px'
        left: '32px', // default: 'unset'
        time: '0.2s', // default: '0.3s'
        mixColor: '#fff', // default: '#fff'
        backgroundColor: '#fff',  // default: '#fff'
        buttonColorDark: '#100f2c',  // default: '#100f2c'
        buttonColorLight: '#fff', // default: '#fff'
        saveInCookies: true, // default: true,
        label: '🌗', // default: ''
        autoMatchOsTheme: true // default: true
    }

    const darkmode = new Darkmode(options);
    darkmode.showWidget();
</script>