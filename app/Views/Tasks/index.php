<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Task
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Task Content</h1>
<ul>
    <?php foreach($tasks as $task): ?>
        <li>
            <?= $task['id'] ?>
            <?= $task['description'] ?>
        </li>
    <?php endforeach; ?>
</ul>
<?= $this->endSection()?>
