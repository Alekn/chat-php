<?php 
session_start();

//date_default_timezone_set('America/Caracas');

$contacto = json_decode($_POST['current'], true);

/* echo var_dump(date("Y-m-d H:i:s"));
echo '<br>'; */
$current_timestamp = strtotime(date("Y-m-d H:i:s")) - 10;

$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);

$user_last_activity = fetch_user_last_activity($contacto['user_id'], $app['database']);
if($user_last_activity > $current_timestamp)
{
    echo 'En linea';
}
else
{
    echo 'Desconectado';
/*     echo '<br>';
    echo var_dump($user_last_activity);
    echo '<br>';
    echo var_dump($current_timestamp); */
}