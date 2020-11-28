<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if($_SESSION['username'] == 'admin') {
        // data request

        require 'views/dashboard.html.php';
    } else {
        require 'views/app.html.php';
    }
} else {
    header('Location: /chat/access/registro.php');
}