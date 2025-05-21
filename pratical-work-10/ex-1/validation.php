<?php

require 'config.php';
session_start();

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($login) || empty($password)) {

    header('Location: login_.html?error=1=404=empty+fields');
    exit;

}

if ($login !== USER_LOGIN || $password !== USER_PASS) {

    header('Location: login_.html?error=2=404=nah+this+is+not+u+lol');
    exit;

}

$_SESSION['connect'] = 'ok';
$_SESSION['login'] = $login;

header('Location: accueil.php');