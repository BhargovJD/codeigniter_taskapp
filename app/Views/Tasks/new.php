<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Task
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Add new task</h1>

<?php if (session()->has('errors')): ?>

<ul>
  <?php foreach(session('errors') as $error):   ?>
    <li><?= $error ?></li>
  <?php endforeach; ?>
</ul>

<?php endif ?>



<div class="container">
    <div class="row">
    <?= form_open("tasks/create") ?>


    <?= $this->include('Tasks/form') ?>

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?= site_url("tasks/") ?>">Cancel</a>
</form>
    </div>
</div>


<?= $this->endSection()?>
