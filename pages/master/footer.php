    <footer class="main-footer">
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="">MD Sadique</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- InputMask -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>dist/js/demo.js"></script>
<!-- Select2 -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<script>
  $(function () {
    $('[data-mask]').inputmask();

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  })
</script>
</body>
</html>
