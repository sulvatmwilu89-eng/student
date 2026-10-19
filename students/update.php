<?php

  require __DIR__ ."/../config/database.php";
  require __DIR__ ."/../component.php";   

$id= (int)($_GET["id"]?? 0);


$stmt= $pdo->prepare("SELECT * FROM  students WHERE id= ?");
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$student) { header( 'location: read.php');
exit;}
if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
    $stmt= $pdo->prepare("UPDATE students SET name=?,email=?,course=?,status=? WHERE id=?");
    $stmt->execute([trim($_POST["name"]),
     trim($_POST["email"]),
     trim($_POST["course"]),
     $_POST["status"],
     $id
     ]);
    header("location:read.php");
    exit;
    };

  require __DIR__ ."/../include/header.php"; ?>
  <div class="app-content">
   <div class="container-fluid">
    <h3 class="mb-3">Edit Student</h3>
    <?php student_form($student,'update');?>
    </div>
  </div>
  <?php require __DIR__ ."/../include/footer.php";   

