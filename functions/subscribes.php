<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/database.php';


function storeSubscribe($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('INSERT INTO comments (username, user_id, post_id) VALUES (:username, :user_id, :post_id)');
    $stmt->bindParam(':username', $data['username']);
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->bindParam(':post_id', $data['post_id']);
    $stmt->execute();

    return $dbh->lastInsertId();
}

/**
 * Récupère un commentaire depuis son ID
 *
 * @param $id
 * @return mixed
 */
function getComment($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM comments WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Récupère tous les commentaires
 *
 * @return array
 */
function getComments()
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM comments WHERE deleted_at IS NULL');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * Supprime un commentaire
 *
 * @param $id
 * @return bool
 */
function deleteComment($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE comments SET deleted_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $id;
}

/**
 * Supprime définitivement un commentaire
 *
 * @param $id
 * @return bool
 */
function destroyComment($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('DELETE FROM comments WHERE id = :id LIMIT 1');
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function getCommentAuthor($comment)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE id = :user_id LIMIT 1');
    $stmt->bindParam(':user_id', $comment['user_id']);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getPostComments($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM comments WHERE post_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateComment($id, $data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE comments SET body = :body, updated_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':body', $data['body']);
    $stmt->execute();

    return $id;
}