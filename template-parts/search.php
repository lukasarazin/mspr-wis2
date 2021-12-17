<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '../functions/users.php';

$page = ['title' => "Accueil"];
$keyword = $_GET['search'];
$users = searchUsers($keyword);

$page = ['title' => "Recherche du terme '$keyword'"];

require_once '../template-parts/layout/header.php';
?>
    <main id="main">
        <section id="search-users">
            <div class="container">

                <h1>Recherche pour : <?php echo $_GET['search'] ?></h1>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Comptes associés</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td>
                                <a href="/users/show.php?id=<?php echo $user['id'] ?>">
                                    @<?php echo $user['username'] ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>


            </div>
        </section>
    </main>

<?php require_once '../template-parts/layout/footer.php'; ?>