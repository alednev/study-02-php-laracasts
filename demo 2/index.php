<?php

require "functions.php";
//require "router.php";

// connecting to a DataBase

$dsn = 'mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4';
$pdo = new PDO($dsn);

$statement = $pdo->prepare('select * from posts where id = 1');
$statement->execute();

$posts = $statement->fetch(PDO::FETCH_ASSOC);

dd($posts);

//foreach ($posts as $index => $post) {
//    echo '<li>' . $post['title'] . '</li>';
//}