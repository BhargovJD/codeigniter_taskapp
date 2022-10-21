<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Signup
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Signup</h1>

<?php if (session()->has('errors')): ?>

<ul>
  <?php foreach(session('errors') as $error):   ?>
    <li><?= $error ?></li>
  <?php endforeach; ?>
</ul>

<?php endif ?>



<div class="container">
    <div class="row">
    <?= form_open("signup/create") ?>

    <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="" aria-describedby="" value="<?= old('name') ?>">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="" aria-describedby="" value="<?= old('email') ?>">
    </div>

    
    <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="" aria-describedby="">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Repeat Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="" aria-describedby="">
    </div>



  <button type="submit" class="btn btn-primary">Signup</button>
  <a href="<?= site_url("") ?>">Cancel</a>
</form>
    </div>
</div>


<?= $this->endSection()?>
