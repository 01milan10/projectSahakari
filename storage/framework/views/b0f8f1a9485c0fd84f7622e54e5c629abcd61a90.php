<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .table {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .table-row {
            display: table-row;
        }

        .table-cell {
            display: table-cell;
            border: 1px solid black;
            padding: 1em;
        }
    </style>
</head>

<body>
    <div class="table">
        <div class="table-row">
            <div class="table-cell"><b>COLLECTOR</b></div>
            <div class="table-cell"><b>COLLECTED AMOUNT:</b></div>
            <div class="table-cell"><b>WITHDRAWN AMOUNT:</b></div>
            <div class="table-cell"><b>CLIENT NAME</b></div>
            <div class="table-cell"><b>COLLECTED DATE</b></div>
        </div>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="table-row">
            <div class="table-cell"><?php echo e($datum['collected_by']); ?></div>
            <div class="table-cell"><?php echo e($datum['deposited_amount']); ?></div>
            <div class="table-cell"><?php echo e($datum['withdrawn_amount']); ?></div>
            <div class="table-cell"><?php echo e($datum['client_name']); ?></div>
            <div class="table-cell"><?php echo e($datum['collected_date']); ?></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\projectSahakari\resources\views/report/downloadReport.blade.php ENDPATH**/ ?>