<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/database.php';

function storeSubscriber($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('INSERT INTO subscribers (username, user_id) VALUES (:username, :user_id)');
    $stmt->bindParam(':username', $data['username']);
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->execute();

    return $dbh->lastInsertId();
}

function getSubscriber($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM subscribers WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getSubscribers()
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM subscribers WHERE deleted_at IS NULL');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function deleteSubscriber($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE subscribers SET deleted_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $id;
}


function destroySubscriber($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('DELETE FROM subscribers WHERE id = :id LIMIT 1');
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function getSubscriberAuthor($subscriber)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE id = :user_id LIMIT 1');
    $stmt->bindParam(':user_id', $subscriber['user_id']);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getUserSubscribers($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE user_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateSubscriber($id, $data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE subscribers SET username = :username, updated_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':username', $data['username']);
    $stmt->execute();

    return $id;
}

