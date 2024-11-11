<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/PhotoCompetitionPage.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>PlantLife Community - Activity - Photo Competition</title>
</head>

<body>
	<?php 
	session_start(); // 启动会话
	include '../WebContent/navbar.php'; // 引入导航栏
	?>
    <!-- End navbar -->
	
	<!-- sub hero section -->
	<section id="sub_hero">
		<div class="container">
			<div class="cover"> </div>
			<div class="content">
				<div class="detail">
					<div class="detail-left">
						<span>31 days left</span>
					</div>
					<div class="detail-right">
						<span><i class="fa fa-comment-dots">1991</i></span>
						<span><i class="fa fa-eye">90030</i></span>
					</div>
				</div>
				<h1>Photo Competition | Capture the plants beside you </h1>
				<p>The PlantLife Photo Contest is an exciting activity that invites members of the PlantLife community to showcase their photography skills and share their love of plants with others. The contest is open to all members, regardless of their level of experience or the type of camera they use.</p>
				<div class="btn">
					<a href="#" type="button" class="more">Join Now</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End sub hero section -->
	
	<!-- activity content section -->
	<section id="activity_content">
		<div class="container">
			<div class="row">
				<h2 class="title">Theme</h2>
				<p>Each contest has a specific theme related to plants or gardening. Past themes have included "Flower Power," "Budding Beginnings," and "Green Thumb."</p>
				<p>This time the theme is <span><i class="fa fa-quote-left"></i> Capture the plants beside you <i class="fa fa-quote-right"></i></span></p>
				<div class="col">
					<img src="../images/product01.jpg" alt="01">
					<img src="../images/product02.jpg" alt="02">
					<img src="../images/product03.jpg" alt="03">
				</div>
			</div>
			<div class="row">
				<h2 class="title">Submission Guidelines</h2>
				<p>Participants are required to submit their best photo(s) that fit the theme of the contest. The photos should be original and taken by the participant, and must not contain any watermarks or logos. Participants may submit multiple photos, but only one entry per participant will be considered. </p>
			</div>
			<div class="row">
				<h2 class="title">Judging Criteria</h2>
				<p>The photos will be judged based on their creativity, composition, and adherence to the theme of the contest. The judges may also consider factors such as technical proficiency and overall visual impact. The judging period typically lasts for one to two weeks after the submission deadline.</p>
			</div>
			<div class="row">
				<h2 class="title">Prizes</h2>
				<p>The top three winners will receive prizes such as PlantLife merchandise, gift cards, or plant-related products. In addition, the winning photos will be featured on the PlantLife website and social media channels, giving the winners additional exposure and recognition. The winners are typically announced one to two weeks after the judging period ends.</p>
			</div>
			<div class="row">
				<h2 class="title">Timeline</h2>
				<ul>
					<li>Week 1: Announce the theme of the contest and begin accepting submissions.</li>
					<li>Week 2-4: Promote the contest heavily on the PlantLife website, social media channels, and email newsletter to encourage participation.</li>
					<li>Week 5-6: Close the submission period and begin the judging process.</li>
					<li>Week 7: Announce the winners and promote their photos on the PlantLife website and social media channels.</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- End activity content section -->

	<!-- rank section -->
	<section id="rank">
		<div class="container">
			<h2 class="section-title">Ranking</h2>
			<div class="content">
				<div class="left">
					<div class="rank1">
						<div class="icon">
							<img src="../images/icon_01.jpg" alt="icon_01">
						</div>
						<div class="detail">
							<h4>Elisabeth Marshall</h4>
							<p>219 Post | 7745 Fans</p>
						</div>
						<div class="ordered">
							<img src="../images/one.png" alt="one">
						</div>
					</div>
					<div class="rank2">
						<div class="icon">
							<img src="../images/icon_02.jpg" alt="icon_02">
						</div>
						<div class="detail">
							<h4>Terence Lambert</h4>
							<p>219 Post | 7745 Fans</p>
						</div>
						<div class="ordered">
							<img src="../images/two.png" alt="two">
						</div>
					</div>
					<div class="rank3">
						<div class="icon">
							<img src="../images/icon_03.jpg" alt="icon_03">
						</div>
						<div class="detail">
							<h4>Jennifer Garcia </h4>
							<p>125 Post | 6889 Fans</p>
						</div>
						<div class="ordered">
							<img src="../images/three.png" alt="three">
						</div>
					</div>
				</div>	
			</div>
		</div>
	</section>
	<!-- End rank section -->
	
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
	</section>
	<!-- End footer section -->
</body>
</html>
