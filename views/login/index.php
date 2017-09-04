<h1 class="text-center">Login page</h1>

<div class="container">
    <form class="form-horizontal" action="<?php Route::asset('login/run'); ?>" method="POST">
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
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-default">
            </div>
        </div>
    </form>
</div>
