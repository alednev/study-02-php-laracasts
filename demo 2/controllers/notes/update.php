<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

authorize((int)$note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

// validation issue
if (!empty($errors)) {
    view('notes/edit.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query('UPDATE notes set body = :body where id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id'],
]);

header('location: /notes');
die();
