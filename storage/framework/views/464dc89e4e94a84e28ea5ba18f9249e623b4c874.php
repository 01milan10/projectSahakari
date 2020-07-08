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
                    <h1>Client's Comment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Testimonials</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">
                                Add Comments:
                            </h3>
                        </div>
                        <form method="Post" action="<?php echo e(route('add.comment')); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div>
                                    <input type="text" class="form-control mb-4 " placeholder="Name" name="name" required autofocus>
                                </div>
                                <div>
                                    <input type="text" class="form-control mb-4" placeholder="Designation" name="designation" required>
                                </div>
                                <div>
                                    <input type="email" class="form-control mb-4" placeholder="Email" name="email" required>
                                </div>
                                <div>
                                    <input type="file" name="image" class="form-control mb-4" required>
                                </div>
                                <div>
                                    <textarea class="form-control mb-4 textarea" name="comment" required></textarea>
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
                <!-- /.col-->
            </div>
        </div>
        <!-- ./row -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">List of comments.</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="commentTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($comment->name); ?></td>
                                    <td><?php echo e($comment->designation); ?></td>
                                    <td><?php echo e($comment->email); ?></td>
                                    <td><?php echo e($comment->image); ?></td>
                                    <td style="text-align:center">
                                        <div>
                                            <a href="<?php echo e(route('delete.comment',['id'=>$comment->id])); ?>">
                                                <i class="fas fa-trash  ml-3" data-toggle="tooltip" data-placement="top" title="Delete" style="color:#dc3545">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Action</th>
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
<script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script type="text/javascript">
    $('#commentTable').DataTable();
    $('[data-toggle=tooltip]').tooltip();
    $(function() {
        $('.textarea').summernote({
            placeholder: 'Please write comments here.',
            tabSize: 3,
            height: 340,
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.backend.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/testimonials/backendTestimonials.blade.php ENDPATH**/ ?>