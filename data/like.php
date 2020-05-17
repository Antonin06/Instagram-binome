<?php
session_start();

include '../connexion.php';

$userIdStatement = $bdd->prepare("SELECT id FROM users WHERE username = ? ");
$userIdStatement->execute([
  $_SESSION['username']
]);
$user_id = $userIdStatement->fetchColumn();

$insertNewLike = $bdd->prepare("INSERT INTO likes(img_id, user_id)
VALUES (?, ?)");
$insertNewLike->execute([
  $_GET['image_id'],
  $user_id
]);


header('location: ../index.php');
