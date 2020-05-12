<?php

include '../connexion.php';

session_start();

// $getUsers = $bdd->prepare('SELECT * FROM users WHERE id=?');
// $getUsers->execute([
//     $_SESSION['user_id']
// ]);
//
// $user = $getUsers->fetch();

$description = htmlspecialchars($_POST["description"]);
$localisation = htmlspecialchars($_POST['localisation']);
$url = htmlspecialchars($_POST["url_user"]);

// Image CODE
if(isset($_POST['submit'])){

  $images= $_FILES['file']['img_profil'];
  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["file"]["img_profil"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){

    //Insert record
    $insertNewUserData = $bdd->prepare("INSERT INTO user_data(img_profil)
    VALUES (?)");
    $insertNewUserData->execute([
      $images,
    ]);


    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$images);

  }

}
// Image CODE


$insertNewUserData = $bdd->prepare("INSERT INTO user_data(description, localisation, url_user, user_id)
VALUES (?, ?, ?, ?)");

$insertNewUserData->execute([
  $description,
  $localisation,
  $url,
  $_SESSION['user_id']
]);


header('location: ../profil.php');

?>
