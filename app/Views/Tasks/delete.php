<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Delete
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Delete</h1>

<p>Are you sure?</p>

<?= form_open("tasks/delete/".$task->id) ?>

<button>Yes</button>

<a href="<?= site_url("tasks/show/".$task->id) ?>">Cancel</a>

</from>

<?= $this->endSection()?>
