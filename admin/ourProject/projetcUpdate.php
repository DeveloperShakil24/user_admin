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
					<?php include "../includes/navigation.php"; ?>
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
							<li><a href="projetcList.php"><i class="icon-images3 position-left"></i>Projetc</a></li>
							<li><a href="datatable_basic.html">Update</a></li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Projetc Update</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<!-- <li><a data-action="collapse"></a></li>
									<li><a data-action="reload"></a></li>
									<li><a data-action="close"></a></li> -->
								</ul>
							</div>
						</div>

						<div class="panel-body">

							<?php
							require "../controller/dbConfig.php";

							$projetc_id = $_GET['projetc_id'];
							$getSingelDataQry = "SELECT * FROM our_project WHERE id={$projetc_id}";
							$getResult = mysqli_query($dbCon, $getSingelDataQry);

							?>

							<form class="form-horizontal mt-10" action="../controller/ProjetcController.php" method="post">
								<fieldset class="content-group">
									<?php
									if (isset($_GET['msg'])) {
									?>
										<div class="alert alert-success no-border mt-5">
											<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
											<span class="text-semibold"></span> <?php echo $_GET['msg']; ?>
										</div>

									<?php } ?>

									<?php
									if (!empty($getResult)) {
										foreach ($getResult as $key => $projetc) {

									?>
											<input type="hidden" class="form-control" name="projetc_id" value="<?php echo $projetc['id'] ?>">
											<?php
											require "../controller/dbConfig.php";
											$dropdowonSelectQry = "SELECT * FROM categories WHERE active_status=1";
											$categoryList = mysqli_query($dbCon, $dropdowonSelectQry);
											?>
											<div class="form-group">
												<label class="control-label col-lg-2" for="category_id">Category</label>
												<div class="col-lg-10">
													<select name="category_id" class="form-control" id="category_id">
														<option value="">Select Category</option>

														<?php
														if (!empty($categoryList)) {
															foreach ($categoryList as $category) {
														?>
															<option value="<?php echo $category['id']; ?>"> <?php echo $category['category_name']; ?> </option>
														<?php }
														} ?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-lg-2" for="sub_title">Project Name</label>
												<div class="col-lg-10">
													<input type="text" id="sub_title" class="form-control" name="project_name" required value="<?php echo $projetc['project_name'] ?>">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-lg-2" for="details">Project Link</label>
												<div class="col-lg-10">
													<textarea rows="5" cols="5" id="details" class="form-control" placeholder="Default textarea" name="project_link" required><?php echo $projetc['project_link'] ?></textarea>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-lg-2" for="image">Project Thumb</label>
												<div class="col-lg-10">
													<input type="file" id="image" class="form-control" name="image">
												</div>
											</div>

									<?php }
									} ?>

								</fieldset>
								<div class="text-right">
									<button type="submit" name="updateProjetc" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
									<a href="projetcList.php" class="btn btn-default">Go to Projetc <i class=" icon-arrow-left13 position-left"> </i></a>
								</div>

							</form>

						</div>
						<!-- /basic examples -->
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
	<?php include "../includes/script.php"; ?>
	<!-- /Core JS files -->

</body>

</html>