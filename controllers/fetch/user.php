<?php
session_start();

$state = $app['database']->start('user', [
    'user_id' => $_SESSION['user_id']
], 'user_id, username', '!');

$result = $state->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);