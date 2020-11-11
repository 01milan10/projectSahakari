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
                    <h1><?php echo e($feature->title); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('create.feature')); ?>">Features</a></li>
                        <li class="breadcrumb-item active"><?php echo e($feature->title); ?></li>
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
                                <?php echo e($feature->title); ?>

                            </h3>
                        </div>
                        <img class="card-img-top" src="/uploaded_images/services_images/<?php echo e($feature->image); ?>" alt="featureImage" style="max-height:400px;object-fit:cover">
                        <div class="card-body">
                            <div class="card-text">
                                <span>
                                    <?php echo e($feature->description); ?>

                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="<?php echo e(route('delete.feature',['feature'=>$feature->id])); ?>" class="btn btn-outline-danger">
                                Delete
                            </a>
                            <a type="button" href="<?php echo e(route('edit.feature',['feature'=>$feature->id])); ?>" class="btn btn-info float-right">
                                Edit
                            </a>
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
<script src="<?php echo e(asset('js/summernote/summernote-bs4.js')); ?>"></script>
<script type="text/javascript">
    $(function() {
        $('#featuresTable').DataTable();
        $("[data-toggle='tooltip']").tooltip();
        $('#description').summernote({
            placeholder: "Please write feature's description.",
            tabSize: 3,
            height: 120,
        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.backend.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projectSahakari\resources\views/features/show.blade.php ENDPATH**/ ?>