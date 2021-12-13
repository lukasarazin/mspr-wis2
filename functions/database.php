<?php

/**
 * Connect to the DB
 *
 * @return PDO
 */
function connectDB()
{
    try {
        return new PDO('mysql:host=localhost;dbname=social-media;charset=UTF8', 'root', '');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
