<html>

<head>
    <title>
        Project Sahakari
    </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div id="app">
        <?php if(auth()->guard()->check()): ?>
        <App v-bind:is-auth="1" />
        <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
        <App v-bind:is-auth="0" />
        <?php endif; ?>
    </div>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="<?php echo e(asset('js/gsap-public/minified/gsap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/animation/animation.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\projectSahakari\resources\views/welcome.blade.php ENDPATH**/ ?>