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
							<li><a href="massageList.php"><i class="icon-images3 position-left"></i>Massage</a></li>
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
							<h5 class="panel-title">Massage Update</h5>
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
							$massage_id = $_GET['massages_id'];
							$getSingelDataQry = "SELECT * FROM contact_massages WHERE id={$massage_id}";
							$getResult = mysqli_query($dbCon, $getSingelDataQry);
							?>

							<form class="form-horizontal mt-10" action="../controller/massagesController.php" method="post">
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
									if(!empty($getResult)){
									foreach ($getResult as $key => $massage) {

									?>
										<input type="hidden" class="form-control" name="massages_id" value="<?php echo $massage['id'] ?>">

										<div class="form-group">
											<label class="control-label col-lg-2" for="name">Name</label>
											<div class="col-lg-10">
												<input type="text" id="name" class="form-control" name="name" required value="<?php echo $massage['name'] ?>">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-lg-2" for="email">Email</label>
											<div class="col-lg-10">
												<input type="text" id="email" class="form-control" name="email" required value="<?php echo $massage['email'] ?>">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-lg-2" for="subject">Subject</label>
											<div class="col-lg-10">
												<input type="text" id="subject" class="form-control" name="subject" required value="<?php echo $massage['subject'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-2" for="massage">Massage</label>
											<div class="col-lg-10">
												<textarea rows="5" cols="5" id="massage" class="form-control" placeholder="Default textarea" name="massage" required><?php echo $massage['massage'] ?></textarea>
											</div>
										</div>

									<?php } }?>

								</fieldset>
								<div class="text-right">
									<button type="submit" name="updateMassage" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
									<a href="massageList.php" class="btn btn-default">Go to Massage<i class=" icon-arrow-left13 position-left"> </i></a>
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