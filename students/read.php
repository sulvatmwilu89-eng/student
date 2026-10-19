<?php
require __DIR__ ."/../config/database.php";
require __DIR__ ."/../include/header.php";   


$students = $pdo->query("SELECT * FROM students ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="app-content">
  <div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
    <h3>Students</h3>
    <a href="create.php" class="btn btn-primary">Add Student</a>
  </div>

<table class="table table-striped table-bordered"> 
    <thead> 
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $s) { ?>
       <tr>
        <td><?= $s['id']?></td>
        <td><?= htmlspecialchars($s['name'])?></td>
        <td><?= $s['email']?></td>
        <td><?= $s['course']?></td>
        <td>
            <span class="badge text-bg-<?= $s['status']==='Active'?"success":'secondary' ?>">
                <?= $s['status']?>
            </span>
        </td>
        <td>
            <a href="update.php?id=<?= $s['id']?>" class="btn btn-sm btn-warning ">Edit</a>
            <a href="delete.php?id=<?= $s['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</a>
        </td>
       </tr>
       <?php } ?>

    </tbody>
 </table>
 </div>
 </div>



<?php require __DIR__ . '/../include/footer.php'; ?>