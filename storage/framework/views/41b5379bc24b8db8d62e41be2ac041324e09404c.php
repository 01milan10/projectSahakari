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
                        <h1>Report Entry</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Report Entry</li>
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
                                <h3 class="card-title">Add report to database.</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('add.report')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="client_name" class="col-sm-2 col-form-label">Client Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="client_name" placeholder="Client Name" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="client_email" class="col-sm-2 col-form-label">Client Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="client_email" placeholder="Client Email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deposit" class="col-sm-2 col-form-label">Deposited Amount</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="deposit" placeholder="Deposited Amount" name="deposit">
                                        </div>
                                    </div><div class="form-group row">
                                        <label for="deposit" class="col-sm-2 col-form-label">Withdraw Amount</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="deposit" placeholder="Withdrawn Amount" name="withdraw">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="collector" class="col-sm-2 col-form-label">Collected By</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="collector" placeholder="Collector's Name" name="cName">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-2 col-form-label">Submission Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="date" name="collected_date">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-plus mr-2"></i>
                                        Add</button>
                                    <button type="reset" class="btn btn-danger float-right">
                                        <i class="fas fa-times mr-2"></i>
                                        Cancel</button>
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

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/report/addDataReport.blade.php ENDPATH**/ ?>