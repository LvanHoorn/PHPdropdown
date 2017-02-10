<?php

    header('Content-Type: application/json');

    if (!isset($_GET['query'])) {
        echo json_encode([]);
        exit();
    }

    $db = new PDO('mysql:host=localhost;dbname=dropdown', 'root', 'root');

    $users = $db->prepare("
        SELECT id, username
        FROM users
        WHERE username LIKE :query
    ");

    $users->execute([
       'query' => "{$_GET['query']}%" 
    ]);

    echo json_encode($users->fetchAll());