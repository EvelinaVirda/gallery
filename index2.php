<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<head>
	<title></title>
	<style type="text/css">
		.listWrap li.active a {
			color: #f00;
		}

		.hoverimg li {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
		}
	</style>
</head>

<body>
	<section class="mt-5 pt-5">
		<div class="container-fluid">
			<div class="row">

				<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="listWrap">
						<ul>
							<?php
							$dir = "C:/Users/eveli/Pictures/pictures/";
							$filecount = 0;
							$files = glob($dir . "*");
							$filecount = count($files);
							echo $filecount;
							if (is_dir($dir)) {
								if ($dh = array(opendir($dir))) {
									$count = count($dh);
									echo $count;
									while (($file = readdir($dh[0])) !== false) {
							?>
										<li><a href="javascript:void(0);"><?php echo $file ?></a></li>
							<?php
									}
									closedir($dh[0]);
								}
							}

							?>
						</ul>
					</div>
				</div>

				<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="listWrap position-relative">
						<div class="hoverimg">
							<ul>
								<?php
								$dir = "C:/Users/eveli/Pictures/pictures/";
								if (is_dir($dir)) {
									if ($dh = array(opendir($dir))) {
										while (($file = readdir($dh[0])) !== false) {
											$image = file_get_contents('C:/Users/eveli/Pictures/pictures/' . $file);
											$image_codes = base64_encode($image);
								?>
											<li><img src="data:image/jpg;charset=utf-8;base64,<?php echo $image_codes; ?>"></li>
								<?php
										}
										closedir($dh[0]);
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$('.listWrap ul li:eq(0)').addClass('active'); // add class on page load to the first linnk
	$('.hoverimg ul li:eq(0)').show(); // show the first image li on page load
	$(".listWrap ul li").hover(
		function() {
			$('.listWrap ul li').removeClass('active'); // remove class all of the link li elements
			$('.hoverimg ul li').hide(); // hide all image li elements
			$(this).addClass('active'); // add the class to the current element
			var idx = $(this).index();
			$('.hoverimg ul li:eq(' + idx + ')').show(); // show the respective image li element
		}
	);
</script>

</html>