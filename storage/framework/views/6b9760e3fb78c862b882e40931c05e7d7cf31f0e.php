<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome-free/css/all.css')); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>

<body style="background:lightgrey">

    <div class="container">
        <div class="row mx-auto justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-12 col-sm-12 col-md-8">
                <form action="<?php echo e(route('register')); ?>" method="POST" class="needs-validation" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="card border-success shadow">
                        <div class="card-title display-4 text-center">Register</div>
                        <div class="card-body">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger text-center"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="form-group row justify-content-center">
                                <label for="name" class="col-sm-3 col-form-label text-sm-right">Name:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required autofocus>
                                    <div class="invalid-feedback">
                                        Enter your name.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="email" class="col-sm-3 col-form-label text-sm-right">Email:</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="email" placeholder="email@example.com" name="email" required autofocus pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                    <div class="invalid-feedback">
                                        Enter your email.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="inputPassword" class="col-sm-3 col-form-label text-sm-right">Password:</label>
                                <div class="col-sm-6 input-group">
                                    <input type="password" class="form-control" id="inputPassword" name="password" required autofocus minlength="6">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-outline-success showPassword">
                                            <i class="fas fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter your password.(Min: 6 characters)
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="password_confirmation" class="col-sm-3 col-form-label text-sm-right">Confirm Password:</label>
                                <div class="col-sm-6 input-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autofocus>
                                    <div class="invalid-feedback">
                                        Confirm your password.
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="form-group ma-5">
                                <a href="/login" class="btn btn-outline-success float-left">Login</a>
                                <button type="submit" class="btn btn-success float-right">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    $('.showPassword').click(function(e) {
        e.preventDefault();
        const inputPassword = $('#inputPassword');
        const type = inputPassword.attr('type');
        if (type === 'text') {
            inputPassword.attr('type', 'password');
            $('.showPassword .fas.fa-eye').removeClass("fa-eye").addClass("fa-eye-slash");

        } else {
            inputPassword.attr('type', 'text');
            $('.showPassword .fas.fa-eye-slash').removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script><?php /**PATH C:\xampp\htdocs\projectSahakari\resources\views/auth/register.blade.php ENDPATH**/ ?>