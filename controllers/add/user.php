<?php

$app['database']->insert('user', [
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'nombre' => $_POST['nombre'],
    'email' => $_POST['email'],
    'sexo' => $_POST['sexo'],
    'birthday' => $_POST['birthday']
]);

header('Location: /chat/');