<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title> InsaFilm | Nonton Gratis Tanpa Karcis</title>
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
<meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header-section-starts -->
	<div class="full">
			<div class="menu">
				<ul>
					<li><a href="index.php"><div class="hm"><i class="home1"></i><i class="home2"></i></div></a></li>
					<li><a class="active" href="videos.php"><div class="video"><i class="videos"></i><i class="videos1"></i></div></a></li>
					<li><a href="reviews.php"><div class="cat"><i class="watching"></i><i class="watching1"></i></div></a></li>
					<!-- <li><a href="404.php"><div class="bk"><i class="booking"></i><i class="booking1"></i></div></a></li> -->
					<li><a href="contact.php"><div class="cnt"><i class="contact"></i><i class="contact1"></i></div></a></li>
				</ul>
			</div>
		<div class="main">
		<div class="video-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img height="55px" src="images/logo3.png" alt="" /></a>
					<p>Nonton Gratis <br>Tanpa Karcis</p>
				</div>
				<div class="search v-search">
					<form>
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="right-content">
				<div class="right-content-heading">
					<div class="right-content-heading-left">
						<h3 class="head">KOLEKSI VIDEO TERBARU</h3>
					</div>
				</div>
				<!-- pop-up-box --> 
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
		
			<?php 
        include '../admin/koneksi.php';
			$query = mysqli_query($koneksi,"SELECT * FROM film");
		while ($data = mysqli_fetch_array($query)) {
			?>
			<div class="content-grids">
					<div class="content-grid ">
						<a class="play-icon popup-with-zoom-anim" href="single.php?id=<?php echo $data['id_film'] ?>"><img src="../admin/foto/<?php echo $data['photo_film']; ?>" title="allbum-name" /></a> 
						<h3> <b><?php echo $data['name_film']; ?></b></h3> 
						<ul>
							<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>
						</ul>
						<!-- <a href="single.php?id=<?php echo $data['id_film'] ?>" class="button play-icon popup-with-zoom-anim" >Watch now</a> -->
						<a href="single.php?id=<?php echo $data['id_film'] ?>" class="button play-icon text-center" >Lihat Lebih banyak</a>
					</div>

					<div id="small-dialog" class="mfp-hide">
						<iframe  src="<?php echo $data['link_film']; ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<?php } ?>
					<div class="clearfix"> </div>
					<!---start-pagenation----->
					<div class="pagenation">
						<ul>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
					<!---End-pagenation----->
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>	<br>
	<div class="footer ">
	    <h6>Disclaimer : </h6>
		<p class="claim">InsaFilm adalah layanan streaming yang menawarkan berbagai acara TV pemenang penghargaan, film, anime, dokumenter, dan banyak lagi di ribuan perangkat yang terhubung ke Internet.</p>
		<a href="indrasaepudin212@mail.com">indrasaepudin212@mail.com</a>
		<div class="copyright">
			<p>  &copy; 2022  <a href="#">  InsaFilm|IndraSaepudin</a></p>
		</div>
	</div>	
	</div>
	<div class="clearfix"></div>
	</div>
</body>
</html>