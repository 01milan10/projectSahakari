<footer class="main-footer">
  <strong>Copyright &copy; DataWorkshop Nepal.</strong>
  All rights reserved.
</footer>
</div>
<!-- jQuery -->
<script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/popper.js')); ?>"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>

<!-- DataTables -->
<script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')); ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
  });
</script>
</body>

</html><?php /**PATH F:\DataworkshopNepal\projectSahakari\resources\views/layouts/backend/footer.blade.php ENDPATH**/ ?>