<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Signup
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Login</h1>


<div class="container">
    <div class="row">
    <?= form_open("login/create") ?>

    <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="" aria-describedby="" value="<?= old('email') ?>">
    </div>

    
    <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="" aria-describedby="">
    </div>


  <button type="submit" class="btn btn-primary">Login</button>
  <a href="<?= site_url("") ?>">Cancel</a>
</form>
    </div>
</div>


<?= $this->endSection()?>
