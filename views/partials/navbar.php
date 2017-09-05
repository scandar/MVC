<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Brand</a>
    </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php Route::asset('home'); ?>">Home</a></li>
        <li><a href="<?php Route::asset('help'); ?>">Help</a></li>

        <?php if (!Session::get('logged_in')): ?>
            <li><a href="<?php Route::asset('login'); ?>">Login</a></li>
        <?php  else:  ?>
            <li><a href="<?php Route::asset('dashboard'); ?>">Dashboard</a></li>

            <?php if (Session::get('role') == 'owner'): ?>
                <li><a href="<?php Route::asset('user'); ?>">Users</a></li>
            <?php endif; ?>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo Session::get('username'); ?>  <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php Route::asset('dashboard/logout'); ?>">Logout</a></li>
              </ul>
            </li>
        <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
