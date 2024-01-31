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
		<div class="single-content">
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
			<div class="reviews-section">
				<h3 class="head">Ulasan Film</h3>
					<div class="col-md-9 reviews-grids">
<?php 
include '../admin/koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		$id = $_GET['id'];

		$query = mysqli_query($koneksi,"SELECT * FROM film WHERE id_film='$id'");
		$data = mysqli_fetch_array($query);

	}else{
		header("location:index.php");
	}
}else{
	header("location:index.php");
}

?>
						<div class="review">
							<div class="movie-pic">
								<a href="single.html"><img src="../admin/foto/<?php echo $data['photo_film']; ?>" alt="" /></a>
								<a class="button play-icon popup-with-zoom-anim text-center" href="#small-dialog">Watch now</a>
							</div>
							<div class="review-info">
								<a class="span" href="single.html"><?php echo $data['name_film']; ?></a>
								<p class="dirctr"><a href=""><?php echo $data['director_film']; ?>, <?php echo $data['country_film']; ?>, </a><?php echo $data['release_film']; ?></p>								
								<p class="ratingview">IMDB Rating: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font  color="yellow">★</font> <?php echo $data['imdb_film']; ?>/10</p><br><br>
								<p class="info">ACTORS: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data['actors_film']; ?></p>
								<p class="info">DIRECTION: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data['director_film']; ?></p>
								<p class="info">GENRE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['gendre_film']; ?></p>
								<p class="info">DURATION: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $data['duration_film']; ?> </p>
								<p class="info">PRODUCTION: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['production_film']; ?> </p>
								<p class="info">COUNTRY: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['country_film']; ?> </p>
								<p class="info">RESULATION: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['resulation_film']; ?> </p>
								<p class="info">QUALITY: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['quality_film']; ?> </p>
								<p class="info">RELEASE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['release_film']; ?> </p>
							</div>
					<div id="small-dialog" class="mfp-hide">
						<iframe  src="<?php echo $data['link_film']; ?>" frameborder="0" allowfullscreen></iframe>
					</div>
							<div class="clearfix"></div>
						</div>
					
						<!-- <div class="single">
							<h3>Lorem Ipsum IS A TENSE, TAUT, COMPELLING THRILLER</h3>
							<p>STORY:<i> Meera and Arjun drive down Lorem Ipsum - can they survive a highway from hell?</i></p>
						</div> -->
							<div class="best-review">
								<h4>SYNOPSIS :</h4>
								<p><?php echo $data['synopsis_film']; ?></p>
								<p><span><?php echo $data['director_film']; ?></span> <?php echo $data['release_film']; ?> at <?php echo $data['duration_film']; ?> AM </p>
							</div>
							<div class="story-review">
								<!-- <h4>Videos :</h4> -->
							<div class="video" id="video">
			          <iframe  src="<?php echo $data['link_film']; ?>" frameborder="0" allowfullscreen></iframe>
		                    </div>
							</div>
						
							<!-- comments-section-starts -->
	    <div class="comments-section">
	        <div class="comments-section-head">
				<div class="comments-section-head-text">
					<h3>25 Comments</h3>
				</div>
				<div class="clearfix"></div>
		    </div>
			<div class="comments-section-grids">
				<div class="comments-section-grid">
					<div class="col-md-2 comments-section-grid-image">
						<img src="images/eye-brow.jpg" class="img-responsive" alt="" />
					</div>
					<div class="col-md-10 comments-section-grid-text">
						<h4><a href="#">MARWA ELGENDY</a></h4>
						<label>5/4/2014 at 22:00   </label>
						<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound but because those who do not know how to pursue pleasure rationally encounter consequences.</p>
						<span><a href="#">Reply</a></span>
						<i class="rply-arrow"></i>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="comments-section-grid comments-section-middle-grid">
					<div class="col-md-2 comments-section-grid-image">
						<img src="images/beauty.jpg" class="img-responsive" alt="" />
					</div>
					<div class="col-md-10 comments-section-grid-text">
						<h4><a href="#">MARWA ELGENDY</a></h4>
						<label>5/4/2014 at 22:00   </label>
						<p>But I must explain to you how all this idea denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound but because those who do not know how to pursue pleasure rationally encounter consequences.</p>
						<span><a href="#">Reply</a></span>
						<i class="rply-arrow"></i>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="comments-section-grid">
					<div class="col-md-2 comments-section-grid-image">
						<img src="images/stylish.jpg" class="img-responsive" alt="" />
					</div>
					<div class="col-md-10 comments-section-grid-text">
						<h4><a href="#">MARWA ELGENDY</a></h4>
						<label>5/4/2014 at 22:00   </label>
						<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound but because those who do not know how to pursue pleasure rationally encounter consequences.</p>
						<span><a href="#">Reply</a></span>
						<i class="rply-arrow"></i>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
	    </div>
	  <!-- comments-section-ends -->
		  <div class="reply-section">
			  <div class="reply-section-head">
				  <div class="reply-section-head-text">
					  <h3>Leave Reply</h3>
				  </div>
			  </div> 
			<div class="blog-form">
			    <form>
					<input type="text" class="text" value="Enter Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Name';}">
					<input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
					<input type="text" class="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
					<textarea></textarea>
					<input type="button" value="SUBMIT COMMENT">
			    </form>
			 </div>
		  </div>
		  </div>
          <div class="col-md-3 side-bar">
						<div class="featured">
							<h3>Menampilkan Film Terbaru</h3>
				            	<ul>
		 <?php 
        include '../admin/koneksi.php';
			$query = mysqli_query($koneksi,"SELECT * FROM film ORDER BY id_film DESC LIMIT 9 ");
		while ($data = mysqli_fetch_array($query)) {
			?>
								<li>
									<a href="single.php?id=<?php echo $data['id_film'] ?>"><img src="../admin/foto/<?php echo $data['photo_film']; ?>" alt="" /></a>
									<p> <?= $data['name_film'] ?> </p>
								</li>	
								<div class="clearfix"> <?php } ?>
							 </div>
							</ul>
						</div>
						<div class="entertainment">
							<h3>Menampilkan Film Direkomendasikan</h3>
		 <?php 
        include '../admin/koneksi.php';
		$query = mysqli_query($koneksi,"SELECT * FROM film ORDER BY id_film DESC LIMIT 5");
		while ($data = mysqli_fetch_array($query)) {
			?>
							<ul>
								<li class="ent">
									<a href="single.php?id=<?php echo $data['id_film'] ?>"><img src="../admin/foto/<?php echo $data['photo_film']; ?>" alt="" /></a>
								</li>
								<li>
									<li><b> <?= $data['name_film'] ?> </b><p>
									<li class="">IMDB Rating: <font  color="yellow">★</font> <?php echo $data['imdb_film']; ?>/10</li>
									<li>Production : <?= $data['production_film']; ?></li>
									<li>Duration : <?= $data['duration_film']; ?></li>
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
			<li><img src="images/r1.jpg" alt=""/></li>
			<li><img src="images/r2.jpg" alt=""/></li>
			<li><img src="images/r3.jpg" alt=""/></li>
			<li><img src="images/r4.jpg" alt=""/></li>
			<li><img src="images/r5.jpg" alt=""/></li>
			<li><img src="images/r6.jpg" alt=""/></li>
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
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
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