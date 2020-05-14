<?php
session_start();
include '../connexion.php';




if (isset($_POST['login']))
{
  $usernameConnect = htmlspecialchars($_POST['username']);
  $passwordConnect = $_POST['password'];
  
  
  $sql ="SELECT * FROM users WHERE username =? ";
  $result = $bdd->prepare($sql);
  $result->execute([$usernameConnect]);
  $erreur= 'veuillez vous inscrire';
  $user = $result->fetch();
  
  

  if($user) {
   
    if (password_verify($passwordConnect, $user["password"]))

    
      echo "connexion ok";
      
      $_SESSION['username'] = $usernameConnect;
      header( 'location: ../index.php?username='.$_SESSION['username']);
      

    

  }
  else{
    echo  '<font color="red"<h1><center>'.$erreur;
    header('location: ../sign_in.php?error=username');
  }
    
 
  
  
};

?>