<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/database.php';


function storeSubscribe($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('INSERT INTO comments (username, subscribe_id, user_id) VALUES (:username, :subscribe_id, :user_id)');
    $stmt->bindParam(':username', $data['username']);
    $stmt->bindParam(':subscribe_id', $data['subscribe_id']);
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->execute();

    return $dbh->lastInsertId();
}


function getSubscribe($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM subscribe WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getSubscribes()
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM subscribe WHERE deleted_at IS NULL');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteSubscribe($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE subscribe SET deleted_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $id;
}


function destroySubscribe($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('DELETE FROM subscribe WHERE id = :id LIMIT 1');
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function getSubscribetAuthor($subscribe)
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
    $stmt = $dbh->prepare('SELECT * FROM subscribe WHERE post_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateSubscribe($id, $data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE subscribe SET username = :username, updated_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $data['username']);
    $stmt->execute();

    return $id;
}