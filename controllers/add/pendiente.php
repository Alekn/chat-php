<?php
session_start();
if($_POST['user_id'] === '') {
    header('Location: /chat/dashboard');
}

$state = $app['database']->start('user', [
    'user_id' => $_POST['user_id']
], 'user_id, username');

$result = $state->fetchAll(PDO::FETCH_ASSOC); 

$usuario = $result[0];

// PETICIÓN
$state = $app['database']->start('user', [
    'user_id' => $_SESSION['user_id']
], 'pendientes');

$retrieve = $state->fetch(PDO::FETCH_COLUMN);

$retrieve = json_decode($retrieve, true);

array_push($retrieve, $usuario);

$retrieve = json_encode($retrieve);

// SOLICITUD
$remitente = array('user_id' => $_SESSION['user_id'], 'username' => $_SESSION['username']);

$state = $app['database']->start('user', [
    'user_id' => $usuario['user_id']
], 'solicitudes');

$current = json_decode($state->fetch(PDO::FETCH_COLUMN), true);

array_push($current, $remitente);

$current = json_encode($current);

// ENVIO
$app['database']->update(
    'user', 
    ['pendientes' => $retrieve],
    ['user_id' => $_SESSION['user_id']]
);

$app['database']->update(
    'user', 
    ['solicitudes' => $current],
    ['user_id' => $usuario['user_id']]
);

header('Location: /chat/dashboard');