<?php

// GESTION DE DIRECCIONES
$router->get('/', 'controllers/index.php');
$router->get('/home', 'controllers/index.php');
$router->get('/dashboard', 'controllers/dashboard.php');

// GESTION DE ACCESOS
$router->post('/check_in', 'controllers/access/check_in.php');
$router->get('/login', 'controllers/access/login.php');
$router->get('/logout', 'controllers/access/logout.php');
$router->get('/registro', 'controllers/access/registro.php');

// LLENADO DE TABLAS
$router->post('/datos', 'controllers/add/user.php');
$router->post('/pendiente', 'controllers/add/pendiente.php');
$router->post('/contact', 'controllers/add/contacto.php');


// GESTION DE DATOS/DIRECCIÓN
$router->get('/user', 'controllers/fetch/user.php');
$router->get('/pendiente', 'controllers/fetch/pendiente.php');
$router->get('/solicitud', 'controllers/fetch/solicitud.php');
$router->get('/contacto', 'controllers/fetch/contacto.php');
$router->get('/actividad', 'controllers/fetch/actividad.php');
$router->post('/status', 'controllers/fetch/estado.php');


// VISTA USUARIO