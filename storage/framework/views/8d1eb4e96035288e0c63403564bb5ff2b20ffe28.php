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
                    <h1>Contacts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route("home")); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Contacts</li>
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
                                Update <?php echo e($contact->location); ?>'s branch information</h3>
                        </div>
                        <form action="<?php echo e(route('update.contacts',['id'=>$contact->id])); ?>" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="card-body">
                                <div>
                                    <label for="location"></label><input type="text" id="location" class="form-control mb-4 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($contact['district']); ?>" name="location" required autocomplete="location" autofocus>
                                </div>
                                <div>
                                    <label for="address"></label><input type="text" id="address" class="form-control mb-4 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($contact['address']); ?>" name="address" required autocomplete="address" autofocus>
                                </div>
                                <div>
                                    <label for="phone"></label><input type="number" id="phone" class="form-control mb-4 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($contact->phone); ?>" name="phone" required autocomplete="phone" autofocus>
                                </div>
                                <div>
                                    <label for="alt_phone"></label><input type="number" id="alt_phone" class="form-control mb-4" value="<?php echo e($contact->alt_phone); ?>" name="alt_phone">
                                </div>
                                <div>
                                    <label for="fax"></label><input type="number" id="fax" class="form-control mb-4" value="<?php echo e($contact->fax); ?>" name="fax">
                                </div>
                                <div>
                                    <label for="email"></label><input type="email" id="email" class="form-control mb-4 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($contact->email); ?>" name="email" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit">
                                    <i class="fas fa-pen-alt mr-2"></i>
                                    Update</button>
                                <button class="btn btn-danger float-right" type="reset">
                                    <a class="btn-danger" href="<?php echo e(route('show.contactForm')); ?>">
                                        <i class="fas fa-times mr-2"></i>
                                        Cancel
                                    </a>
                                </button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/contacts/updateContacts.blade.php ENDPATH**/ ?>