<?php 
$PhoneNumber=$_GET['PhoneNumber'];
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/User01.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>PlantLife Community - User Page</title>
</head>

<body>
	<?php 
	session_start(); // 启动会话
	include '../WebContent/navbar.php'; // 引入导航栏
	?>
    <!-- End navbar -->

	<!-- User Banner -->
	<div class="banner">
	<div class="user-back"><img src="../images/activitiy_05.jpg"></div>
			<div class="user">
				<div class="user-img"><img src="../images/icon_01.jpg" ></div> 
				<div class="user-text">
					<div><h3>Elisabeth Marshall</h3><i class="iconfont icon-v"></i><span>+Fol</span><span>...</span></div>
					<p>Following 1<span>|</span>Followers 7745</p>
				</div>
			</div>
	</div>
    
	<!-- User Navigation-->
	<div class="user-nav">
			<ul>
				<li><a href="">Post 15</a></li>
				<li><a href="">album</a></li>
				<li><a href="">collect</a></li>
				<li><a href="">profolio</a></li>
				<li><a href="">honor</a></li>
			</ul>
			<div class="nav-options">
				<span>all tags<i class="iconfont icon-xia"></i></span>
				<span>all years<i class="iconfont icon-xia"></i></span>
			</div>
		</div>
	
	<!-- Center Bar -->
	<div class="centerbox">
			<div class="container">
				<div class="centerbox-nav">
					<ul>
						<li><a href="#">all</a></li>
						<li><a href="#">picture</a></li>
						<li><a href="#">blog post</a></li>
					</ul>
					<form action="#">
						<input type="text" placeholder="Search for works">
						<i class="iconfont icon-btn_search"></i>
					</form>
				</div>
				<div class="opus">
					<ul>
						<li>
							<a href="#">
								<img src="../images/user_06.jpg" alt="">
								<div>
									<div class="opus-time">April 09, 2023</div>
									<h3>New Seedlings</h3>
									<span class="opus-biao">new life</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_01.jpg" alt="">
								<div>
									<div class="opus-time">March 20, 2023</div>
									<h3>Growing Succulents</h3>
									<span class="opus-biao">Flower Shape</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_08.jpeg" alt="">
								<div>
									<div class="opus-time">March 02, 2023</div>
									<h3>Saint Laurent</h3>
									<span class="opus-biao">winter colors</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_03.jpg" alt="">
								<div>
									<div class="opus-time">Febuary 15, 2023</div>
									<h3>Succulents Grow Up</h3>
									<span class="opus-biao">Continue</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_04.jpg" alt="">
								<div>
									<div class="opus-time">January 23, 2023</div>
									<h3>Succulents</h3>
									<span class="opus-biao">QQ Plants</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_05.jpg" alt="">
								<div>
									<div class="opus-time">January 15, 2023</div>
									<h3>Plant with Children</h3>
									<span class="opus-biao">DIY</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_14.jpg" alt="">
								<div>
									<div class="opus-time">January 1, 2023</div>
									<h3>Flower New Year</h3>
									<span class="opus-biao">first day of 2023</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_15.jpg" alt="">
								<div>
									<div class="opus-time">December 31, 2022</div>
									<h3>Styles of 2023</h3>
									<span class="opus-biao">decoration 2023</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_16.jpg" alt="">
								<div>
									<div class="opus-time">December 31, 2022</div>
									<h3>Ready for New Year</h3>
									<span class="opus-biao">decoration 2023</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_20.jpg" alt="">
								<div>
									<div class="opus-time">December 25, 2022</div>
									<h3>Colorful Garden</h3>
									<span class="opus-biao">happy mood</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_13.jpg" alt="">
								<div>
									<div class="opus-time">December 13, 2022</div>
									<h3>Hot Flower</h3>
									<span class="opus-biao">red with elegant</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/user_19.jpg" alt="">
								<div>
									<div class="opus-time">December 07, 2022</div>
									<h3>Move Plants</h3>
									<span class="opus-biao">Lovely Weekend</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/product01.jpg" alt="">
								<div>
									<div class="opus-time">November 23, 2022</div>
									<h3>Series of Green</h3>
									<span class="opus-biao">desk decoration</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/product02.jpg" alt="">
								<div>
									<div class="opus-time">November 23, 2022</div>
									<h3>Series of Green</h3>
									<span class="opus-biao">desk decoration</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../images/product03.jpg" alt="">
								<div>
									<div class="opus-time">November 23, 2022</div>
									<h3>Series of Green</h3>
									<span class="opus-biao">desk decoration</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
	</div>

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
