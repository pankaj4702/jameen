<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->



<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->

<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{  asset('dist/js/pages/dashboard2.js')  }}"></script>
<script>
    setTimeout(function() {
        var alertElement = document.querySelector('.alert');
        if (alertElement) {
            alertElement.remove();
        }
    }, 3000);
</script>

    <script>
        jQuery(document).ready(function () {
       jQuery("#price").keypress(function (e) {
           var length = jQuery(this).val().length;
           if (e.which == 8) {
               return true;
           }
           if (length >= 10 || (e.which < 48 || e.which > 57)) {
               return false;
           }
           if (length === 0 && e.which === 48) {
               return false;
           }
       });
       jQuery("#beds").keypress(function (e) {
           var length = jQuery(this).val().length;
           if (e.which == 8) {
               return true;
           }
           if (length >= 2 || (e.which < 48 || e.which > 57)) {
               return false;
           }
           if (length === 0 && e.which === 48) {
               return false;
           }
       });
       jQuery("#bath").keypress(function (e) {
           var length = jQuery(this).val().length;
           if (e.which == 8) {
               return true;
           }
           if (length >= 2 || (e.which < 48 || e.which > 57)) {
               return false;
           }
           if (length === 0 && e.which === 48) {
               return false;
           }
       });
   });
   </script>
    <script>
        const editor = ClassicEditor.create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

    </script>
     <script>
        $(document).ready(function() {
            $('#mytable').DataTable()
        });
    </script>
