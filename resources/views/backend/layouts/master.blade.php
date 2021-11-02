
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel | eCommerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/backend/dist/css/adminlte.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-------Sweet Alert-------->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- jQuery -->
<script src="{{ asset('public/backend/plugins/jquery/jquery.min.js') }}"></script>
<style type="text/css">
  .notifyjs-corner{
      z-index:1000!important;
  }
</style>
<!-------Notify---->
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">




@include('backend.layouts.header')
@include('backend.layouts.sidebar')
@yield('content')
@include('backend.layouts.footer')


@if(session()->has('success'))
    <script type="text/javascript">
        $(function(){
        $.notify("{{session()->get('success')}}",{globalPosition:'top right',className:'success'});
        });
    </script>
@endif

@if(session()->has('error'))
    <script type="text/javascript">
        $(function(){
        $.notify("{{session()->get('error')}}",{globalPosition:'top right',className:'error'});
        });
    </script>
@endif



  <!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('public/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/backend/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('public/backend/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('public/backend/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('public/backend/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/backend/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/backend/dist/js/pages/dashboard2.js') }}"></script>

<!-- Select2 -->
<script src="{{asset('public/backend')}}/plugins/select2/js/select2.full.min.js"></script>

<!-- jquery-validation -->
<script src="{{ asset('public/backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>



<!-------sweet alert delete------->
<script type="text/javascript">
    $(function(){
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
              title: 'Are you sure?',
              text: "Delete this data!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                  window.location.href = link;
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted successfully.',
                  'success'
                )
              }
            });
        });
    });
</script>

<!-------sweet alert Approve------->
<script type="text/javascript">
  $(function(){
      $(document).on('click','#approve',function(e){
          e.preventDefault();
          var link = $(this).attr("href");
          Swal.fire({
            title: 'Are you sure?',
            text: "approve this data!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
              Swal.fire(
                'approved!',
                'Your file has been approved successfully.',
                'success'
              )
            }
          });
      });
  });
</script>


<!------ShowImage---->
<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>

<!-----Select2-------->
<script>
  $(document).ready(function(){
     //Initialize Select2 Elements
     $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
      });
</script>


</body>
</html>
