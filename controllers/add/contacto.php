<?php
session_start();

$contacto = json_decode($_POST['delete'], true);

// UPDATE SOLICITUDES PENDIENTES CURRENT
$state = $app['database']->start('user', [
    'user_id' => $_SESSION['user_id']
], 'solicitudes');

$solicitudes = json_decode($state->fetch(PDO::FETCH_COLUMN), true);

echo 'lista de solicitudes anteriores <br>';
echo var_dump($solicitudes); 
echo '<br>';

foreach ($solicitudes as $key => $actual) {
    if($actual == $contacto) {
        unset($solicitudes[$key]);
        break;
    }
}

$solicitudes = json_encode(array_values($solicitudes));

// UPDATE LISTA DE CONTACTOS CURRENT
$state = $app['database']->start('user', [
    'user_id' => $_SESSION['user_id']
], 'contactos');

$retrieve = json_decode($state->fetch(PDO::FETCH_COLUMN), true);

echo 'Contactos anteriores <br>';
echo var_dump($retrieve); 
echo '<br>';

array_push($retrieve, $contacto);

$retrieve = json_encode($retrieve);
echo 'lista de solicitudes actuales <br>';
echo var_dump($solicitudes); 
echo '<br>';
echo 'contactos actuales <br>';
echo var_dump($retrieve); 
echo '<br>';

// UPDATE PETICIONES USUARIO B
$remitente = array('user_id' => $_SESSION['user_id'], 'username' => $_SESSION['username']);

$state = $app['database']->start('user', [
    'user_id' => $contacto['user_id']
], 'pendientes');

$pendientes = json_decode($state->fetch(PDO::FETCH_COLUMN), true);

echo 'lista de pendientes anteriores <br>';
echo var_dump($pendientes); 
echo '<br>';

foreach ($pendientes as $key => $actual) {
    if($actual == $remitente) {
        unset($pendientes[$key]);
        break;
    }
}

$pendientes = json_encode(array_values($pendientes));

// UPDATE LISTA DE CONTACTOS USUARIO B
$state = $app['database']->start('user', [
    'user_id' => $contacto['user_id']
], 'contactos');

$retrieveUB = json_decode($state->fetch(PDO::FETCH_COLUMN), true);

echo 'Contactos anteriores <br>';
echo var_dump($retrieveUB); 
echo '<br>';

array_push($retrieveUB, $remitente);

$retrieveUB = json_encode($retrieveUB);
echo 'lista de pendientes actuales <br>';
echo var_dump($pendientes); 
echo '<br>';
echo 'contactos actuales USER B <br>';
echo var_dump($retrieveUB); 
echo '<br>';

// ENVIO UPDATE CURRENT
$app['database']->update(
    'user', 
    ['solicitudes' => $solicitudes],
    ['user_id' => $_SESSION['user_id']]
);

$app['database']->update(
    'user', 
    ['contactos' => $retrieve],
    ['user_id' => $_SESSION['user_id']]
);

// ENVIO UPDATE USER B
$app['database']->update(
    'user', 
    ['pendientes' => $pendientes],
    ['user_id' => $contacto['user_id']]
);

$app['database']->update(
    'user', 
    ['contactos' => $retrieveUB],
    ['user_id' => $contacto['user_id']]
);