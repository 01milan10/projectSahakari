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
                    <h1>Edit User Credentials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Update User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class='col-md-10'>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit <?php echo e($user->name); ?>'s' Credentials</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('reset.password',$user->id)); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
                                    <div class="col-sm-10 mb-2">
                                        <input type="email" class="form-control" id="inputEmail3" value="<?php echo e($user['email']); ?>" name="email" required readonly>
                                    </div>
                                    <label for="inputPassword" class="col-sm-2 col-form-label">New Password:</label>
                                    <div class="col-sm-10 mb-2">
                                        <input type="text" class="form-control" id="inputPassword" name="password" required>
                                    </div>
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">confirm Password:</label>
                                    <div class="col-sm-10 mb-2">
                                        <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-user-edit mr-2"></i>
                                        Update</button>
                                    <form action="<?php echo e(route('home')); ?>">
                                        <button class="btn btn-danger float-right">
                                            <i class="fas fa-times mr-2"></i>
                                            Cancel</button>
                                    </form>
                                </div>
                                <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/User/resetPassword.blade.php ENDPATH**/ ?>