<?php

$page = ['title' => 'Inscription'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php'; ?>

<main id="main">

    <section id="auth-content">
        <div class="container">

            <div class="card mx-auto shadow" style="max-width: 600px; margin-top: 200px">

                <div class="card-header">
                    <h1 class="h2 mb-0">Inscription</h1>
                </div>
                <div class="card-body">
                    <form action="api/users/store.php" method="POST">

                        <div class="mb-3">
                            <label class="form-label" for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control" name="username" id="username"
                                   maxlength="255"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" maxlength="255"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password"
                                   maxlength="255" minlength="6" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password_confirm">Confirmation du mot de
                                passe</label>
                            <input type="password" class="form-control" name="password_confirm"
                                   id="password_confirm" maxlength="255" minlength="6"
                                   required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary">
                                Inscription
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </section>

</main>

<?php require_once 'template-parts/layout/footer.php'; ?>