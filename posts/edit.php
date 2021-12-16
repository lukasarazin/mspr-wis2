<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/posts.php';

$post = getPost($_GET['id']);

$page = ['title' => "Modifier le post"];

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

middleware('auth');

?>

    <main id="main-post-edit">

        <div class="form-wrapper post-update-wrapper mx-auto" style="max-width: 800px;">

            <form action="/api/posts/delete.php?id=<?php echo $post['id']; ?>" method="POST" class="mt-2 float-end">
                <button type="submit" class="btn btn-outline-danger">Supprimer</button>
            </form>

            <form action="/api/posts/update.php?id=<?php echo $post['id']; ?>" method="POST">


                <div class="form-group post-update-label mb-3">
                    <label for="body" class="form-label">Que voulez-vous dire ?</label>
                </div>
                <div class="post-update-group">
                    <textarea rows="5" id="body" name="body"
                              class="form-control mt-5 post-update-content"><?php echo $post['body']; ?></textarea>
                </div>

                <div class="mb-3 post-update-img">
                    <img src="<?php echo $post['thumbnail']; ?>" alt="">
                </div>

                <button type="submit" class="btn btn-outline-success">Mettre à jour</button>

            </form>

        </div>


    </main>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: '#body', plugins: ['autoresize']});</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/admin/footer.php'; ?>