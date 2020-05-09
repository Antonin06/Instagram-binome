<?php

//connexion à la BDD
include 'connexion.php';


$username = htmlspecialchars($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$insertUserName = $bdd->prepare("INSERT INTO sign_in(username, password)
VALUES (?, ?)");

$insertUserName->execute([

  $username,
  $password
]);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/a58b6117a4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <title>Instagram</title>
</head>
<body>
  <body>

    <img class="sign_in_logo" src="./images/instagram_logo.webp" width="140" height="68" class="d-inline-block align-top" alt=""> -->
    <form class="sign_in" action="sign_in.php" method="POST" >
      <div class="form-group">
        <div class="input-group flex-nowrap">
          <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping">@</span>
          </div>
          <input type="text" name='username' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-success">Login</button>
    </form>


  </body>
  </html>
