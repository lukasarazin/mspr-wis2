<?php

$page = ['title' => 'Connexion'];

require_once 'template-parts/layout/header.php';

?>

    <main id="main">

    <section id="auth-content">
    <div class="container fluid">
        <!-- j'ai tenté de changer l'apparence des messages d'erreurs (qui surviendraient en cas de mauvais mot de passe par exemple)
        en utilisant celle de Bootstrap, malheureusement, la fonction que j'avais créé n'a pas marché :( -->
    <div class="card mx-auto shadow rounded-3" style="max-width: 450px; margin-top: 150px;">

        <div class="card-header">
            <h1 class="h2 mb-0">Connexion</h1>
        </div>
        <div class="card-body p-4">
            <form action="api/auth/login.php" method="POST">

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" class="form-control rounded-3" name="email" id="email"
                           maxlength="255"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Mot de passe</label>
                    <input type="password" class="form-control rounded-3" name="password" id="password"
                           maxlength="255" minlength="6" required>
                </div>

                <div class="row">
                    <div class="col-lg-6">

                        <div class="mb-3">
                            <input class="mx-lg-1 rounded-3 " type="checkbox" name="remember" id="remember">
                            <label class="form-label" for="remember">Rester connecté</label>
                            <!-- utilisation de la fonction setcookie non réussie -->
                        </div>
                    </div>

                </div>
                <div>
                    <button type="submit" class="btn btn-outline-dark rounded-3">
                        Connexion
                    </button>
                </div>

            </form>
        </div>
    </div>
    </div>
    </section>

    </main>

    <?php require_once 'template-parts/layout/footer.php'; ?>