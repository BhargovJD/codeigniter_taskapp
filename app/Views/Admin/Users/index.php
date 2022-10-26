<?= $this->extend("layouts/defaults") ?>

<?= $this->section("title") ?>
Users
<?= $this->endSection()?>


<?= $this->section("content") ?>
<h1>Task Content</h1>
<a href="<?= site_url("admin/users/new") ?>">Add a new user</a>

<?php if($users): ?>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td>
          <a href="<?= site_url("admin/users/show/".$user->id) ?>">
            <?= esc($user->name) ?>
        </a>
            </td>
            <td>
            <?= esc($user->email) ?>
            </td>
            <td>
            <?= esc($user->created_at) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?= $pager->links() ?>

<?php else: ?>
<p>No users found...</p>
<?php endif; ?>

<?= $this->endSection()?>
