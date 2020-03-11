<footer class="main-footer">
    <strong>Copyright &copy; DataWorkshop Nepal.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>
</div>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('js/popper.js')}}"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
</script>
</body>
</html>
