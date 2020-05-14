<?php
session_start();
//connexion à la BDD
include 'connexion.php';



$userSelect = $bdd->prepare("SELECT * FROM users WHERE username = ?");
$userSelect->execute([$_SESSION['username']]);
$user = $userSelect->fetch();

$user_data = $bdd->prepare("SELECT * FROM user_data WHERE user_id = ?");
$user_data->execute([$user['id']]);
$data = $user_data->fetch();

$request = $bdd->prepare("SELECT * FROM images WHERE user_id = ? ORDER BY images.created_at DESC");
$request->execute([$user['id']]);
$images = $request->fetchAll();

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
  <link rel="stylesheet" href="./css/Antonin.css">
  <title>Instagram</title>
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-white p-2">
      <div class="container p-1">
        <a class="navbar-brand" href="index.php">
          <img src="./images/instagram_logo.webp" width="140" height="68" class="d-inline-block align-top" alt=""></a>
          <img src="./images/designed_by_no_bg.png" width="140" height="68" class="mx-auto" alt="">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link mr-2" href="index.php"><i class="fas fa-home fa-2x"></i></a>
              <div class="dropdown show">
                <a class="nav-item nav-link mr-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-heart fa-2x"></i></a>
                <div class="dropdown-menu"  aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#"><a href="profil.php">Antho06 </a>aime votre photo <button type="button" class="btn btn-primary btn-sm">S'abonné</button></a>
                  <a class="dropdown-item" href="#">a commencé à vous suivre</a>
                  <a class="dropdown-item" href="#">sugsestion d'abonné</a>
                  <a class="dropdown-item" href="#">cool !</a>
                  <a class="dropdown-item" href="#">j'aime</a>
                  <a class="dropdown-item" href="#">autre personne</a>
                </div>
              </div>
              <a class="nav-item nav-link mr-2" href="profil.php"><img src="<?php echo ".".($data['img_profil']) ?>" alt="" class="img-profil-navbar" width="35px;" height="35px;"></a>
              <a class="nav-item nav-link ml-2" href="add_image.php"><i class="fas fa-plus-circle fa-2x"></i></a>
              <a class="nav-item nav-link ml-2" href="./data/disconnect.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>
            </div>
          </div>
        </div>
      </nav>
    </header>


    <div class="container mt-5 ">
      <div class="container w-75 p-0">
        <div class="row">
          <div class="col-12 p-0">
            <div class="container bg-white shadow-sm p-5">
              <div class="story1">
                <img src="./images/story-1.jpg" alt="">
                <svg viewbox="0 0 100 100">
                  <circle cx="50" cy="50" r="40"/>
                </svg>
              </div>
              <div class="story2">
                <img src="./images/story-2.jpg" alt="">
                <svg viewbox="0 0 100 100">
                  <circle cx="50" cy="50" r="40"/>
                </svg>
              </div>
              <div class="story3">
                <img src="./images/story-3.jpg" alt="">
                <svg viewbox="0 0 100 100">
                  <circle cx="50" cy="50" r="40"/>
                </svg>
              </div>
              <div class="story4">
                <img src="./images/story-4.jpg" alt="">
                <svg viewbox="0 0 100 100">
                  <circle cx="50" cy="50" r="40"/>
                </svg>
              </div>
              <div class="story5">
                <img src="./images/story-5.jpg" alt="">
                <svg viewbox="0 0 100 100">
                  <circle cx="50" cy="50" r="40"/>
                </svg>
              </div>
              <div class="story6">
                <img src="./images/story-6.jpg" alt="">
                <svg viewbox="0 0 100 100">
                  <circle cx="50" cy="50" r="40"/>
                </svg>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-------CONTAINER USER POST ------>
    <div class="container mt-4">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <div class="card text shadow-sm" style="width: 35rem;">
            <img src="https://source.unsplash.com/random/400x300/?photography" class="card-img-top" alt="...">
            <div class="card-body">
              <nav class="nav">
                <a class="nav-item nav-link mr-2" href="#"><i class="fas fa-heart fa-2x"></i></a>
              </nav>
              <p class="card-title"><strong>43 J'aimes</strong></p>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <div class="card text shadow-sm" style="width: 35rem;">
            <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="...">
            <div class="card-body">
              <nav class="nav">
                <a class="nav-item nav-link mr-2" href="#"><i class="fas fa-heart fa-2x"></i></a>
              </nav>
              <p class="card-title"><strong>43 J'aimes</strong></p>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>
