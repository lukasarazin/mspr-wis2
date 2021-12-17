<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$page = ['title' => "Accueil"];
$keyword = $_GET['search'];
$users = searchUsers($keyword);

$page = ['title' => "Recherche du terme '$keyword'"];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';
?>
    <main id="main">
        <section id="search-users">
            <div class="search-results-container container mt-5">

                <h1>Recherche pour : <?php echo $_GET['search'] ?></h1>

                <span scope="col" style="color: lightgrey">Résultats </span>

                <?php foreach ($users as $user): ?>
                    <div class="mt-5 d-flex">
                    <?php foreach ($users as $user): ?>
                        <div class="search-result-card">
                            <img class="rounded-circle mx-3" src="<?php echo $user['avatar']; ?>"
                                 alt="Photo de <?php echo $user['username']; ?>"
                                 title="Photo de <?php echo $user['username']; ?>"
                                 width="65"
                                 height="65"
                                 loading="lazy">
                            <div>
                                <a href="/users/show.php?id=<?php echo $user['id'] ?>">
                                    @<?php echo $user['username'] ?>
                                </a>
                                <div>
                                    <?php echo $user['email']; ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    <?php endforeach ?>
                <?php endforeach ?>


            </div>
        </section>
    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>