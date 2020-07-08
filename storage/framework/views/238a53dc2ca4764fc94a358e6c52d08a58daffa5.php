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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-plus mr-2"></i>
                                Add Team Member</h3>
                        </div>
                        <form action="<?php echo e(route('add.team')); ?>" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div>
                                    <input type="text" class="form-control mb-4 " placeholder="Name" name="name" required autofocus>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Designation" name="designation" required>
                                </div>
                                <div>
                                    <input type="number" class="form-control mb-4" placeholder="Phone Number" name="phone" required>
                                </div>
                                <div>
                                    <input type="email" class="form-control mb-4" placeholder="Email" name="email" required>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Representation" name="representation" required>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Facebook Link" name="facebook">
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Gmail Link" name="gmail">
                                </div>

                                <div>
                                    <input type="file" name="image" class="form-control mb-4" required>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <div class="card-body">
                        <table id="imageTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Representation</th>
                                    <th>Profile Picture</th>
                                    <th>Facebook</th>
                                    <th>Gmail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($datum->name); ?></td>
                                    <td><?php echo e($datum->designation); ?></td>
                                    <td><?php echo e($datum->phone); ?></td>
                                    <td><?php echo e($datum->email); ?></td>
                                    <td><?php echo e($datum->representation); ?></td>
                                    <td><?php echo e($datum->image); ?></td>
                                    <td><?php echo e($datum->facebook); ?></td>
                                    <td><?php echo e($datum->gmail); ?></td>
                                    <td align="center">
                                        <a href="<?php echo e(route('show.updateForm',$datum->id)); ?>" data-toggle="tooltip" data-placement="top" title="Update">
                                            <i class="fa fa-redo-alt mr-3"></i>
                                        </a>
                                        <a href="<?php echo e(route('delete.team',$datum->id)); ?>" data-toggle="tooltip" data-placement="top" title="Delete" style="color:#dc3545">
                                            <i class="fa fa-user-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

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
<?php echo $__env->make("layouts.backend.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/team/backendTeam.blade.php ENDPATH**/ ?>