<!DOCTYPE html>
<html>

<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>">

    <title>Project Sahakari</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">

    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')); ?>"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



    
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.fancybox.min.css')); ?>">


    <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">

</head>

<body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('header'); ?>
    <?php echo $__env->yieldContent('sidebar'); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->yieldContent('footer'); ?>
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/layouts/backend/app.blade.php ENDPATH**/ ?>