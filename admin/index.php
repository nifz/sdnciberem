<?php
    require('../include/db.php');
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location: login.php');
    }
    if(!isset($_GET['url']))
    {
        header('location: ?url=dashboard');
    }
    $sql = mysqli_query($con, "SELECT name, data FROM dinamis");
    $arr = array();
    while($data = mysqli_fetch_assoc($sql))
    {
        $arr[] = $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
<?php include('include/tag.php'); ?>

<?php include('include/script.php'); ?>

	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			
<?php include('include/sidebar.php'); ?>

<?php include('include/routes.php'); ?>

			<!-- /.content-wrapper -->
			<footer class="main-footer">
				&copy; <?= date('Y') ?> All rights reserved.
			</footer>
		</div>
		<!-- ./wrapper -->

	</body>
</html>