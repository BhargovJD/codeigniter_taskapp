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
    <?= form_open("tasks/update/".$task->id) ?>

    <?= $this->include('Tasks/form') ?>

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?= site_url("tasks/show/".$task->id) ?>">Cancel</a>
</form>
    </div>
</div>


<?= $this->endSection()?>
