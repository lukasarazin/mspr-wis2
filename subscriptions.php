<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

$user_id = $_GET['id'];
$data = ['user_id' => $user_id];

$subscriptions = getSubscriptions($data);

require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/header.php';

?>

<main id="main-subscriptions">
    <section id="sub-section" class="posts-wrapper py-5">
        <div class="container">
            <div class="row g-4">
                <?php foreach ($subscriptions as $subscription): ?>
                    <div class="col-md-6 col-lg-6 subscription-content">
                        <?php require $_SERVER['DOCUMENT_ROOT'] . '/template-parts/subscription.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/template-parts/layout/footer.php'; ?>