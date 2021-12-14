<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/comments.php';

$comment = getComment($_GET['id']);

$page = ['title' => "Modifier le commentaire"];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/admin/header.php'; ?>


<form action="/api/comments/delete.php?id=<?php echo $comment['id']; ?>" method="POST" class="mt-2 float-end">
    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
</form>

<main id="main">

    <div class="form-wrapper mt-5 mx-auto" style="max-width: 800px;">

        <form action="/api/comments/update.php?id=<?php echo $comment['id']; ?>" method="POST">

            <div class="form-group mb-3">
                <label for="body" class="form-label">Contenu</label>
                <textarea rows="15" id="body" name="body"
                          class="form-control"><?php echo $comment['body']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-outline-success">Mettre à jour</button>

        </form>

    </div>

</main>

