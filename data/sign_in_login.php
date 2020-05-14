<?php
session_start();
<<<<<<< HEAD

//connexion à la BDD
=======
>>>>>>> 97cbeaed3a69111a4e170069283d24d3d732eaaf
include '../connexion.php';


if (isset($_POST['login']))
{
  $usernameConnect = htmlspecialchars($_POST['username']);
  $passwordConnect = $_POST['password'];


<<<<<<< HEAD
  $sql ="SELECT * FROM users WHERE username =? ";
  $result = $bdd->prepare($sql);
  $result->execute([$usernameConnect]);
  echo 'ok';
  $user = $result->fetch();
=======
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
      

    
>>>>>>> 97cbeaed3a69111a4e170069283d24d3d732eaaf

  }
  else{
    echo  '<font color="red"<h1><center>'.$erreur;
    header('location: ../sign_in.php?error=username');
  }
    
 
  
  
};

<<<<<<< HEAD

  if($user) {

    if (password_verify($passwordConnect, $user["password"]))


      echo "connexion ok";

      $_SESSION['username'] = $usernameConnect;
      header( 'location: ../profil.php?username='.$_SESSION['username']);




  }



};

?>
=======
?>
>>>>>>> 97cbeaed3a69111a4e170069283d24d3d732eaaf
