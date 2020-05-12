<?php

include '../connexion.php';

session_start();



$username = htmlspecialchars($_POST["username"]);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$mail = htmlspecialchars ($_POST["mail"]);
$lastname = htmlspecialchars ($_POST["lastname"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$phone = htmlspecialchars($_POST["phone"]);

$insertNewUser = $bdd->prepare("INSERT INTO users(username, password, mail, lastname, firstname, phone)
VALUES (?, ?, ?, ?, ?, ?)");

$insertNewUser->execute([
    $username,
    $password,
    $mail,
    $lastname,
    $firstname,
    $phone
]);

$getUser = $bdd->prepare('SELECT * FROM users WHERE mail=? ORDER BY id DESC');
$getUser->execute([
    $mail
]);
$user = $getUser->fetch();


$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];


// var_dump($_SESSION['user_id']);
// die();
// $test =  $insertNewUsers->fetchAll();
// var_dump($user["id"]);
// die();

// $allMessages = $allMessagestatement->fetchAll(PDO::FETCH_ASSOC);


header( 'location: ../sign_up2.php');


?>
