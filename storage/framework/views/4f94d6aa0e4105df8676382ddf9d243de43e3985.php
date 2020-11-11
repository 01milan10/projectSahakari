<?php $__env->startSection('header'); ?>
<?php echo $__env->make('layouts.backend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('layouts.backend.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="card card-info card-outline messagesCard">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>

                <div class="card-tools">
                    <!-- <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search Mail">
                        <div class="input-group-append">
                            <div class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle" data-toggle="tooltip" data-placement="top" data-title="select all"><i class="far fa-square"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm deleteMessage" data-toggle="tooltip" data-placement="top" data-title="delete"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm syncMessages" data-toggle="tooltip" data-placement="top" data-title="sync">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <div class="float-right">
                        <?php echo e($messages->render()); ?>

                    </div>
                    <!-- /.float-right -->
                </div>
                <div class="table-responsive mailbox-messages">
                    <table id="messagesTable" class="table table-hover table-striped ">
                        <tbody>
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="inboxRow<?php echo e($message->id); ?>">
                                <td>
                                    <div class="icheck-primary">
                                        <input type="checkbox" value="<?php echo e($message->id); ?>" id="check<?php echo e($message->id); ?>">
                                        <label for="check<?php echo e($message->id); ?>"></label>
                                    </div>
                                </td>
                                <td class="mailbox-name">
                                    <a href="#" class="readMail" data-toggle="modal" data-target="#read_mail" id="<?php echo e($message->id); ?>" data-message="<?php echo e($message); ?>">
                                        <?php echo e($message->sender_name); ?>

                                    </a>
                                </td>
                                <td class="mailbox-subject">
                                    <span class="badge badge-pill badge-warning text-white" id="mail-badge<?php echo e($message->id); ?>"><?php echo e($message->badge); ?></span>
                                    <b><?php echo e($message->message_subject); ?></b> - <?php echo e(Str::limit($message->message,40)); ?>

                                </td>
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date"><?php echo e($message->created_at); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer p-0">
                <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle" data-toggle="tooltip" data-placement="top" data-title="select all"><i class="far fa-square"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm deleteMessage" data-toggle="tooltip" data-placement="top" data-title="delete"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm syncMessages" data-toggle="tooltip" data-placement="top" data-title="sync"><i class="fas fa-sync-alt"></i></button>
                    <div class="float-right">
                        <?php echo e($messages->render()); ?>

                    </div>
                    <!-- /.float-right -->
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="read_mail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">Read Mail</h3>

                <div class="card-tools">
                    <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Close" data-dismiss="modal"><i class="fas fa-times"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="mailbox-read-info">
                    <h5><b class="subject">Some subject</b></h5>
                    <h6>
                        <span class="sender_email">From: Some email</span>
                        <span class=" mailbox-read-time float-right created">2020</span>
                    </h6>
                </div>
                <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                        <a type="button" class="btn btn-default btn-sm deleteCurrentMessage" data-toggle="tooltip" data-container="body" title="Delete">
                            <i class="far fa-trash-alt"></i></a>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                            <i class="fas fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                            <i class="fas fa-share"></i></button>
                    </div>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                        <i class="fas fa-print"></i></button>
                </div>
                <div class="mailbox-read-message">
                    <input type="hidden" class="mailId" id="">
                    <p>Hello <?php echo e(Auth::user()->name); ?>,</p>

                    <p class="message">some message</p>

                    <p>Thanks,<br>
                        <span class="sender">some person</span>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-default deleteCurrentMessage"><i class="far fa-trash-alt"></i> Delete</a>
                <button class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo $__env->make('layouts.backend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset("js/moment.js")); ?>'></script>
<script>
    $('[data-toggle="tooltip"]').tooltip();
    // $('#messagesTable').DataTable();

    $(function() {
        //remove the new badge
        $('.readMail').click(function() {
            const id = $(this).attr('id');
            $.ajax({
                type: 'get',
                url: `/mail/old/${id}`,
                success: $(`#mail-badge${id}`).remove()
            })

            //changing modal content dynamically
            const message_subject = $('.subject').text($(this).data("message").message_subject);
            const sender_email = $('.sender_email').text("From: " + $(this).data("message").sender_email);
            let date = $(this).data("message").created_at;
            let formatted_date = moment(date).format("dddd, MMMM Do YYYY");
            const sent_date = $('.created').text(formatted_date);
            const sent_message = $('.message').text($(this).data("message").message);
            const sender_name = $('.sender').text($(this).data("message").sender_name);
            const mail_id = $('.mailId').attr('id', $(this).data("message").id);




        })
        //Check new messages
        $('.syncMessages').click(function() {
            location.reload(true)
        })
        //Delete selected messages
        $('.deleteMessage').click(function(e) {
            e.preventDefault();
            $('.mailbox-messages input[type=\'checkbox\']:checked').each(function() {
                $.ajax({
                    type: "get",
                    url: `/inbox/${this.value}/delete`,
                    success: $(`#inboxRow${this.value}`).remove(),
                });
                location.reload(true);

            })

        })
        //Delete current message
        $('.deleteCurrentMessage').click(function() {
            const currentId = $('.mailId').attr('id');
            const currentMail = $(`#inboxRow${currentId}`);
            $.ajax({
                type: "get",
                url: `/inbox/${currentId}`,
                success: () => {
                    $('.modal').modal('hide');
                    currentMail.remove();
                },
            });

        });
        //Format the date 
        var toNowDate = $('.mailbox-date');
        for (i = 0; i < toNowDate.length; i++) {
            let value = toNowDate[i].innerText;
            const toNow = moment(value).toNow(true);
            toNowDate[i].innerText = toNow + ' ago';
        }
        //Enable check and uncheck all functionality
        $('.checkbox-toggle').click(function() {
            var clicks = $(this).data('clicks')
            if (clicks) {
                //Uncheck all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
            } else {
                //Check all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
            }
            $(this).data('clicks', !clicks)

        })
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.backend.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projectSahakari\resources\views/inbox/inbox.blade.php ENDPATH**/ ?>