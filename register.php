<?php

$page = ['title' => 'Inscription'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

middleware('guest');
?>

    <main id="main">

        <section id="auth-content">
            <div class="container">

                <div class="card mx-auto shadow rounded-3" style="max-width: 450px; margin-top: 8rem">

                    <div class="card-header">
                        <h1 class="h2 mb-0">Inscription</h1>
                    </div>
                    <div class="card-body py-4">
                        <form action="api/auth/register.php" method="POST">

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

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn-log rounded-3">
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