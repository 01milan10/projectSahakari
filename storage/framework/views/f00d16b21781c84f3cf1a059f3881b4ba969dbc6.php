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
                                <i class="fas fa-plus mr-2"></i>
                                Add Contacts</h3>
                        </div>
                        <form action="<?php echo e(route('add.contacts')); ?>" class="form-image-upload" method="POST" enctype="multipart/form-data">
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
unset($__errorArgs, $__bag); ?>" placeholder="District" name="location" required autocomplete="location" autofocus>
                                </div>
                                <div>
                                    <label for="address"></label><input type="text" id="address" class="form-control mb-4 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Address" name="address" required autocomplete="address" autofocus>
                                </div>
                                <div>
                                    <label for="phone"></label><input type="number" id="phone" class="form-control mb-4 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Telephone Number" name="phone" required autocomplete="phone" autofocus>
                                </div>
                                <div>
                                    <label for="alt_phone"></label><input type="number" id="alt_phone" class="form-control mb-4" placeholder="Alternative Telephone" name="alt_phone">
                                </div>
                                <div>
                                    <label for="fax"></label><input type="number" id="fax" class="form-control mb-4" placeholder="Fax Number" name="fax">
                                </div>
                                <div>
                                    <label for="email"></label><input type="email" id="email" class="form-control mb-4 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email" name="email" required autocomplete="email" autofocus>
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
                        <h3 class="card-title">List of contacts.</h3>
                    </div>
                    <div class="card-body">
                        <table id="contactsTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>District</th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Alternate Line</th>
                                    <th>Fax</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($contact->district); ?></td>
                                    <td><?php echo e($contact->address); ?></td>
                                    <td><?php echo e($contact->phone); ?></td>
                                    <td><?php echo e($contact->alt_phone); ?></td>
                                    <td><?php echo e($contact->fax); ?></td>
                                    <td><?php echo e($contact->email); ?></td>
                                    <td style="text-align:center">
                                        <div>
                                            <a href="<?php echo e(route('update.contacts',$contact->id)); ?>">
                                                <i class="fas fa-pen-alt mr-3" data-toggle="tooltip" data-placement="top" title="update">
                                                </i>
                                            </a>
                                            <a href="<?php echo e(route('delete.contacts',$contact->id)); ?>">
                                                <i class="fas fa-trash ml-3" data-toggle="tooltip" data-placement="top" title="delete" style="color:#dc3545">
                                                </i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>District</th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Alternate Line</th>
                                    <th>Fax</th>
                                    <th>Email</th>
                                    <th>Action</th>
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
<script>
    jQuery(document).ready(() => {
        $("#contactsTable").DataTable();
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/contacts/backendContacts.blade.php ENDPATH**/ ?>