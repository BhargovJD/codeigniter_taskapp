<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
New user
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Add new user</h1>

<?php if (session()->has('errors')): ?>

<ul>
  <?php foreach(session('errors') as $error):   ?>
    <li><?= $error ?></li>
  <?php endforeach; ?>
</ul>

<?php endif ?>



<div class="container">
    <div class="row">
    <?= form_open("admin/users/create") ?>


    <?= $this->include('Admin/Users/form') ?>

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?= site_url("admin/users") ?>">Cancel</a>
</form>
    </div>
</div>


<?= $this->endSection()?>
