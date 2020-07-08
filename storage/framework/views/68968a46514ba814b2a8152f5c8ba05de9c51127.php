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
                        Our Vision and Objectives
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route("home")); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Our Vision and Objectives</li>
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

                            <div class="card-body" id="card-body">
                                <div>
                                    <input type="text" class="form-control mb-4 " placeholder="Our Vision" name="name" required autofocus>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Core Mission" name="coreMission" required>
                                </div>
                                <div id="mission">
                                    <div class="form-group row" id="missionHead">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control mb-1" placeholder="Mission Heading" name="missionHeading" required>
                                        </div>
                                        <div class="col-sm-1">
                                            <div id="add-new-head" class="btn btn-outline-primary">
                                                <i class="fa fa-plus"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div id="remove-new-head" class="btn btn-outline-danger">
                                                <i class="fa fa-minus"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row" id="subMission">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control mb-1" placeholder="Sub-mission" name="subMission[]" required>
                                        </div>
                                        <div class="col-sm-1">
                                            <div id="add-new-obj" class="btn btn-outline-primary">
                                                <i class="fa fa-plus"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div id="remove-new-obj" class="btn btn-outline-danger">
                                                <i class="fa fa-minus"></i>
                                            </div>
                                        </div>
                                    </div>
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
    });
    $(function() {
        let counter = 1;
        $("#add-new-obj").click(function() {
            if (counter < 12) {
                $("#subMission").first().val('').clone(true).appendTo($("#mission"));
                counter++;
            }
        });
        $("#remove-new-obj").click(function() {
            if (counter != 1) {
                $(this).closest("#subMission").remove();
                counter--;
            }
        });
    })
    $(function() {
        let counter = 1;
        $("#add-new-head").click(function() {
            if (counter < 5) {
                $("#mission").val('').clone(true).appendTo($("#card-body"));
                counter++;
            }
        });
        $("#remove-new-head").click(function() {
            if (counter != 1) {
                $(this).closest("#mission").remove();
                counter--;
            }
        });
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.backend.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/visionObjective/backendVisionObjective.blade.php ENDPATH**/ ?>