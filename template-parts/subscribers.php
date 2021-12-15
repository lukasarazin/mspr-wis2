<?php

$auth = getAuth();
$authorSubscriber = getSubscriberAuthor($subscriber);
?>

<div class="d-flex justify-content-center row">

    <div class="col-lg-8">
        <div class="card mt-5 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="user d-flex flex-row align-items-center">

                    <a href="/users/show.php?id=<?php echo $authorSubscriber['id']; ?>">
                        <img class="user-img rounded-circle"
                             src="<?php echo getAvatarUrl($authorSubscriber['email']); ?>"
                             alt="Photo de profil"
                             title="Photo de profil"
                             loading="lazy"
                             width="30">
                    </a>

                    <span>
                        <span class="font-weight-bold text-primary p-2">
                            <a href="/users/show.php?id=<?php echo $authorSubscriber['id']; ?>"
                               rel="author"><?php echo $authorSubscriber['username'] ?>
                            </a>
                        </span>

                    </span>
                </div>

            </div>
        </div>
    </div>
</div>

