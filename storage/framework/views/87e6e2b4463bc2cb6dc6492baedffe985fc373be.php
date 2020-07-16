<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>

<body style="background:lightgrey">

    <div class="container">
        <div class="row mx-auto justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-12 col-sm-12 col-md-8">
                <form action="<?php echo e(route('register')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="card border-info shadow">
                        <div class="card-title display-4 text-center">Register</div>
                        <div class="card-body">
                            <div class="form-group row justify-content-center">
                                <label for="name" class="col-sm-3 col-form-label text-sm-right">Name:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="email" class="col-sm-3 col-form-label text-sm-right">Email:</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="email" placeholder="email@example.com" name="email" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="inputPassword" class="col-sm-3 col-form-label text-sm-right">Password:</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputPassword" name="password" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="password_confirmation" class="col-sm-3 col-form-label text-sm-right">Confirm Password:</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autofocus>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/auth/register.blade.php ENDPATH**/ ?>