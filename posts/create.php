<?php

$page = ['title' => 'Ajouter un article'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo $_FILES['thumbnail']['name'];/* nom du fichier */

    echo $_FILES['thumbnail']['type']; /* type du fichier */

    echo $_FILES['thumbnail']['size']; /* taille en octets */

    echo $_FILES['thumbnail']['tmp_name']; /* emplacement du fichier temporaire sur le serveur */

    echo $_FILES['thumbnail']['error']; /* code erreur du téléchargement */
}
$uploads = '/uploads/';

if (isset($_FILES['thumbnail']) && is_uploaded_file($_FILES['thumbnail']['tmp_name'])) {
    $origine = $_FILES['thumbnail']['tmp_name'];

    $uploads = $_FILES['thumbnail']['name'];

    move_unfile_form_data($origine, $uploads);

}
require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';


<main id="main">

    <div class="form-wrapper mt-5 mx-auto" style="max-width: 800px;">
        <form action="/api/posts/store.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mb-3">
                <label for="body" class="form-label">Contenu</label>
                <textarea rows="15" id="body" name="body" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label"></label>
                <input class="form-control" id="image" type="file" accept=".png,.jpg,.jpeg" name="image">
            </div>

            <button type="submit" class="btn btn-outline-success">Publier</button>

        </form>
    </div>

</main>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector: '#body', plugins: ['autoresize']});</script>