<?php

$page = ['title' => 'Connexion'];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

middleware('guest');
?>

    <main id="main-login">

        <section id="auth-content">
            <div class="container-fluid">
                <div class="connexion card mx-auto shadow rounded-3">

                    <div class="card-header">
                        <h1 class="h2 mb-0">Connexion</h1>
                    </div>
                    <div class="card-body p-4">
                        <form action="api/auth/login.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                       maxlength="255"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="password">Mot de passe</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password"
                                           id="password" maxlength="255" minlength="6"
                                           required>
                                    <button type="button" class="input-group-text btn btn-sm btn-outline-secondary"
                                            id="toggle-password">
                                        <img src="assets/img/open.png" class="eye eye-open" alt="oeil-ouvert">
                                        <img src="assets/img/close.png" class="eye eye-close" alt="oeil-fermé">
                                    </button>
                                </div>
                            </div>


                            <div class="card-content">
                                <div class="mb-3 lost-mdp">
                                    <a href="">Mot de passe oublié ?</a>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn-log rounded-3">
                                    Connexion
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="connexion-footer card mx-auto shadow rounded-3">
                    <div class="inscription-possibility card-body p-4">
                        <span>Vous n'avez pas de compte ?</span>
                        <a href="/register.php" class="btn-log rounded-3">Inscrivez-vous</a>
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
    </script>

<?php require_once 'template-parts/layout/footer.php'; ?>