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
<?php
include 'connexion.php';

session_start();

// var_dump($_SESSION['username']);
// die();
?>

  <div class="container-fluid h-100  ">
    <div class="container w-25 d-flex justify-content-center ">
      <div class="card p-4" style="width: 22rem;">

        <form action="./data/sign_up_register2.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label for="img_profil">Choisir une photo de profil</label>
            <input type="file" class="form-control-file"
            accept="image/*" name="img_profil">
            <?php
                if(isset($_GET['error']) && $_GET['error'] === 'image'){  ?>
                  <p>Le format de votre image n'est pas bon!</p>
              <?php  }
             ?>
          </div>

          <div class="form-group mt-4">
            <label for="description">Description</label>
            <textarea class="form-control mb-2" rows="3" name="description" placeholder="Faites une breve description de votre profil."></textarea>
          </div>

          <div class="form-group mt-4">
            <label for="localisation">Localisation</label>
            <input type="text" class="form-control w-75" name="localisation" placeholder="D'où êtes vous ?">
          </div>

          <div class="form-group mt-4">
            <label for="url_user">Ajouter un lien vers page externe</label>
            <input type="url" class="form-control w-75" name="url_user" placeholder="instagram.com">
          </div>

          <button class="btn btn-success" type="submit" name="submit">Continuer</button>
        </form>

      </div>
    </div>
  </div>

</body>
</html>
