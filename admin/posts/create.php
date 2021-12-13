<?php

$page = ['title' => 'Ajouter un article'];

require_once '../../template-parts/layout/admin/header.php'; ?>

    <main id="main">

        <div class="form-wrapper mt-5 mx-auto" style="max-width: 800px;">
            <form action="api/posts/store.php" method="POST">

                <div class="form-group mb-3">
                    <label for="title" class="form-label">Titre de l'article</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="excerpt" class="form-label">Résumé</label>
                    <textarea rows="3" id="excerpt" name="excerpt" class="form-control" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="body" class="form-label">Contenu</label>
                    <textarea rows="15" id="body" name="body" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-outline-success">Publier</button>

            </form>
        </div>

    </main> 
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: '#body', plugins: ['autoresize']});</script>

<?php require_once '../../template-parts/layout/admin/footer.php'; ?>