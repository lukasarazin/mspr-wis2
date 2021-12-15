<?php

$auth = getAuth();
$authorSubscribe = getSubscribeAuthor($subscription);
$user_id = $subscription['user_id'];
$user = getUser($user_id);

?>
<article>

    <div class="col-lg-8">
        <div class="card mt-5 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="user d-flex flex-row align-items-center">
                    <a href="/users/show.php?id=<?php echo $user['id']; ?>">
                        <img class="user-img rounded-circle"
                             src="<?php echo getAvatarUrl($user['email']); ?>"
                             alt="Photo de profil"
                             title="Photo de profil"
                             loading="lazy"
                             width="30">
                    </a>

                    <span class="font-weight-bold text-primary p-2">
                            <a href="/users/show.php?id=<?php echo $authorSubscribe['id']; ?>"
                               rel="author"><?php echo $user['username']; ?>
                            </a>
                        </span>
                </div>
</article>