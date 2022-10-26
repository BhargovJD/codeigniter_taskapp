<div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="" aria-describedby="" value="<?= old('name', esc($user->name)) ?>">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="" aria-describedby="" value="<?= old('email', esc($user->email)) ?>">
    </div>

    
    <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="" aria-describedby="">
    <?php if($user->id): ?>
    <p>Leave blank to keep existing password</p>
    <?php endif; ?>
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Repeat Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="" aria-describedby="">
    </div>