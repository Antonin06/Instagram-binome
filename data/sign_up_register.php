<?php

include '../connexion.php';

session_start();

$username = htmlspecialchars($_POST["username"]);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$mail = htmlspecialchars ($_POST["mail"]);
$lastname = htmlspecialchars ($_POST["lastname"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$phone = htmlspecialchars($_POST["phone"]);


$requete = $bdd->prepare("SELECT * FROM users WHERE username = '$username'");
$requete->execute([
  $username
]);

$checkUser = $requete->fetch(PDO::FETCH_ASSOC);


if($checkUser) {
  header( 'location: ../sign_up.php?error=username');
  exit;
}
else {
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

  header( 'location: ../sign_up2.php');
}


$getUser = $bdd->prepare('SELECT * FROM users WHERE mail=? ORDER BY id DESC');
$getUser->execute([
    $mail
]);
$user = $getUser->fetch();


$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];







?>
