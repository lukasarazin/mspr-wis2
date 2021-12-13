<?php

$page = ['title' => 'Accueil'];

require_once './template-parts/layout/header.php';
?>

    <main id="main">

        <section class="py-5 bg-danger text-white">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="content-wrapper">
                            <h1 class="h1">Bienvenue sur "Nom du réseau""</h1>
                            <p>Si je rédige ce paragraphe c'est uniquement parce que je ne veux pas le même que tout le monde.
                                Lire ceci n'a aucune utilité à part être diverti par un texte vraiment passionnant ne parlant d'aucun sujet précis.
                                Je vais à présent arrêter d'écrire des phrases pour mieux me concentrer sur le reste des étapes à réaliser en php.

                            </p>
                            <a href="posts" class="btn btn-outline-white">Voir les publications</a>

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

<?php require_once './template-parts/layout/footer.php'; ?>