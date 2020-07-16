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
                    <h1>Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route("home")); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
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
                                Add Image</h3>
                        </div>
                        <form action="<?php echo e(route('image.upload')); ?>" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div>
                                    <input type="text" id="title" class="form-control mb-4" placeholder="Title" name="title" required autocomplete="title" autofocus>
                                </div>
                                <div>
                                    <input type="text" id="category" class="form-control mb-4" placeholder="Category" name="category" required autocomplete="category">
                                </div>
                                <div>
                                    <input type="file" id="file" name="image[]" class="form-control mb-4" placeholder="Select an image to upload." required autocomplete="file" multiple>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit">
                                    <i class="fas fa-upload mr-2"></i>
                                    Upload</button>
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
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>File Name</th>
                                    <th>Action</th>
                                    <th>Posted Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($image->id); ?></td>
                                    <td><?php echo e($image->title); ?></td>
                                    <td><?php echo e($image->category); ?></td>
                                    <td><?php echo e($image->image); ?></td>
                                    <td style="text-align:center">
                                        <div>
                                            <a href="<?php echo e(route('image.delete',['id'=>$image->id])); ?>" data-toggle="tooltip" data-title="Delete" data-placement="top">
                                                <i class="fas fa-trash ml-3" style="color:#dc3545">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?php echo e($image->created_at); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>File Name</th>
                                    <th>Action</th>
                                    <th>Posted Date</th>
                                </tr>
                            </tfoot>
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
    $(document).ready(function() {
        $("#imageTable").dataTable();
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.backend.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/gallery/backendGallery.blade.php ENDPATH**/ ?>