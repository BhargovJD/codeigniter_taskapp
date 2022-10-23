<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Task
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Task Content</h1>
<a href="<?= site_url("tasks/new") ?>">Add a new task</a>

<?php if($tasks): ?>
<ul>
    <?php foreach($tasks as $task): ?>
        <li>
          <!-- <a href="task/show/<?= $task->id ?> "> -->
          <a href="<?= site_url("tasks/show/".$task->id) ?>">
            <?= esc($task->description) ?>
        </a>
        </li>
    <?php endforeach; ?>
</ul>

<?= $pager->links() ?>

<?php else: ?>
<p>No tasks found...</p>
<?php endif; ?>

<?= $this->endSection()?>
