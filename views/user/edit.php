<?php if (isset($this->user)): ?>
    <h1 class="text-center">Edit User</h1>

    <div class="container">
        <form class="form-horizontal" action="<?php Route::asset('user/update/'. $this->user['id']); ?>" method="POST">
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input name="username" type="text"
                  class="form-control" id="username"
                  placeholder="username" value="<?php echo $this->user['username'] ?>">
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
                        <option <?php echo ($this->user['role'] == 'default')? 'selected': ''; ?>>default</option>
                        <option <?php echo ($this->user['role'] == 'admin')? 'selected': ''; ?>>admin</option>
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
<?php endif; ?>
