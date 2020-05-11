<?php

include '../connexion.php';

$username = htmlspecialchars($_POST["username"]);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$mail = htmlspecialchars ($_POST["mail"]);
$lastname = htmlspecialchars ($_POST["lastname"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$phone = htmlspecialchars($_POST["phone"]);

$insertNewUsers = $bdd->prepare("INSERT INTO users(username, password, mail, lastname, firstname, phone)
VALUES (?, ?, ?, ?, ?, ?)");



$insertNewUsers->execute([
    $username,
    $password,
    $mail,
    $lastname,
    $firstname,
    $phone
]);


header( 'location: ../sign_up2.php');





?>