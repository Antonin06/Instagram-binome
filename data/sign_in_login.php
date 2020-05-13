<?php

include '../connexion.php';

$username = htmlspecialchars($_POST["username"]);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$requete = $bdd->prepare("SELECT * FROM users WHERE username = '$username'");
$requete->execute([
  $username,
]);

$checkUser = $requete->fetch(PDO::FETCH_ASSOC);


if($checkUser) {
  header( 'location: ../profil.php');
}
else {
  header( 'location: ../sign_in.php?error=login');
}
