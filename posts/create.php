<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';?>

<main id="main">
<div class="container">
    <div class="form-wrapper py-5 mx-auto" style="max-width: 800px;">
        <h2 class="h2 mb-5">Ajouter une publication</h2>

        <form action="/api/posts/store.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="body" class="form-label">Contenu</label>
                <textarea rows="15" id="body" name="body" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label"></label>
                <input class="form-control" id="image" type="file" accept=".png,.jpg,.jpeg" name="image">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label"></label>
            </div>

            <button type="submit" class="btn btn-outline-success" style="margin-bottom: 250px">Publier</button>

        </form>
    </div>
</div>
</main>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector: '#body', plugins: ['autoresize']});</script>