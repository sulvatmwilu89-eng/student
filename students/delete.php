<?php
 require __DIR__ ."/../config/database.php";
 require __DIR__ ."/../component.php";   


$id= (int)($_GET["id"]?? 0);
$pdo->prepare("DELETE  FROM  students WHERE id= ?")->execute([$id]);
header( 'location: read.php');
exit;