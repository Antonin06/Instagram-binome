<?php
session_start();

include '../connexion.php';

$userSelect = $bdd->prepare("SELECT * FROM users WHERE username = ?");
$userSelect->execute([$_SESSION['username']]);
$user = $userSelect->fetch();

$user_data = $bdd->prepare("SELECT * FROM user_data WHERE user_id = ?");
$user_data->execute([$user['id']]);
$data = $user_data->fetch();

$request = $bdd->prepare("SELECT * FROM images WHERE user_id = ? ORDER BY images.created_at DESC");
$request->execute([$user['id']]);
$images = $request->fetchAll();

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
    $user['id'],
    $created_at,
    "/upload-profil/".$image['name']

  ]);


}
// Image CODE


header('location: ../profil.php');

?>
