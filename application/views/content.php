<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/codeigniter12/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/codeigniter12/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="/codeigniter12/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="/codeigniter12/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="/codeigniter12/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/codeigniter12/css/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/codeigniter12/css/custom.css">
	 <link rel="stylesheet" href="/codeigniter12/vendor/bootstrap/css/c3.min.css">
	<link rel="stylesheet" href="/codeigniter12/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/codeigniter12/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/codeigniter12/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body>
    <?php $this->load->view('sidebar.html')?>
    <?php $this->load->view('header.html')?>
    <?php $this->load->view($contents)?>
     
    <script src="/codeigniter12/vendor/jquery/jquery.min.js"></script>
    <script src="/codeigniter12/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	 <script src="https://d3js.org/d3.v5.min.js" charset="utf-8"></script>
	  <script src="/codeigniter12/vendor/bootstrap/js/c3.min.js"></script>
	<script src="/codeigniter12/datatables/jquery.dataTables.min.js"></script>
    <script src="/codeigniter12/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/codeigniter12/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/codeigniter12/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/codeigniter12/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="/codeigniter12/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/codeigniter12/vendor/chart.js/Chart.min.js"></script>
    <script src="/codeigniter12/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/codeigniter12/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/codeigniter12/js/charts-home.js"></script>
    <script src="/codeigniter12/js/home-premium.js"> </script>
    <script src="/codeigniter12/js/front.js"></script>
	<script>
  $(function () {
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
  });
</script>
  </body>
</html>