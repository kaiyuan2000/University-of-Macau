<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/UserPage.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>Pet Home - User</title>
</head>

<body>
    <?php 
	session_start(); // 启动会话
	include '../WebContent/navbar.php'; // 引入导航栏
	?>
    <!-- End navbar -->
	
	<!-- user section -->
	<section id="user">
		<div class="container">
			<h2 class="section-title">User List</h2>
			<div class="content">
				<div class="sort">
					<a href="#">Popular User</a>
					<a href="#">Potential Newcomer</a>
				</div>
				<div class="col">
					<div class="row">
						<div class="icon">
							<img src="../images/icon_01.jpg" alt="icon_01">
							<button class="add"><i class="fa fa-user-plus"></i></button>
						</div>
						<div class="detail">
							<h4><a href="../WebContent/profile.html">Elisabeth Marshall</a></h4>
							<div class="state">
								<p>Followers 7745&ensp;</p>
								<p><i class="fa fa-location-dot"></i>England</p>
							</div>
							<h5>Succulent experts</h5>
						</div>
						<div class="img">
							<div class="size">
								<img src="../images/user_01.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_02.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_03.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_04.jpg" alt="user01">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="icon">
							<img src="../images/icon_02.jpg" alt="icon_02">
							<button class="add"><i class="fa fa-user-plus"></i></button>
						</div>
						<div class="detail">
							<h4><a href="#">Terence Lambert</a></h4>
							<div class="state">
								<p>Followers 8445&ensp;</p>
								<p><i class="fa fa-location-dot"></i>Canada</p>
							</div>
							<h5>Experts in indoor planting</h5>
						</div>
						<div class="img">
							<div class="size">
								<img src="../images/user_05.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_06.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_07.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_08.jpeg" alt="user01">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="icon">
							<img src="../images/icon_03.jpg" alt="icon_03">
							<button class="add"><i class="fa fa-user-plus"></i></button>
						</div>
						<div class="detail">
							<h4><a href="#">Jennifer Garcia</a></h4>
							<div class="state">
								<p>Followers 6889&ensp;</p>
								<p><i class="fa fa-location-dot"></i>England</p>
							</div>
							<h5>Experts in cultivating mixed roses</h5>
						</div>
						<div class="img">
							<div class="size">
								<img src="../images/user_09.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_10.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_11.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_12.jpg" alt="user01">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="icon">
							<img src="../images/icon_04.jpg" alt="icon_01">
							<button class="add"><i class="fa fa-user-plus"></i></button>
						</div>
						<div class="detail">
							<h4><a href="#">Aurelia Livia</a></h4>
							<div class="state">
								<p>Followers 5551&ensp;</p>
								<p><i class="fa fa-location-dot"></i>U.S.A</p>
							</div>
							<h5>Floral Designer</h5>
						</div>
						<div class="img">
							<div class="size">
								<img src="../images/user_13.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_14.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_15.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_16.jpg" alt="user01">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="icon">
							<img src="../images/icon_05.jpg" alt="icon_01">
							<button class="add"><i class="fa fa-user-plus"></i></button>
						</div>
						<div class="detail">
							<h4><a href="#">Sharif Thomas</a></h4>
							<div class="state">
								<p>Followers 3468&ensp;</p>
								<p><i class="fa fa-location-dot"></i>Brazil</p>
							</div>
							<h5>Gardeners</h5>
						</div>
						<div class="img">
							<div class="size">
								<img src="../images/user_17.jpeg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_18.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_19.jpg" alt="user01">
							</div>
							<div class="size">
								<img src="../images/user_20.jpg" alt="user01">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End user section -->

	<!-- footer section -->
	<section id="footer">
		<div class="container">
			<footer>
				<div class="col-1">
					<h3>Download Our App</h3>
					<p>Downlad App for Android and ios mobile phone.</p>
					<div class="app-logo">
						<img src="../images/play-store.png" alt="play-store">
						<img src="../images/app-store.png" alt="app-store">
					</div>
				</div>
				<div class="col-2">
					<img src="../images/logo.jpg" alt="logo">
					<p>Our Puropse Is To Sustainably Make the Pleasure and Benefits of Plants Accessible to Many</p>
				</div>
				<div class="col-3">
					<h3>Useful Links</h3>
					<ul>
						<li>Coupons</li>
						<li>Blog Post</li>
						<li>Return Policy</li>
						<li>Join Affiliate</li>
					</ul>
				</div>
				<div class="col-4">
					<h3>Follow us</h3>
					<ul>
						<li>Facebook</li>
						<li>Twitter</li>
						<li>Instagram</li>
						<li>YouTube</li>
					</ul>
				</div>
			</footer>
			<div class="name">
				<hr>
				<p>CISC3003: Group Project Team 01</p>
			</div>
		</div>	
		</div>
	</section>
	<!-- End footer section -->
</body>
</html>
