<<<<<<< HEAD
<?php
session_start();

//connexion à la BDD
include 'connexion.php';


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
      header( 'location: profil.php?username='.$_SESSION['username']);
      

    

  }
 
  
  
};

?>



=======
>>>>>>> 416f069c3af1dd8938d04f8d5a1d150e4c39e762
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/a58b6117a4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/lucas.css">
  <title>Instagram</title>
</head>
  <body>


    <form class="sign_in shadow mx-auto" action="./data/sign_in_login.php" method="POST" >
    <img class="sign_in_logo " src="./images/instagram_logo.webp" width="140" height="68" class="d-inline-block align-top" alt="">
      <div class="form-group mt-3">
        <div class="input-group flex-nowrap pt-5">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping">@</span>
          </div>
          <input type="text" name='username' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" required>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
      </div>
      <button type="submit" name="login" class="btn btn-success pb-1">Login</button><br/>
      <strong>don't have an account? <a href="sign_up.php">Sign up</a></strong>
    </form>
<<<<<<< HEAD
    <?php if(isset($erreur)){
      echo '<font color="red">'.$erreur;
    };
    
      
    
  ?>
  
=======

>>>>>>> 416f069c3af1dd8938d04f8d5a1d150e4c39e762

  </body>
</html>
