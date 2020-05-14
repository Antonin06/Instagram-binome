<?php
session_start();

//connexion à la BDD
include '../connexion.php';


if (isset($_POST['login']))
{
  $usernameConnect = htmlspecialchars($_POST['username']);
  $passwordConnect = $_POST['password'];


  $sql ="SELECT * FROM users WHERE username =? ";
  $result = $bdd->prepare($sql);
  $result->execute([$usernameConnect]);
  echo 'ok';
  $user = $result->fetch();



  if($user) {

    if (password_verify($passwordConnect, $user["password"]))


      echo "connexion ok";

      $_SESSION['username'] = $usernameConnect;
      header( 'location: ../profil.php?username='.$_SESSION['username']);




  }



};

?>
