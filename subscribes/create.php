<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/subscribes.php';

$auth = getAuth();

if ($auth): ?>
    <form action="/api/comments/store.php" method="POST">
        <button class="btn btn-primary btn-sm mt-4 mx-auto shadow-none" type="submit">

            S'abonner

        </button>
    </form>
<?php endif; ?>



