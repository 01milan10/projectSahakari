<?php $__env->startSection('header'); ?>
<?php echo $__env->make('layouts.backend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('layouts.backend.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>List of current users.</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List Current Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Current Users:</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="userTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
                  <th>Position</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($user->name); ?></td>
                  <td><?php echo e($user->email); ?></td>
                  <td>
                    <?php echo e($user->password); ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('resetPassword',$user)): ?>
                    <a class="float-right" href="<?php echo e(route('show.resetForm',['user'=>$user->id])); ?>">
                      <i class="fas fa-pen-alt mr-4" data-toggle="tooltip" data-placement="top" title="Change Password">
                      </i>
                    </a>
                    <?php endif; ?>
                  </td>
                  <td>
                    <div>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$user)): ?>
                      <a href="<?php echo e(route('show.userUpdateForm',['id'=>$user->id])); ?>">
                        <i class="fas fa-user-edit mr-3" data-toggle="tooltip" data-placement="top" title="Edit user info">
                        </i>
                      </a>
                      <a href="<?php echo e(route('delete.user',['user'=>$user->id])); ?>">
                        <i class="fas fa-user-times ml-3" data-toggle="tooltip" data-placement="top" title="Delete user info" style="color:#dc3545">
                        </i>
                      </a>
                      <?php endif; ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('update',$user)): ?>
                      <p class='text-center'>not allowed</p>
                      <?php endif; ?>
                    </div>
                  </td>
                  <td>
                    <p class="text-center">---</p>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Action</th>
                  <th>Position</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
  $(document).ready(() => {
    $("#userTable").DataTable();
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projectSahakari\resources\views/User/listUser.blade.php ENDPATH**/ ?>