<?php

require_once 'functions/posts.php';
require_once 'functions/users.php';
require_once 'functions/comments.php';

$siteUrl = 'localhost/';

header('Content-Type: text/xml; charset=UTF-8');
echo '<?xml version = "1.0" encoding = "UTF-8"?>' . "\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc><?php echo $siteUrl; ?></loc>
        <lastmod><?php echo date('Y-m-d'); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>

    <?php foreach (getPosts() as $post): ?>
        <url>
            <loc><?php echo $siteUrl; ?>posts/show.php?id=<?php echo $post['id']; ?></loc>
            <lastmod><?php echo $post['updated_at']; ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
        </url>
    <?php endforeach; ?>

    <?php foreach (getUsers() as $user): ?>
        <url>
            <loc><?php echo $siteUrl; ?>users/show.php?id=<?php echo $user['id']; ?></loc>
            <lastmod><?php echo $user['updated_at']; ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
        </url>
    <?php endforeach; ?>

    <?php foreach (getComments() as $comment): ?>
        <url>
            <loc><?php echo $siteUrl; ?>comments/show.php?id=<?php echo $comment['id']; ?></loc>
            <lastmod><?php echo $comment['updated_at']; ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
        </url>
    <?php endforeach; ?>

</urlset>