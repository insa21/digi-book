<?php
// Database connection file
include '../admin/koneksi.php';

// Number of items per page
$itemsPerPage = 8;

// Get the total count of records
$resultCountQuery = mysqli_query($koneksi, "SELECT COUNT(*) FROM buku");

if ($resultCountQuery) {
	$resultCount = mysqli_fetch_row($resultCountQuery)[0];
} else {
	die(mysqli_error($koneksi));
}

// Calculate the total number of pages
$totalPages = ceil($resultCount / $itemsPerPage);

// Get the current page number from the URL, default to 1 if not set
$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Calculate the SQL LIMIT starting number for the results on the current page
$offset = ($currentPage - 1) * $itemsPerPage;

// Query to fetch the records for the current page
$query = mysqli_query($koneksi, "SELECT * FROM buku LIMIT $offset, $itemsPerPage");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>InsaFilm | Nonton Gratis Tanpa Karcis</title>

	<!-- Favicon -->
	<link rel="icon" href="images/logo3.png" type="image/png">

	<!-- Stylesheets -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<!-- Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
</head>

<body>
	<!-- Header Section -->
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
				<li><a href="contact.php">
						<div class="cnt"><i class="contact"></i><i class="contact1"></i></div>
					</a></li>
			</ul>
		</div>

		<!-- Main Content -->
		<div class="main">
			<div class="video-content">
				<!-- Top Header -->
				<div class="top-header span_top">
					<!-- Logo -->
					<div class="logo">
						<a href="index.html"><img height="55px" src="images/logo3.png" alt="" /></a>
						<p>Nonton Gratis <br>Tanpa Karcis</p>
					</div>
					<!-- Search Form -->
					<div class="search v-search">
						<form>
							<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}" />
							<input type="submit" value="">
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- Right Content -->
				<div class="right-content">
					<div class="right-content-heading">
						<div class="right-content-heading-left">
							<h3 class="head">KOLEKSI VIDEO TERBARU</h3>
						</div>
					</div>

					<!-- Pop-up Box Styles -->
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
					while ($data = mysqli_fetch_array($query)) {
						// Content Grids
						echo '<div class="content-grids">';
						echo '<div class="content-grid">';
						echo '<a class="play-icon popup-with-zoom-anim" href="single.php?id=' . $data['isbn'] . '"><img src="../admin/foto/' . $data['photo'] . '" title="album-name" /></a>';
						echo '<h3><b>' . $data['judul'] . '</b></h3>';
						echo '<ul>';
						echo '<li><a href="#"><img src="images/likes.png" title="image-name" /></a></li>';
						echo '<li><a href="#"><img src="images/views.png" title="image-name" /></a></li>';
						echo '<li><a href="#"><img src="images/link.png" title="image-name" /></a></li>';
						echo '</ul>';
						echo '<a href="single.php?id=' . $data['isbn'] . '" class="button play-icon text-center">Lihat Lebih Banyak</a>';
						echo '</div>';
						echo '<div id="small-dialog" class="mfp-hide">';
						// echo '<iframe src="' . $data['link_film'] . '" frameborder="0" allowfullscreen></iframe>';
						echo '</div>';
						echo '</div>';
					}
					?>

					<!-- Pagination -->
					<div class="clearfix"></div>
					<div class="pagenation">
						<ul>
							<?php
							for ($i = 1; $i <= $totalPages; $i++) {
								if ($i == $currentPage) {
									echo "<li><a href='videos.php?page=$i' class='active'>$i</a></li>";
								} else {
									echo "<li><a href='videos.php?page=$i'>$i</a></li>";
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>

			<!-- Footer -->
			<div class="footer">
				<h6>Disclaimer : </h6>
				<p class="claim">InsaFilm adalah layanan streaming yang menawarkan berbagai acara TV pemenang penghargaan, film, anime, dokumenter, dan banyak lagi di ribuan perangkat yang terhubung ke Internet.</p>
				<a href="indrasaepudin212@mail.com">indrasaepudin212@mail.com</a>
				<div class="copyright">
					<p>&copy; 2022 <a href="#">InsaFilm|IndraSaepudin</a></p>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</body>

</html>