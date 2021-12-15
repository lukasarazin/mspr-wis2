<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$auth = getAuth();
$authorSubscriber = getSubscriberAuthor($subscriber); ?>

        <div class="mx-auto mt-4">
            <?php if ($auth): ?>
                <form action="/api/subscribers/store.php" method="POST" class="mt-4">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $user['id']; ?>">

                    <button class="btn btn-primary btn-sm mx-auto shadow-none" type="submit">
                        S'abonner
                    </button>
                </form>
            <?php endif; ?>
        </div>




