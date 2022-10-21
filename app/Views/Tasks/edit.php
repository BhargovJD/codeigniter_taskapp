<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Edit task
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Edit task</h1>

<?php if (session()->has('errors')): ?>

<ul>
  <?php foreach(session('errors') as $error):   ?>
    <li><?= $error ?></li>
  <?php endforeach; ?>
</ul>

<?php endif ?>



<div class="container">
    <div class="row">
    <?= form_open("tasks/update/".$task['id']) ?>
  <div class="mb-3">
    <label for="" class="form-label">Task description</label>
    <input type="" name="description" class="form-control" id="" aria-describedby="" value="<?= old('description', esc($task['description'])) ?>">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?= site_url("tasks/show/".$task['id']) ?>">Cancel</a>
</form>
    </div>
</div>


<?= $this->endSection()?>
