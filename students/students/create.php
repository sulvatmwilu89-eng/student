<?php
  require __DIR__ ."/../config/database.php";
  require __DIR__ ."/../component.php";   


if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
    $stmt= $pdo->prepare("INSERT INTO students ( name,email,course,status) VALUES (?, ?, ?,?)");
    $stmt->execute([trim($_POST["name"]),
     trim($_POST["email"]),
     trim($_POST["course"]),
     $_POST["status"]
     ]);
    header("location:read.php");
    exit;
    };
    
   require __DIR__ ."/../include/header.php";   ?>
   <div class="app-content">
    <div class="container-fluid">
   <h3 class="mb-3">Add student</h3><?php student_form([],'save');?>
   </div>
   </div>
<?php require __DIR__ ."/../include/footer.php";   ?>




