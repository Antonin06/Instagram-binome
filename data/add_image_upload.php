<?php

include '../connexion.php';

session_start();

date_default_timezone_set('Europe/Paris');
$created_at = date('Y-m-d H:i:s');


if(isset($_POST['submit'])){

  $image = $_FILES['img_profil'];

  // Voici à quoi ressemblera le chemin sur Windows.
  // C:\laragon\www\Instagram-binome\data\..\upload\code.jpg
  // Voici à quoi ressemblera le chemin sur Linux.
  // /var/www/instagram-binome/data/../upload/code.jpg
  $target_dir = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."upload-profil".DIRECTORY_SEPARATOR;

  $target_file = $target_dir . $image['name'];

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // var_dump($imageFileType);
  // var_dump($target_file);
  // exit;

  // Check extension
  if( in_array($imageFileType,$extensions_arr)){

    // Upload file
    move_uploaded_file($image['tmp_name'], $target_file);

  }
  else {
    header('location: ../add_image.php?error=image');
  }

  $insertNewUserData = $bdd->prepare("INSERT INTO images(user_id, created_at, img_path)
  VALUES (?, ?, ?)");

  $insertNewUserData->execute([
    $_SESSION['user_id'],
    $created_at,
    "/upload-profil/".$image['name']

  ]);


}
// Image CODE


header('location: ../profil.php');

?>
