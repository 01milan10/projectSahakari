<!DOCTYPE html>
<html lang="en">

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo e(route('landingPage')); ?>" class="nav-link">Frontend</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-circle"></i>
            <span class="mx-1"><?php echo e(Auth:: user()->name); ?></span>
            <i class="fas fa-angle-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?php echo e(Auth:: user()->name); ?></span>
            <div class="dropdown-divider"></div>
            <div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#resetModal"> <i class="fas fa-user-cog mr-2"></i>Change Password</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changeAvatar"><i class="fas fa-portrait mr-2"></i>Change Profile picture</a>
            </div>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item dropdown-footer" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <p>
                <i class="fas fa-sign-out-alt mr-2"></i>Logout</p>
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
            </form>
          </div>
        </li>
      </ul>
    </nav>
    <!--Password Reset Modal -->
    <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="resetModalLabel">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo e(route('reset.password',Auth:: user()->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
              <div class="row">
                <label for="inputEmail" class="col-sm-4 col-form-label text-right">Email:</label>
                <div class="col-sm-8 mb-2">
                  <input type="email" class="form-control" id="inputEmail" value="<?php echo e(Auth::user()->email); ?>" name="email" readonly required>
                </div>
              </div>
              <div class="row">
                <label for="resetPassword" class="col-sm-4 col-form-label text-right">New Password:</label>
                <div class="col-sm-8 mb-2">
                  <input type="password" class="form-control" id="resetPassword" name="password" required>
                </div>
              </div>
              <div class="row">
                <label for="password_confirmation" class="col-sm-4 col-form-label text-right">Confirm Password:</label>
                <div class="col-sm-8 mb-2">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info">Change</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--Change Avatar Modal -->
    <div class="modal fade" id="changeAvatar" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Change Profile Picture</h5>
            <button class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?php echo e(route('change.avatar',Auth:: user()->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
              <div class="row">
                <label for="avatar" class="col-sm-4 col-form-label text-right">Profile Picture:</label>
                <div class="col-sm-8 mb-2">
                  <input type="file" class="form-control-file" name="avatar" id="avatar">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-info">Change</button>
            </div>
          </form>
        </div>
      </div>

    </div><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/layouts/backend/header.blade.php ENDPATH**/ ?>