<?php
try {
    $user = 'root';
    $pass = '';

    $dbh = new PDO('mysql:host=127.0.0.1;dbname=task_manager', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbh;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";

    die();
}
