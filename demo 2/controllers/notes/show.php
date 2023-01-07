<?php

use Core\Database;

$config = require basePath("config.php");
$db = new Database($config['database']);

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id'],
    ])->findOrFail();

    authorize((int)$note['user_id'] === $currentUserId);

    $db->query('delete from notes where id=:id', [
        'id' => $_GET['id']
    ]);

    header('location: /notes');
    exit();
} else {
    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id'],
    ])->findOrFail();

    authorize((int)$note['user_id'] === $currentUserId);

    view('notes/show.view.php', [
        'heading' => 'Note',
        'note' => $note,
    ]);
}