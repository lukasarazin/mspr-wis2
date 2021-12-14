<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$auth = getAuth();
$authorPost = getPostAuthor($post);

if ($auth): ?>
    <form action="/api/comments/store.php" method="POST">
        <input type="hidden" id="post_id" name="post_id" value="<?php echo $post['id']; ?>">
        <label for="textarea" class="mb-3">Laisser un commentaire</label>
        <div class="bg-light p-2">
            <div class="d-flex flex-row align-items-start">
                <a href="/users/show.php?id=<?php echo $authorPost['id']; ?>">
                <img class="user-img rounded-circle"
                     src="<?php echo getAvatarUrl($auth['email']); ?>"
                     alt="Photo de profil"
                     title="Photo de profil"
                     loading="lazy"
                     width="30">
                </a>
                <textarea class="form-control shadow-none textarea m-3 comment-body"
                          name="body"
                          id="body"
                          placeholder="Votre commentaire"
                          minlength="5"
                          maxlength="150"
                          required></textarea>
            </div>

        </div>
        <button class="btn btn-primary btn-sm mt-3 mx-auto shadow-none" type="submit">
            Publier
        </button>
    </form>
<?php endif; ?>



