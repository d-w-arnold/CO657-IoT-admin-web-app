<?php

// Connect to database
try {
    $dbhandle = new PDO(
        'mysql:host=dragon.kent.ac.uk; dbname=dwa4',
        'dwa4', 'i9sipin'
    );
    $dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // The PDO constructor throws an exception if it fails
    die('Error Connecting to Database: '.$e->getMessage());
}

?>
