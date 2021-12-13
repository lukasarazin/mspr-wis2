<?php

$page = ['title' => 'Toutes les publications'];

require_once '../../functions/posts.php';

$posts = getPosts();

require_once '../../template-parts/layout/admin/header.php';
?>

    <a href="admin/posts/create.php" class="btn btn-outline-primary mt-2 float-end">Ajouter une publication</a>

    <main id="main">

        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date de publication</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post): ?>
            <?php $author = getPostAuthor($post); ?>
                <tr>
                    <td><?php echo $post['id']; ?></td>
                    <td>
                        <a href="admin/posts/edit.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
                    </td>
                    <td><?php echo getValue($author['username']) ? $author['username'] : '-'; ?></td>
                    <td><?php echo $post['published_at']; ?></td>
                    <td>
                        <a href="admin/posts/edit.php?id=<?php echo $post['id']; ?>"
                           class="btn btn-sm btn-outline-warning">Edit</a>
                        <a href="posts/show.php?id=<?php echo $post['id']; ?>&preview=true"
                           class="btn btn-sm btn-outline-info">Preview</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </main>

<?php require_once '../../template-parts/layout/admin/footer.php'; ?>