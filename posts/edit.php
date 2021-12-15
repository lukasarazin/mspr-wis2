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
                    <label for="body" class="form-label">Contenu</label>
                    <textarea rows="15" id="body" name="body"
                              class="form-control"><?php echo $post['body']; ?></textarea>
                </div>

                <div class="mb-3">
                    <img src="<?php echo $post['thumbnail']; ?>" alt="">
                </div>

                <button type="submit" class="btn btn-outline-success">Mettre à jour</button>

            </form>

        </div>


    </main>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: '#body', plugins: ['autoresize']});</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/admin/footer.php'; ?>