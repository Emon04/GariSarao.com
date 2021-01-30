<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/admin')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/admin')}}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{asset('/admin')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/admin')}}/ckeditor/sample/css/samples.css">
    <link rel="stylesheet" href="{{asset('/admin')}}/ckeditor/sample/toolbarconfigurator/lib/codemirror/neo.css">
    <link href="<?php echo asset('assets/addchat/css/addchat.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">
<div id="addchat_app"
     data-baseurl="<?php echo url('') ?>"
     data-csrfname="<?php echo 'X-CSRF-Token' ?>"
     data-csrftoken="<?php echo csrf_token() ?>"
></div>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('autoMobileWorkshop.includes.sideber')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
    @include('autoMobileWorkshop.includes.navber')
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('body')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
    @include('autoMobileWorkshop.includes.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/admin')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('/admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/admin')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/admin')}}/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="{{asset('/admin')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/admin')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->

<script src="{{asset('/admin')}}/vendor/chart.js/Chart.min.js"></script>


<script src="{{asset('/admin')}}/js/demo/chart-area-demo.js"></script>
<script src="{{asset('/admin')}}/js/demo/chart-pie-demo.js"></script>

<script src="{{asset('/admin')}}/js/demo/datatables-demo.js"></script>
<script src="{{asset('/admin')}}/ckeditor/ckeditor.js"></script>
<script src="{{asset('/admin')}}/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>
<script type="module" src="<?php echo asset('assets/addchat/js/addchat.min.js') ?>"></script>
<!-- Fallback support for Older browsers -->
<script nomodule src="<?php echo asset('assets/addchat/js/addchat-legacy.min.js') ?>"></script>
</body>

</html>

