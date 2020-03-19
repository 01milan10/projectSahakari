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
            <div class="container col-lg-12">
                <div class="row justify-content-center">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Add report to database.</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('add.report')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="card-body">
                                    <table id="reportTable" class="table table-borderless">
                                        <thead>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Deposited Amount</th>
                                        <th>Withdraw Amount</th>
                                        <th>Collected By</th>
                                        <th>Collection Date</th>
                                        </thead>
                                        <tbody id="reportTabBody">
                                        <tr id="row">
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="client_name" required placeholder="Client Name" name="name[]">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="email" class="form-control" id="client_email" required placeholder="Client Email" name="email[]">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="deposit" required placeholder="Deposited Amount" name="deposit[]">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" id="withdraw" required placeholder="Withdrawn Amount" name="withdraw[]">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="collector" required placeholder="Collector's Name" name="cName[]">
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group row" id="last_child">
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="date" required name="collected_date[]">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div id="add-new-row" class="btn btn-outline-primary">
                                                            <i class="fa fa-plus"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div id="remove-new-row" class="btn btn-outline-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-info">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add
                                </button>
                                <button type="reset" class="btn btn-danger float-right">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancel
                                </button>
                            </form>

                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Today's Collection</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="collectorTable">
                                <thead>
                                <th>Collector Name</th>
                                <th>Collected</th>
                                <th>Client Name</th>
                                <th>Collected Date</th>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $balances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($balance["collected_by"]); ?></td>
                                        <td><?php echo e($balance["deposited_amount"]); ?></td>
                                        <td><?php echo e($balance["client_name"]); ?></td>
                                        <td><?php echo e($balance["collected_date"]); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="btn btn-outline-primary" id="download">
                                <i class="fa fa-file-download"></i>
                            </div>
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
    <script>
        $('#collectorTable').DataTable();
        $('[data-toggle="tooltip"]').tooltip();
        $("#download").click(function () {
            let query = {
                'data':$('.dataTables_filter input').val()
            };
            let url = "<?php echo e(URL::to('/download')); ?>?" + $.param(query)
            window.location = url;
        });

        $(function () {
            let counter=1;
            $("#add-new-row").click(function () {
                if(counter<12) {
                    $("#row").first().clone(true).appendTo($("#reportTable"));
                    counter++;
                }
            });
            $("#remove-new-row").click(function () {
                if(counter!=1){
                    $(this).closest("#row").remove();
                    counter--
                }
            });
        })

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/report/addDataReport.blade.php ENDPATH**/ ?>