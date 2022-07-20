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
							<li><a href="bannerList.php"><i class="icon-images3 position-left"></i>Banner</a></li>
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
							<h5 class="panel-title">Banner Update</h5>
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
							$banner_id = $_GET['banner_id'];
							$getSingelDataQry = "SELECT * FROM banners WHERE id={$banner_id}";
							$getResult = mysqli_query($dbCon, $getSingelDataQry);
							?>
							<!-- ?banner_id<?php //$banner_id; ?> -->
							<form class="form-horizontal mt-10" action="../controller/BannerController.php" method="post" enctype="multipart/form-data">
								<fieldset class="content-group">
									<?php
									if (isset($_GET['msg'])) {
									?>
										<div class="alert alert-success no-border mt-5">
											<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
											<span class="text-semibold">Success </span> <?php echo $_GET['msg']; ?>
										</div>

									<?php } ?>

									<?php
									foreach ($getResult as $key => $banner) {

									?>
										<input type="hidden" class="form-control" name="banner_id" value="<?php echo $banner['id'] ?>">

										<div class="form-group">
											<label class="control-label col-lg-2" for="title">Ttile</label>
											<div class="col-lg-10">
												<input type="text" id="title" class="form-control" name="title" required value="<?php echo $banner['title'] ?>">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-lg-2" for="sub_title">Sub Ttile</label>
											<div class="col-lg-10">
												<input type="text" id="sub_title" class="form-control" name="sub_title" required value="<?php echo $banner['sub_title'] ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-2" for="details">Details</label>
											<div class="col-lg-10">
												<textarea rows="5" cols="5" id="details" class="form-control" placeholder="Default textarea" name="details" required><?php echo $banner['details'] ?></textarea>
											</div>
										</div>
										
										<!-- <div class="form-group">
											<label class="control-label col-lg-2" for="image">Image</label>
											<div class="col-lg-10">
												<input type="file" id="image" class="form-control" name="image">
											</div>
										</div> -->

						                        <div class="form-group">
							                      <label class="col-lg-2 control-label text-semibold" for="image">Image</label>
							                      <div class="col-lg-10">
								                    <input type="file" name="image" id="image" class="file-input-extensions">
								                    <span class="help-block">Allow extensions: <code>jpg</code>, <code>png</code> and <code>jpeg</code> and Allow Size: <code>640 * 426</code> Only</span>
							                      </div>

										<!-- Image Uploade Start-->
										<div class="form-group">
										<label class="col-lg-3 control-label text-semibold" for="">Image</label>
										<div class="col-lg-6">
										<div class="file-preview">
											<div class="close fileinput-remove text-right">×</div>
											<div class="file-preview-thumbnails">
												<div class="file-preview-frame" id="preview-1656423988463-0">
													<img src="<?php echo '../uploads/bannerImage/'.$banner['image'] ?>" class="file-preview-image" title="" alt="" style="width:auto;height:160px;">
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="file-preview-status text-center text-success"></div>
											<div class="kv-fileinput-error file-error-message" style="display: none;"></div>
										</div>
										</div>
						                        </div>
										<!-- Image Uploade End-->

						                        </div>
						                        <!-- Image Uploade End-->

					<?php } ?>

					</fieldset>
					<div class="text-right mb-10 mr-10">
						<button type="submit" name="updateBanner" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
						<a href="bannerList.php" class="btn btn-default">Go to Banner <i class=" icon-arrow-left13 position-left"> </i></a>
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