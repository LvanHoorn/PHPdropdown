<?php

    require 'vendor/autoload.php';

    $db = new PDO('mysql:host=localhost;dbname=dropdown', 'root', 'root');

    $faker = Faker\Factory::create();

    foreach (range(1, 10000) as $x) {
        $db->query("
            INSERT INTO users (username)
            VALUES ('{$faker->userName}')
        ");
    }