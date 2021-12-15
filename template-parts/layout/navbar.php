<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

if ($id = getValue($_GET['id'])) {
    $user = getUser($id);
} else {
    $user = getAuth();
}
$auth = getAuth();
?>
<?php if (getValue($auth)): ?>
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">

                <div class="logo">
                    <a class="navbar-brand" href="/">
                        <img src="/assets/img/logo.png" alt="" width="50" height="50">
                        <span>Pet Swap</span></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">

                        <?php if (getValue($auth)): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    <span class="visually-hidden">Accueil</span>
                                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/svg/home.svg.php'; ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (getValue($auth)): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/likes.php?id=<?php echo $user['id']; ?>">
                                    <span class="visually-hidden">Images aimées</span>
                                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/svg/heart.svg.php'; ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (getValue($auth)): ?>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="/users/show.php">
                                    <span class="visually-hidden">Profil</span>
                                    <img
                                            class="user-img rounded-circle"
                                            src="<?php echo getAvatarUrl($user['email']); ?>"
                                            alt="Photo de profil"
                                            title="Photo de profil"
                                            loading="lazy"
                                            width="25"></a>
                            </li>
                            <?php if (isAdmin($auth)): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin">Admin</a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a href="/" class="nav-link"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="/api/auth/logout.php" method="POST"
                                      style="display: none">
                                    <button type="submit" class="nav-link">Submit</button>
                                </form>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/register.php">Inscription</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/login.php">Connexion</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
<?php endif; ?>