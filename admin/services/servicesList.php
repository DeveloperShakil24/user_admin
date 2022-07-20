<!DOCTYPE html>
<html lang="en">

<?php
// die($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
if (basename(__DIR__) != 'admin') {
	$baseUrl = '../';
	$isInternal = true;
} else {
	$baseUrl = '';
	$isInternal = false;
}
?>

<!-- head -->
<?php include "../includes/head.php"; ?>
<!-- /head -->
<?php require "../controller/dbConfig.php" ?>

<body>

	<!-- Main navbar -->

	<?php include "../includes/mainNav.php"; ?>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->

					<!-- Main navigation -->
					<?php $page = 'services';
					include "../includes/navigation.php"; ?>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="servicesList.php"><i class="icon-images3 position-left"></i>Services</a></li>
							<li><a href="datatable_basic.html">List</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area Left Design  Start-->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Services List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li style="margin-right: 10px;"><a href="servicesAdd.php" class="btn btn-primary add-new"> <i class=" icon-plus-circle2"> </i> Add New</a></li>
									<li><a data-action="collapse"></a></li>
									<li><a data-action="reload"></a></li>
									<li><a data-action="close"></a></li>
								</ul>
							</div>
						</div>

						<!-- Left Design Start -->
						<div class="panel-body">

							<?php
							if (isset($_GET['msg'])) {
							?>
								<div class="alert alert-success no-border mt-5">
									<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
									<span class="text-semibold"></span> <?php echo $_GET['msg']; ?>
								</div>

							<?php } ?>

							<table class="table datatable-basic table-bordered table-hover">
								<thead>
									<tr>
										<th width="5%">SL</th>
										<th width="25%">Service Name</th>
										<th width="35%">Icon Name</th>
										<th width="25%">Services Detals</th>
										<th width="10%" class="text-center">Actions</th>
										<th></th>
									</tr>
								</thead>
								<tbody>

									<?php
									$selectQry = "SELECT * FROM services WHERE design_status=2";
									$servicesList = mysqli_query($dbCon, $selectQry);

									foreach ($servicesList as $key => $services) {

									?>
										<tr>
											<td><?php echo ++$key; ?></td>
											<td><?php echo $services['service_name']; ?></td>
											<td><?php echo $services['services_detals']; ?></td>
											<td><?php echo $services['icon_name']; ?></td>
											<td class="text-center">
												<a href="servicesUpdate.php?services_id=<?php echo $services['id']; ?>" class=""><i class=" icon-pencil7"></i></a>
												<a href="servicesDelete.php?services_id=<?php echo $services['id']; ?>" class=""><i class=" icon-trash-alt"></i></a>
											</td>
											<td></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- Left Design End -->				

					</div>
					<!-- /basic datatable -->
					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2022. <a href="#">Developer Shakil</a> by <a href="#" target="_blank">MD Shakil Sikder</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area Left Design  End-->

				<!-- Content area Left Design  Start-->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Services List Right</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li style="margin-right: 10px;"><a href="servicesAdd.php" class="btn btn-primary add-new"> <i class=" icon-plus-circle2"> </i> Add New</a></li>
									<li><a data-action="collapse"></a></li>
									<li><a data-action="reload"></a></li>
									<li><a data-action="close"></a></li>
								</ul>
							</div>
						</div>

						<!-- Right Design Start -->
						<div class="panel-body">

							<?php
							if (isset($_GET['msg'])) {
							?>
								<div class="alert alert-success no-border mt-5">
									<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
									<span class="text-semibold"></span> <?php echo $_GET['msg']; ?>
								</div>

							<?php } ?>

							<table class="table datatable-basic table-bordered table-hover">
								<thead>
									<tr>
										<th width="5%">SL</th>
										<th width="25%">Service Name</th>
										<th width="35%">Icon Name</th>
										<th width="25%">Services Detals</th>
										<th width="10%" class="text-center">Actions</th>
										<th></th>
									</tr>
								</thead>
								<tbody>

									<?php
									$selectQry = "SELECT * FROM services WHERE design_status=1";
									$servicesList = mysqli_query($dbCon, $selectQry);

									foreach ($servicesList as $key => $services) {

									?>
										<tr>
											<td><?php echo ++$key; ?></td>
											<td><?php echo $services['service_name']; ?></td>
											<td><?php echo $services['services_detals']; ?></td>
											<td><?php echo $services['icon_name']; ?></td>
											<td class="text-center">
												<a href="servicesUpdate.php?services_id=<?php echo $services['id']; ?>" class=""><i class=" icon-pencil7"></i></a>
												<a href="servicesDelete.php?services_id=<?php echo $services['id']; ?>" class=""><i class=" icon-trash-alt"></i></a>
											</td>
											<td></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- Right Design End -->				

					</div>
					<!-- /basic datatable -->
					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2022. <a href="#">Developer Shakil</a> by <a href="#" target="_blank">MD Shakil Sikder</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area Left Design  End-->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<!-- Core JS files -->
	<?php include "../includes/script.php"; ?>
	<!-- /Core JS files -->

</body>

</html>