<?php
    // $dbh = new PDO('mysql:host=localhost;dbname=measuring', $user, $pass);
    // $dbh = new PDO('mysql:host=localhost;dbname=measuring', 'root', 4565);
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=measuring', 'root', 4565);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>