<footer class="main-footer">
  <strong>Copyright &copy; DataWorkshop Nepal.</strong>
  All rights reserved.
</footer>
</div>
<!-- jQuery -->
<script src="<?php echo e(asset('js/jquery/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/popper.js')); ?>"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="<?php echo e(asset('js/adminlte/adminlte.js')); ?>"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<script>
  //Counting new messages
  $.ajax({
    method: "get",
    url: "/new-mail-count",
    success: (response) => {
      if (response > 0) {
        $('.newMessageCount').text(response + ' new');
      } else {
        $('.newMessageCount').text('');
      }
    }
  })

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
  });
  $('.showPassword').click(function(e) {
    e.preventDefault();
    const inputPassword = $('#resetPassword');
    const type = inputPassword.attr('type');
    if (type === 'text') {
      inputPassword.attr('type', 'password');
      $('.showPassword .fas.fa-eye').removeClass("fa-eye").addClass("fa-eye-slash");

    } else {
      inputPassword.attr('type', 'text');
      $('.showPassword .fas.fa-eye-slash').removeClass("fa-eye-slash").addClass("fa-eye");
    }
  });
</script>
</body>

</html><?php /**PATH C:\xampp\htdocs\projectSahakari\resources\views/layouts/backend/footer.blade.php ENDPATH**/ ?>