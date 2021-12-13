<article class="post-item">
    <div class="post-header">
        <h3>
            <a href="/posts/show.php?id=<?php echo $post['id'] ?>" class="stretched-link"><?php echo $post['title']; ?></a>
        </h3>

        <a class="edit-link" href="/admin/posts/edit.php?id=<?php echo $post['id']; ?>">
            <?php require 'svg/pen.svg.php'; ?>
        </a>
    </div>
    <div class="post-body">
        <p><?php echo $post['excerpt']; ?></p>
    </div>
</article>

