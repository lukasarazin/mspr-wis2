<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

$post = getPost($_GET['id']);

$page = ['title' => "Modifier l'article"];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

middleware('auth');

?>

    <form action="/api/posts/delete.php?id=<?php echo $post['id']; ?>" method="POST" class="mt-2 float-end">
        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
    </form>

    <main id="main">

        <div class="form-wrapper mt-5 mx-auto" style="max-width: 800px;">

            <form action="/api/posts/update.php?id=<?php echo $post['id']; ?>" method="POST">

                <div class="form-group mb-3">
                    <label for="title" class="form-label">Titre de l'article</label>
                    <input type="text" id="title" name="title" class="form-control"
                           value="<?php echo $post['title']; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="excerpt" class="form-label">Résumé</label>
                    <textarea rows="3" id="excerpt" name="excerpt" class="form-control"
                              required><?php echo $post['excerpt']; ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="body" class="form-label">Contenu</label>
                    <textarea rows="15" id="body" name="body"
                              class="form-control"><?php echo $post['body']; ?></textarea>
                </div>

                <button type="submit" class="btn btn-outline-success">Mettre à jour</button>

            </form>

        </div>

    </main>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: '#body', plugins: ['autoresize']});</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/admin/footer.php'; ?>