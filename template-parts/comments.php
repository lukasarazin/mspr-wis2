<?php

$auth = getAuth();
$authorComment = getCommentAuthor($comment);
$timestamp = $comment['published_at'];
$timeupdate = $comment['updated_at'];
$TimeAgo = publishedCommentTime($timestamp);
$TimeAgoFromUpdate = upadtedCommentTime($timeupdate);
$current_time = time();
?>

<div class="d-flex justify-content-center row">

    <div class="col-lg-8">
        <div class="card mt-5 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="user d-flex flex-row align-items-center">
                    <img class="user-img rounded-circle"
                         src="<?php echo getAvatarUrl($authorComment['email']); ?>"
                         alt="Photo de profil"
                         title="Photo de profil"
                         loading="lazy"
                         width="30">

                    <span>
                                    <span class="font-weight-bold text-primary p-2">
                                        <a href="users/show.php?id=<?php echo $authorComment['id']; ?>"
                                           rel="author"><?php echo $authorComment['username'] ?>
                                        </a>
                                    </span>

                                    <small class="font-weight-bold">
                                        <span><?php echo $comment['body'] ?></span>
                                    </small>
                            </span>
                </div>

                <div class="d-flex flex-row align-items-center">
                    <?php if($comment['updated_at'] !== $comment['published_at']) : ?>
                    <time><small style="font-size: 70%;"><?php echo $TimeAgoFromUpdate ?></small></time>
                    <?php else: ?>
                    <time><small style="font-size: 70%;"><?php echo $TimeAgo ?></small></time>
                    <?php endif; ?>
                    <?php if (isAdmin($auth) && ($authorComment['email'] = $auth['email'])) : ?>
                    <form action="comments/edit.php?id=<?php echo $comment['id']; ?>"
                          method="POST">
                        <button class="btn" type="submit">
                            <i class="fas fa-pen" style="color: grey; padding-left: 4px; margin-right: -5px;"></i>
                        </button>
                    </form

                    <form action="api/comments/delete.php?id=<?php echo $comment['id']; ?>"
                          method="POST">
                        <button class="btn" type="submit">
                            <i class="fas fa-trash" style="color: red;"></i>
                        </button>
                    </form
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div>
        <a href="#" class="like"><i class="fa fa-thumbs-up" style="color: black;"></i></a>
        <sup class="me-2"> 123 <!-- $comment->like_count --> </sup>
        <a href="#" class="dislike"><i class="fa fa-thumbs-down" style="color: black; --bs-table-hover-color: blue;"></i></a>
        <sup> 15 <!-- $comment->dislike_count --> </sup>
    </div>
</div>

</div>