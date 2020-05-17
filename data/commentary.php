<?php
session_start();

include '../connexion.php';

$comment = htmlspecialchars($_POST["text"]);

$userIdStatement = $bdd->prepare("SELECT id FROM users WHERE username = ? ");
$userIdStatement->execute([
  $_SESSION['username']
]);
$user_id = $userIdStatement->fetchColumn();


$img_post = $bdd->prepare("SELECT * FROM images");
$img_post->execute();
$imagesPosts = $img_post->fetch();


$commentInsert = $bdd->prepare("INSERT INTO comments (image_id, user_id, comment) VALUES (?, ?, ?)");
$commentInsert->execute([
    $_GET['image_id'],
    $user_id,
    $comment

]);

header('location: ../profil.php');

?>
