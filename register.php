<?php

$page = ['title' => 'Inscription'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

middleware('guest');
?>

    <main id="main">

        <section id="auth-content">
            <div class="container">

                <?php if (getValue($_GET['error'])): ?>
                    <div id="alert" class="alert alert-danger" role="alert">
                        <p class="mb-0">Le mot de passe ne correspond pas à la confirmation</p>
                    </div>
                <?php endif; ?>

                <div class="connexion card mx-auto shadow rounded-3">

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
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password"
                                           maxlength="255" minlength="6" required>
                                    <button type="button" class="input-group-text btn btn-sm btn-outline-secondary"
                                            id="toggle-password">
                                        <img src="assets/img/open.png" class="eye eye-open" alt="oeil-ouvert">
                                        <img src="assets/img/close.png" class="eye eye-close" alt="oeil-fermé">
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password_confirm">Confirmation du mot de
                                    passe</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirm"
                                           id="password_confirm" maxlength="255" minlength="6"
                                           required>
                                    <button type="button" class="input-group-text btn btn-sm btn-outline-secondary"
                                            id="toggle-password-confirm">
                                        <img src="assets/img/open.png" class="eye eye-open" alt="oeil-ouvert">
                                        <img src="assets/img/close.png" class="eye eye-close" alt="oeil-fermé">
                                    </button>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button id="register-submit" type="submit" class="btn-log rounded-3">
                                    Inscription
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="connexion-footer card mx-auto shadow rounded-3">
                    <div class="inscription-possibility card-body p-4">
                        <span>Déjà membre ?</span>
                        <a href="/login.php" class="btn-log rounded-3">Connectez-vous</a>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <script src="src/js/alert.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            let input = document.getElementById('password');
            let button = document.getElementById('toggle-password');

            button.addEventListener('click', function () {
                button.classList.toggle('active');
                if (input.type === 'password') {
                    input.type = 'text';
                } else {
                    input.type = 'password'
                }
            });

        })

        document.addEventListener('DOMContentLoaded', function () {
            let inputConfirm = document.getElementById('password_confirm');
            let buttonConfirm = document.getElementById('toggle-password-confirm');

            buttonConfirm.addEventListener('click', function () {
                buttonConfirm.classList.toggle('active');
                if (inputConfirm.type === 'password') {
                    inputConfirm.type = 'text';
                } else {
                    inputConfirm.type = 'password'
                }
            });

        })
    </script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>