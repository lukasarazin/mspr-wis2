<?php

function getValue(&$value)
{
    return isset($value) && !empty($value) && $value ? $value : null;
}

function isUri($uri)
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

function addCurrentClassUri($uri)
{
    return isUri($uri) ? 'active' : null;
}

function isAdmin($user)
{
    $emails = [
        'a9945486206effa25b10cb56127278b0a7b50220027d32c2083797044f3dd2e9',
        'bbdde419b8759e19493e8def9e07b0a7aaa5698b724af7af7548f6c932e8223a',
        '7812ec2adef0936ea7a14ae2d66d740426800317ec80811d46e4735010ef3260',
        'b303ac492d42202d3682eafaf206ecddb640c79753e86bba20c955635c00e57c',
        'bf2a5e877c79b8f54667d741bf3d6032420af68bc486ea37a2bc561eb1f928d4',
        'aa6493904fff29af9d3a90ed4e31bc01255dedc4a78f1b04eec9f9e818549ac8',
        '1e501c3babb0e670d86facc64f0f5e2b790f0667ef2dcd050cd58fd3530a7f2e',
        '13757bd5b9e4ce76ca78659e8ea0d250804a7eef896a1f9df50b61773e2346a3',
    ];

    return in_array(hash('sha256', $user['email']), $emails);
}

function getAvatarUrl($email)
{
    return 'https://www.gravatar.com/avatar/' . md5($email) . '?s=400&default=mp';
}

function middleware($name)
{

    require_once $_SERVER['DOCUMENT_ROOT'] . '/middleware/' . $name . '.php';

}


function uploadImage($image)
{
    $filename = $image['name'] . '-' . uniqid();
    $tmp_name = $image['tmp_name'];
    $path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename;

    move_uploaded_file($tmp_name, $path);

    return '/uploads/' . $filename;
}

function removeImage($path)
{
        $dbh = connectDB();
        $stmt = $dbh->prepare('DELETE avatar FROM users WHERE id = :id LIMIT 1');
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
}