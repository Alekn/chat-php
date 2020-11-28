<?php
session_start();

$state = $app['database']->start('user', [
    'user_id' => $_SESSION['user_id']
], 'pendientes');

$result = $state->fetch(PDO::FETCH_COLUMN);

echo $result;