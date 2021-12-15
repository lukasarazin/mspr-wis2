<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/users.php';

/**
 * On ajoute un like à la BDD
 *
 * @param $data
 * @return string (like ID)
 */
function storeLike($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('INSERT INTO likes_dislikes (post_id, user_id, dislike) VALUES (:post_id, :user_id :dislike)');
    $stmt->bindParam(':post_id', $data['post_id']);
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->bindParam(':dislike', $data['dislike']);
    $stmt->execute();

    return $dbh->lastInsertId();
}