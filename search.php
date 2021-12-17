<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$page = ['title' => "Search"];
$keyword = $_GET['search'];
$users = searchUsers($keyword);
$searchusers = getUsers();

$page = ['title' => "Recherche du terme '$keyword'"];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

    <main id="main">
        <section id="search-users">
            <div class="container">

                <h1>Recherchez un utilisateur : <?php echo $keyword ?></h1>

                <form action="/template-parts/search.php" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search"
                               placeholder="Rechercher  ">

                        <datalist id="search">
                            <?php foreach ($searchusers as $searchuser): ?>
                                <option id="search"
                                        value="<?php echo $searchuser['username'] ?>"><?php echo $searchuser['username'] ?></option>
                            <?php endforeach ?>
                        </datalist>

                    </div>
                </form>

            </div>
        </section>
    </main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>