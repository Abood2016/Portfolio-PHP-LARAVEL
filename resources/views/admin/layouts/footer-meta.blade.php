<!-- jQuery -->
<script src="{{ asset('backend-assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend-assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend-assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('backend-assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('backend-assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend-assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend-assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend-assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('backend-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('backend-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend-assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend-assets/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend-assets/dist/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('backend-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend-assets/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{ asset('backend-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
    $(function() {
            // Summernote
            $('#description').summernote({dialogsInBody: true});
            
        });
</script>

<script>

//image input show image by abed
    $(document).ready(function () {
    $('#file-image').on('change', function () { //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
    $('#thumb-output').html(''); //clear html of output element
    var data = $(this)[0].files; //this file data
    
    $.each(data, function (index, file) { //loop though each file
    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
    var fRead = new FileReader(); //new filereader
    fRead.onload = (function (file) { //trigger function on successful read
    return function (e) {
    var img = $('<img />').addClass('thumb').attr('src', e.target.result); //create image element
    $('#thumb-output').append(img); //append image to output element
    };
    })(file);
    fRead.readAsDataURL(file); //URL representing the file's data.
    }
    });
    
    } else {
    alert("Your browser doesn't support File API!"); //if File API is absent
    }
    });
    });

</script>