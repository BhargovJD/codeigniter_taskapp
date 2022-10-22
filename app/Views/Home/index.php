<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Home
<?= $this->endSection()?>


<?= $this->section("content") ?>

<h1>Home Content</h1>
<a href="<?= site_url("signup/new")   ?>">Sign up</a>


<?php if(session()->has('user_id_session')): ?>
    <p>User is logged in</p>
    <p>Hello <?= esc(current_user()->name) ?></p>
    <a href="<?= site_url("logout")   ?>">Log out</a>
<?php else: ?>
    <p>User is not logged in</p>
    <a href="<?= site_url("login")   ?>">Log in</a>
<?php endif ?>

<?= $this->endSection()?>
