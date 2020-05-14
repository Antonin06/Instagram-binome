<?php
session_start();

include '../connexion.php';

// $getUsers = $bdd->prepare('SELECT * FROM users WHERE id=?');
// $getUsers->execute([
//     $_SESSION['user_id']
// ]);
//
// $user = $getUsers->fetch();
// C:\laragon\www\Instagram-binome\data\..\upload\code.jpg


$description = htmlspecialchars($_POST["description"]);
$localisation = htmlspecialchars($_POST['localisation']);
$url = htmlspecialchars($_POST["url_user"]);

// Image CODE
if(isset($_POST['submit'])){

  $image = $_FILES['img_profil'];

  // Voici à quoi ressemblera le chemin sur Windows.
  // C:\laragon\www\Instagram-binome\data\..\upload\code.jpg
  // Voici à quoi ressemblera le chemin sur Linux.
  // /var/www/instagram-binome/data/../upload/code.jpg
  $target_dir = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload".DIRECTORY_SEPARATOR;

  $target_file = $target_dir . $image['name'];

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // var_dump($imageFileType);
  // var_dump($target_file);
  // exit;

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){

    // Upload file
    move_uploaded_file($image['tmp_name'], $target_file);

  }
  else {
    header('location: ../sign_up2?error=image.php');
  }

  $insertNewUserData = $bdd->prepare("INSERT INTO user_data(description, localisation, url_user, user_id, img_profil)
  VALUES (?, ?, ?, ?, ?)");

  $insertNewUserData->execute([
    $description,
    $localisation,
    $url,
    $_SESSION['user_id'],
    "/upload/".$image['name']

  ]);


}
// Image CODE


header('location: ../sign_in.php');

?>
