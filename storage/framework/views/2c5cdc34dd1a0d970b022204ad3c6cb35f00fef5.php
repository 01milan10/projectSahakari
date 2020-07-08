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
                    <h1>
                        <i class="fa fa-users"></i>
                        Our Team
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route("home")); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Our Team</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class='col-md-10'>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus mr-2"></i>
                                Add Team Member</h3>
                        </div>
                        <form action="<?php echo e(route('update.team',$data['id'])); ?>" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div>
                                    <input type="text" class="form-control mb-4 " value="<?php echo e($data['name']); ?>" name="name" required autofocus>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" value="<?php echo e($data['designation']); ?>" name="designation" required>
                                </div>
                                <div>
                                    <input type="number" class="form-control mb-4" value="<?php echo e($data['phone']); ?>" name="phone" required>
                                </div>
                                <div>
                                    <input type="email" class="form-control mb-4" value="<?php echo e($data['email']); ?>" name="email" required>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" value="<?php echo e($data['representation']); ?>" name="representation" required>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" value="<?php echo e($data['facebook']); ?>" placeholder="Facebook link" name="facebook">
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" value="<?php echo e($data['gmail']); ?>" placeholder="Gmail link" name="gmail">
                                </div>
                                <div>
                                    <input type="file" name="image" class="form-control mb-4">
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit">
                                        <i class="fas fa-upload"></i>
                                        Update</button>
                                </div>
                            </div>
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

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();
    $(document).ready(function() {
        $("#imageTable").dataTable();

        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.backend.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/team/teamUpdateForm.blade.php ENDPATH**/ ?>