<!DOCTYPE html>
<html>
<head>
<!-- <meta http-equiv="refresh" content="0;url=pages/index.html"> -->
<title>Miss Universe Exam Corsanes</title>
<!-- <script language="javascript">
    window.location.href = "pages/index.html"
</script> -->
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <style> html,body {font-size: 12.5px !important;} </style>

	<!-- RELEASE THE KRAKEN -->
	<?php
		require('classes/core.php'); // releasing the kraken
		$core = new Core();
	?>

	<div id="wrapper">
		<!-- LOAD PAGES -->
		<?php
			require('header.php');
		?>
		<div id="page-wrapper">
			<!-- <h1><?php $a = new Core(); echo $a->testMe(); ?></h1> -->
			<!-- <h1><?php echo rand(10000, 99999); ?></h1> -->
			<!-- <div class="row">
                <div class="col-lg-12">
                    <h4>DB Connection: <?php $a = new Core(); echo ($a->db_connection==true?'Working':'Not Working'); ?></h4>
                </div>
            </div> -->
			<?php
				$sub = (isset($_GET['s']) ? $_GET['s'] : NULL);
				$page = (isset($_GET['p']) ? $_GET['p'] : NULL);
				require($sub . (!empty($sub) ? '/' : NULL) . (!empty($page) ? $page : 'home') . '.php' );
			?>
		</div>
	</div>

	<!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('table.dt').DataTable({
            responsive: true
        });
    });
    </script>

</body>
</html>
