<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Home
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Home Content</h1>
<a href="<?= site_url("signup/new")   ?>">Sign up</a>
<?= $this->endSection()?>
