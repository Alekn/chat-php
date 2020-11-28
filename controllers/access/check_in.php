<?php
session_start();

$state = $app['database']->start('user', [
    'username' => $_POST['username']
]);

if($state->rowCount() > 0) {
    $row = $state->fetch(PDO::FETCH_ASSOC);

    if(strcmp($_POST['password'], $row['password']) == 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['nombre'];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
        $app['database']->insert('login_details', [
            'user_id' => $row['user_id']
        ]);
        $_SESSION['login_details_id'] = $app['database']->getPDO()->lastInsertId();
        header('Location: /chat/dashboard');
    } else {
        echo 'usuario o contraseña incorrecta.';
        echo '<br><a href="login">Vuelve a intentarlo</a>';
    }
} else {
    echo 'usuario o contraseña incorrecta.';
    echo '<br><a href="login">Vuelve a intentarlo</a>';
}