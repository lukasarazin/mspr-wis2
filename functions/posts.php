<?php

require_once 'database.php';

/**
 * Récupère tous les articles
 *
 * @return array
 */
function getPosts()
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM posts WHERE deleted_at IS NULL ');
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 *
 * On ajoute un article à la BDD
 *
 * @param $data
 * @return string (post ID)
 */
function storePost($data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('INSERT INTO posts (title, excerpt, body, user_id) VALUES (:title, :excerpt, :body, :user_id)');
    $stmt->bindParam(':title', $data['title']);
    $stmt->bindParam(':excerpt', $data['excerpt']);
    $stmt->bindParam(':body', $data['body']);
    $stmt->bindParam(':user_id', $data['user_id']);
    $stmt->execute();

    return $dbh->lastInsertId();
}

/**
 * Récupère un article depuis son ID
 *
 * @param $id
 * @return mixed
 */
function getPost($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM posts WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


/**
 * @param $id
 * @param $data
 * @return mixed
 */

function updatePost($id, $data)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE posts SET title = :title, excerpt = :excerpt, body = :body, updated_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $data['title']);
    $stmt->bindParam(':excerpt', $data['excerpt']);
    $stmt->bindParam(':body', $data['body']);
    $stmt->execute();

    return $id;
}


/**
 * Supprime un article
 *
 * @param $id
 * @return bool
 */
function deletePost($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE posts SET deleted_at = NOW() WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $id;
}

/**
 * Restaure un article
 *
 * @param $id
 * @return bool
 */
function restorePost($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('UPDATE posts SET deleted_at = null WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $id;
}

/**
 * Supprime définitivement un article
 *
 * @param $id
 * @return bool
 */
function destroyPost($id)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('DELETE FROM posts WHERE id = :id LIMIT 1');
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function getPostAuthor($post)
{
    $dbh = connectDB();
    $stmt = $dbh->prepare('SELECT * FROM users WHERE id = :user_id LIMIT 1');
    $stmt->bindParam(':user_id', $post['user_id']);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

