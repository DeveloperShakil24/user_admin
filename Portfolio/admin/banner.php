<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include "includes/head.php"; ?>
<!-- /head -->

<body>

	<!-- Main navbar -->

	<?php include "includes/mainNav.php"; ?>
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
					<?php include "includes/navigation.php"; ?>
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
							<li><a href="banner.php"><i class="icon-images3 position-left"></i>Banner</a></li>
							<li><a href="datatable_basic.html">List</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Banner List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
								<li style="margin-right: 10px;"><a href="bannerAdd.php" class="btn btn-primary add-new"> <i class=" icon-plus-circle2"> </i> Add New</a></li>
									<li><a data-action="collapse"></a></li>
									<li><a data-action="reload"></a></li>
									<li><a data-action="close"></a></li>
								</ul>
							</div>
						</div>

						<div class="panel-body">
							<table class="table datatable-basic table-bordered">
								<thead>
									<tr>
										<th width="5%">SL</th>
										<th width="20%">First Name</th>
										<th width="20%">Last Name</th>
										<th width="20%">Job Title</th>
										<th width="15%">DOB</th>
										<th width="10%">Status</th>
										<th width="10%" class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Marth</td>
										<td><a href="#">Enright</a></td>
										<td>Traffic Court Referee</td>
										<td>22 Jun 1972</td>
										<td><span class="label label-success">Active</span></td>
										<td class="text-center">
											<a href="bannerUpdate.php" class=""><i class=" icon-pencil7"></i></a>
											<a href="#" class=""><i class=" icon-trash-alt"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>


					</div>
					<!-- /basic datatable -->
					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2022. <a href="#">Developer Shakil</a> by <a href="#" target="_blank">MD Shakil Sikder</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<!-- Core JS files -->
	<?php include "includes/script.php"; ?>
	<!-- /Core JS files -->

</body>

</html>