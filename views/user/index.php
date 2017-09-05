<h1 class="text-center">Create User</h1>

<div class="container">
    <form class="form-horizontal" action="<?php Route::asset('user/create'); ?>" method="POST">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input name="username" type="text" class="form-control" id="username" placeholder="username">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input name="password" type="password" class="form-control" id="password" placeholder="password">
            </div>
        </div>
        <div class="form-group">
            <label for="role" class="col-sm-2 control-label">Role</label>
            <div class="col-sm-10">
                <select class="form-control" name="role" id="role">
                    <option>default</option>
                    <option>admin</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-default">
            </div>
        </div>
    </form>
</div>



<?php if (isset($this->users)): ?>
    <div class="container">

        <table class="table table-bordered">
            <thead>
                <td>ID</td>
                <td>Username</td>
                <td>Role</td>
            </thead>

            <tbody>
                <?php foreach ($this->users as $user): ?>
                    <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo $user['username'] ?></td>
                        <td><?php echo $user['role'] ?></td>
                        <td><a href="<?php Route::asset('user/edit/'.$user['id']) ?>" class="btn btn-primary btn-sm">Edit</a></td>
                        <td><a href="<?php Route::asset('user/destroy/'.$user['id']) ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
<?php endif; ?>
