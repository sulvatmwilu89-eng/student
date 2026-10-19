<?php


?>
<?php function student_form(array $s =[],string $button ="save"){?>
    <form method="post">
      <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" value="<?= htmlspecialchars($s['name'] ?? "" ) ?>"> <br><br>
      <label class="form-label">Email</label>
      <input type="email" name="email" value="<?= htmlspecialchars($s['email'] ?? "" ) ?>"><br><br>
      <label class="form-label">Course</label>
      <input type="text" name="course" value="<?= htmlspecialchars($s['course'] ?? "" ) ?>"><br><br>
      <div class="mb-3">
      <label class="form-label">Status</label>
      <select  name="status">
        <option value="Active"<?= ($s['status']??'') ==="Active" ? 'selected' : '' ?> >Active</option>
         <option value="Inactive"<?= ($s['status']??'') ==="Inactive" ? 'selected' : '' ?> >Inactive</option>
      </select>
      </div>
    <button type="submit"><?= $button ?></button>
    </div>
    </form>
<?php } ?>
