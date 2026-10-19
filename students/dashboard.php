<?php
 
    require __DIR__ ."/config/database.php";
    require __DIR__ ."/include/header.php";   


   $all = $pdo->query("SELECT * FROM students ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
   $total = count($all);
   $active = count(array_filter($all, fn($s) => $s['status'] === "Active"));
   $inactive = $total - $active;
   $pct = $total? round($active/$total*100):0;
   ?>

 <?php 
  $courses=[];
  foreach($all as $s) {
  $courses[$s['course']] =($courses[$s['course']]?? 0)+1;
  }
  arsort($courses);

  $perPage = 5;
  $page = max(1, (int)($_GET['page']?? 1));
  $pages = max(1, (int)ceil($total / $perPage));
  $paged = array_slice($all, ($page - 1)*$perPage, $perPage);
?>
<div class="app-content">
    <div class="container-fluid">
        <h3 class="mb-3"> Dashboard </h3>

        <div class="mb-4" style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px;">
           
              <div class="card text-bg-primary"><div class="card-body">
                <h2><?= $total ?></h2>Total Students
              </div>
              </div>
            
              <div class="card text-bg-success"><div class="card-body">
                <h2><?= $active ?></h2>Active
              </div>
              </div>
               
              <div class="card text-bg-secondary"><div class="card-body">
                <h2><?= $inactive ?></h2>Inactive
              </div>
              </div>
         
        </div>
        <p class="mb-1">Active students: <?= $pct ?>%</p>
        <div class="progress mb-4">
            <div class="progress-bar bg-success" style="width: <?= $pct ?>%"></div>
        </div>
        <h5>Students per course</h5>
        <ul class="list-group">
            <?php foreach($courses as $name => $count) { ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= htmlspecialchars($name) ?>
                <span class="badge text-bg-primary"><?= $count ?></span>
            </li>
           <?php } ?>
        </ul>
    </div>
</div>
 <?php require __DIR__ . '/include/footer.php';
  ?>