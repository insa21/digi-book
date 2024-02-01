<!DOCTYPE html>
<html>

<head>
	<title> Insabuku | Nonton Gratis Tanpa Karcis</title>
	<!-- icon -->
	<link rel="icon" href="images/logo3.png" type="image/png">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<script src="js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--webfont-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- header-section-starts -->
	<div class="full">
		<div class="menu">
			<ul>
				<li><a href="index.php">
						<div class="hm"><i class="home1"></i><i class="home2"></i></div>
					</a></li>
				<li><a class="active" href="videos.php">
						<div class="video"><i class="videos"></i><i class="videos1"></i></div>
					</a></li>
				<li><a href="reviews.php">
						<div class="cat"><i class="watching"></i><i class="watching1"></i></div>
					</a></li>
				<!-- <li><a href="404.php"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li> -->
				<li><a href="contact.php">
						<div class="cnt"><i class="contact"></i><i class="contact1"></i></div>
					</a></li>
			</ul>
		</div>
		<div class="main">
			<div class="single-content">
				<div class="top-header span_top">
					<div class="logo">
						<a href="index.html"><img height="55px" src="images/logo3.png" alt="" /></a>
						<p>Nonton Gratis <br>Tanpa Karcis</p>
					</div>
					<div class="search v-search">
						<form>
							<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}" />
							<input type="submit" value="">
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="reviews-section">
					<h3 class="head">Ulasan buku</h3>
					<div class="col-md-9 reviews-grids">
						<?php
						include '../admin/koneksi.php';
						if (isset($_GET['id'])) {
							if ($_GET['id'] != "") {

								$id = $_GET['id'];

								$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE isbn='$id'");
								$data = mysqli_fetch_array($query);
							} else {
								header("location:index.php");
							}
						} else {
							header("location:index.php");
						}

						?>
						<div class="review">
							<div class="movie-pic">
								<a href="single.html"><img src="../admin/foto/<?php echo $data['photo']; ?>" alt="" /></a>
								<a class="button play-icon popup-with-zoom-anim text-center" href="javascript:void(0);" onclick="downloadBuku('<?php echo $data['link']; ?>')">Unduh Buku</a>
							</div>

							<script>
								function downloadBuku(link) {
									var a = document.createElement('a');
									a.href = "../admin/buku/" + link;
									a.download = "nama-file-buku.pdf"; // Ganti dengan nama file yang sesuai
									document.body.appendChild(a);
									a.click();
									document.body.removeChild(a);
								}
							</script>

							<div class="review-info">
								<a class="span" href="single.html"><?php echo $data['judul']; ?></a>
								<p class="dirctr"><a href=""><?php echo $data['penulis']; ?>, <?php echo $data['bahasa']; ?>, </a><?php echo $data['tanggal_terbit']; ?></p>
								<p class="info"><b>ISBN:</b>&nbsp;&nbsp;<?php echo $data['isbn']; ?></p>
								<p class="info"><b>JUDUL:</b>&nbsp;&nbsp;<?php echo $data['judul']; ?></p>
								<p class="info"><b>PENERBIT:</b>&nbsp;&nbsp;<?php echo $data['penerbit']; ?></p>
								<p class="info"><b>PENULIS:</b>&nbsp;&nbsp;<?php echo $data['penulis']; ?></p>
								<p class="info"><b>GENDRE:</b>&nbsp;&nbsp;<?php echo $data['gendre']; ?></p>
								<p class="info"><b>TANGGAL TERBIT:</b>&nbsp;&nbsp;<?php echo $data['tanggal_terbit']; ?></p>
								<p class="info"><b>HALAMAN:</b>&nbsp;&nbsp;<?php echo $data['jumlah_halaman']; ?></p>
								<p class="info"><b>BAHASA:</b>&nbsp;&nbsp;<?php echo $data['bahasa']; ?></p>
								<p class="info"><b>KATEGORI:</b>&nbsp;&nbsp;<?php echo $data['kategori']; ?></p>


							</div>
							<div id="small-dialog" class="mfp-hide">
								<embed src="<?php echo $data['link']; ?>" type="application/pdf" width="100%" height="600px" />
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="best-review">
							<h4>SYNOPSIS :</h4>
							<p><?php echo $data['synopsis']; ?></p>
							<p><span><?php echo $data['penulis']; ?></span> <?php echo $data['tanggal_terbit']; ?> at <?php echo $data['jumlah_halaman']; ?> AM </p>
						</div>
						<div class="story-review">
							<h4>Review Book :</h4>
							<iframe src="../admin/buku/<?php echo $data['link']; ?>" width="100%" height="600px" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
					<div class="col-md-3 side-bar">
						<div class="featured">
							<h3>Menampilkan buku Terbaru</h3>
							<ul>
								<?php
								include '../admin/koneksi.php';
								$query = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY isbn DESC LIMIT 9 ");
								while ($data = mysqli_fetch_array($query)) {
								?>
									<li>
										<a href="single.php?id=<?php echo $data['isbn'] ?>"><img src="../admin/foto/<?php echo $data['photo']; ?>" alt="" /></a>
										<p> <?= $data['judul'] ?> </p>
									</li>
								<?php } ?>
								<div class="clearfix"></div>
							</ul>
						</div>
						<div class="entertainment">
							<h3>Menampilkan buku Direkomendasikan</h3>
							<?php
							include '../admin/koneksi.php';
							$query = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY isbn DESC LIMIT 5");
							while ($data = mysqli_fetch_array($query)) {
							?>
								<ul>
									<li class="ent">
										<a href="single.php?id=<?php echo $data['isbn'] ?>"><img src="../admin/foto/<?php echo $data['photo']; ?>" alt="" /></a>
									</li>
									<li>
									<li><b> <?= $data['judul'] ?> </b>
										<p>
									<li class="">Tahun Terbit: <font color="yellow">★</font> <?php echo $data['tanggal_terbit']; ?></li>
									<li>Penulis : <?= $data['penulis']; ?></li>
									<li>Penerbit : <?= $data['penerbit']; ?></li>
									</li>
									<div class="clearfix"></div>
								</ul><?php } ?>
						</div>

					</div>

					<div class="clearfix"></div>
				</div>
			</div>
			<div class="review-slider">
				<ul id="flexiselDemo1">
					<li><img src="images/r1.jpg" alt="" /></li>
					<li><img src="images/r2.jpg" alt="" /></li>
					<li><img src="images/r3.jpg" alt="" /></li>
					<li><img src="images/r4.jpg" alt="" /></li>
					<li><img src="images/r5.jpg" alt="" /></li>
					<li><img src="images/r6.jpg" alt="" /></li>
				</ul>
				<script type="text/javascript">
					$(window).load(function() {

						$("#flexiselDemo1").flexisel({
							visibleItems: 6,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,
							pauseOnHover: false,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: {
								portrait: {
									changePoint: 480,
									visibleItems: 1
								},
								landscape: {
									changePoint: 640,
									visibleItems: 2
								},
								tablet: {
									changePoint: 768,
									visibleItems: 3
								}
							}
						});
					});
				</script>
				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
			</div>
			<div class="footer">
				<h6>Disclaimer : </h6>
				<p class="claim">Insabuku adalah layanan streaming yang menawarkan berbagai acara TV pemenang penghargaan, buku, anime, dokumenter, dan banyak lagi di ribuan perangkat yang terhubung ke Internet.</p>
				<a href="indrasaepudin212@mail.com">indrasaepudin212@mail.com</a>
				<div class="copyright">
					<p> &copy; 2022 <a href="#"> Insabuku|IndraSaepudin</a></p>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</body>

</html>
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
	});
</script>