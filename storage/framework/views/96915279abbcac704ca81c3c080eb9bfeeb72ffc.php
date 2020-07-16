<?php $__env->startSection('header'); ?>
<?php echo $__env->make('layouts.backend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('layouts.backend.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="card card-info">
            <div class="card-header">
                <div class="card-title">
                    Your Inbox
                </div>
            </div>
            <div class="card-body">
                <table id="messagesTable" class="table table-striped">
                    <thead class="text-center">
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Sender</th>
                        <th>Sender Email</th>
                        <th>Sent At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-center">
                            <td><?php echo e($message->message_subject); ?></td>
                            <td><?php echo e($message->message); ?></td>
                            <td><?php echo e($message->sender_name); ?></td>
                            <td><?php echo e($message->sender_email); ?></td>
                            <td><?php echo e($message->created_at); ?></td>
                            <td><a href="<?php echo e(route('delete.message',$message->id)); ?>" data-toggle="tooltip" data-title="delete" data-placement="left"><i class="fa fa-trash" style="color:red"></i></a></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <thead class="text-center">
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Sender</th>
                        <th>Sender Email</th>
                        <th>Sent At</th>
                        <th>Action</th>

                    </thead>
                </table>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $('#messagesTable').DataTable();
    $('[data-toggle="tooltip"]').tooltip();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.backend.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/inbox/inbox.blade.php ENDPATH**/ ?>