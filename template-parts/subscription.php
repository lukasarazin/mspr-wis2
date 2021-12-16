<?php

$auth = getAuth();
$authorSubscribe = getFollowingAuthor($subscription);
$user_id = $subscription['subscriber_id'];
$user = getUser($user_id);

?>
<article>

    <div class="col-lg-8 sub-wrapper">
        <div class="card mt-5 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="user d-flex flex-row align-items-center">
                    <a href="/users/show.php?id=<?php echo $user['id']; ?>">
                        <img class="rounded-circle user-img" <?php if ($user['avatar'] !== true): ?>
                             src="<?php echo getAvatarUrl($user['email']) ?>"
                             alt="Photo de <?php echo $user['username']; ?>"
                             title="Photo de <?php echo $user['username']; ?>"
                             width="30"
                             height="30"
                             loading="lazy">

                        <?php else: ?>
                            <img class="rounded-circle user-img" src="<?php echo $user['avatar']; ?>"
                                 alt="Photo de <?php echo $user['username']; ?>"
                                 title="Photo de <?php echo $user['username']; ?>"
                                 width="30"
                                 height="30"
                                 loading="lazy">
                        <?php endif; ?>

                    </a>

                    <span class="user-pseudo font-weight-bold text-primary p-2">
                            <a href="/users/show.php?id=<?php echo $authorSubscribe['id']; ?>"
                               rel="author"><?php echo $user['username']; ?>
                            </a>
                        </span>
                </div>
            </div>
        </div>

</article>