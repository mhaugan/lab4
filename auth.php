<?php
    $user = "v16_haugan";
    $password = "mplx!33t";
    $dsn = "mysql:dbname=stud_v16_haugan;host=kark.hin.no";

    try {
        $db = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
