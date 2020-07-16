<footer class="main-footer">
  <strong>Copyright &copy; DataWorkshop Nepal.</strong>
  All rights reserved.
</footer>
</div>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('js/popper.js')}}"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>

<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

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

</html>