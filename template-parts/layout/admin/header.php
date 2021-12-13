<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

if (!isAdmin(getAuth())) {
    header('Location: /crud');
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/head.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/navbar.php';

?>

<div id="page-wrapper">
    <div class="row g-0">
        <div class="col-lg-2">

            <aside id="admin-sidebar">
                <nav class="list-group list-group-flush">
                    <a href="/admin"
                       class="list-group-item list-group-item-secondary list-group-item-action <?php echo addCurrentClassUri('/crud/admin/'); ?>">Dashboard</a>
                    <a href="/admin/users"
                       class="list-group-item list-group-item-secondary list-group-item-action <?php echo addCurrentClassUri('/crud/admin/users/'); ?>">Utilisateurs</a>
                    <a href="/admin/posts"
                       class="list-group-item list-group-item-secondary list-group-item-action <?php echo addCurrentClassUri('/crud/admin/posts/'); ?>">Publications</a>
                </nav>
            </aside>

        </div>
        <div class="col-lg-10">
            <div id="content-wrapper">
                <h1 class="h1 d-inline-block mb-4"><?php echo getValue($page['title']) ? $page['title'] : 'Page sans titre'; ?></h1>