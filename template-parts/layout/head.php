<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon">
    <link rel="icon" href="/assets/img/logo.png" type="image/x-icon">
    <title><?php echo getValue($page['title']) ? $page['title'] : 'Page sans titre'; ?> | Pet Swap</title>
    <?php if (getValue($page['description'])): ?>
        <meta name="description" content="<?php echo $page['description']; ?>">
    <?php endif; ?>
    <link href="/assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- error_reporting(0);

 if (session_status() === PHP_SESSION_NONE) {
 session_start();
 } -->

</head>
<body>