<div class="card card-body posts">
    <strong class="card-title"><?php echo $post['title']; ?></strong>
    <p><?php echo $post['excerpt']; ?></p>
    <a href="/posts/show.php?id=<?php echo $post['id'] ?>" class="btn btn-outline-primary">Lire la suite</a>
</div>