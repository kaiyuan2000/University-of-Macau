<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/AdoptionPage.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>Pet Home- Forum</title>
</head>

<body>
	<?php 
	session_start(); // 启动会话
	include '../WebContent/navbar.php'; // 引入导航栏
	?>
    <!-- End navbar -->
	
	<!-- sub hero section -->
	 <div id="slideshow">
        <div class="slide-wrapper">
            <div class="slide">
                <h1 class="slide-number">
                    GeeksforGeeks
                </h1>
            </div>
            <div class="slide">

            </div>
            <div class="slide">

            </div>
            <div class="slide">

            </div>
        </div>
    </div>
	<!-- End sub hero section -->	
	
	<!-- topic section -->
	
	<!-- End sub topic section -->	
	
	<!-- forum section -->
	<section id="forum">
		<div class="container">
			<div class="left">
			<?php 
				$select_db = mysqli_connect("localhost", "root", "", "webproject")or die("Fail to connect the mysql server <br>");
				$sql_query = "SELECT * FROM post ORDER BY image DESC;";
				$result = mysqli_query($select_db, $sql_query);
				while($row=mysqli_fetch_row($result)){
				        $sql_query_02 = "SELECT icon FROM user WHERE Email = '$row[1]';";
				        $result_02 = mysqli_query($select_db, $sql_query_02);
				        $row_02 = mysqli_fetch_row($result_02);
				        $icon = $row_02[0];
				        $randomNumber_1 = rand(50, 500);
				        $randomNumber_2 = rand(50, 500);
				        $randomNumber_3 = rand(50, 500);
    				    echo '<div class="post">
    					<div class="icon">
    						<img src="../images/'. $icon .'" alt="icon03">
    						<p>'. $row[1] .'</p>
    						<button class="add"><i class="fa fa-user-plus"></i></button>
    					</div>
    					<div class="text">
    						<div class="content">
    							<p>2022-05-07</p>
    							<h3><a href="#">'. $row[3] .'</a></h3>
    							<small>' . $row[4] . '</small><br>
    							<img src="../images/' . $row[5] . '" alt="post_02">
    						</div>
    						<div class="state">
    							<div class="type">
    								<i class="fa fa-comment"></i>
    								<p>'. $randomNumber_1 .'</p>
    							</div>
    							<div class="type">
    								<i class="fa fa-heart"></i>
    								<p>'. $randomNumber_2 .'</p>
    							</div>
    							<div class="type">
    								<i class="fa fa-share"></i>
    								<p>'. $randomNumber_3 .'</p>
    							</div>
    						</div>
    					</div>	 
    				</div>';
				}
			?>
				<div class="post">
					<div class="icon">
						<img src="../images/icon_02.jpg" alt="icon02">
						<p>Terence Lambert</p>
						<button class="add"><i class="fa fa-user-plus"></i></button>
					</div>
					<div class="text">
						<div class="content">
							<p>2022-05-10</p>
							<h3><a href="#">The Ultimate Guide To Spring Plant Care</a></h3>
							<small>Spring is right around the corner, which means longer days, warmer temperatures, and plants bounding back to life. I am going to sharing expert tips to ease your indoor plants into the spring season.</small><br>
							<img src="../images/post_01.jpg" alt="post_01">
						</div>
						<div class="state">
							<div class="type">
								<i class="fa fa-comment"></i>
								<p>304</p>
							</div>
							<div class="type">
								<i class="fa fa-heart"></i>
								<p>2448</p>
							</div>
							<div class="type">
								<i class="fa fa-share"></i>
								<p>154</p>
							</div>
						</div>
					</div>	 
				</div>
				<div class="post">
					<div class="icon">
						<img src="../images/icon_01.jpg" alt="icon01">
						<p>Elisabeth Marshall</p>
						<button class="add"><i class="fa fa-user-plus"></i></button>
					</div>
					<div class="text">
						<div class="content">
							<p>2022-04-28</p>
							<h3><a href="#">Gift Guide: The Best Plants For Valentine’s Day</a></h3>
							<small>Whether you’re shopping for that special someone, your favorite gal pal, or a treat for yourself (because you definitely deserve it), living houseplants are the perfect go-to gift for your Valentine’s and Galentine’s Day celebrations.</small><br>
						</div>
						<div class="state">
							<div class="type">
								<i class="fa fa-comment"></i>
								<p>294</p>
							</div>
							<div class="type">
								<i class="fa fa-heart"></i>
								<p>1246</p>
							</div>
							<div class="type">
								<i class="fa fa-share"></i>
								<p>75</p>
							</div>
						</div>
					</div>	 
				</div>
				<div class="post">
					<div class="icon">
						<img src="../images/icon_03.jpg" alt="icon03">
						<p>Jennifer Garcia</p>
						<button class="add"><i class="fa fa-user-plus"></i></button>
					</div>
					<div class="text">
						<div class="content">
							<p>2022-05-07</p>
							<h3><a href="#">Indoor Plants That Promote Luck, Wealth, And Prosperity This Lunar New Year</a></h3>
							<small>The Year of the Rabbit is quickly approaching, with the Lunar New Year occurring on January 22, 2023. There are many traditions associated with the Lunar New Year that focus on luck and prosperity, and gifting auspicious houseplants is one of them. Here are a few indoor plant gifting suggestions to help celebrate the Lunar New Year.</small><br>
							<img src="../images/post_02.jpg" alt="post_02">
						</div>
						<div class="state">
							<div class="type">
								<i class="fa fa-comment"></i>
								<p>93</p>
							</div>
							<div class="type">
								<i class="fa fa-heart"></i>
								<p>1005</p>
							</div>
							<div class="type">
								<i class="fa fa-share"></i>
								<p>70</p>
							</div>
						</div>
					</div>	 
				</div>
				<div class="post">
					<div class="icon">
						<img src="../images/icon_04.jpg" alt="icon04">
						<p>Aurelia Livia</p>
						<button class="add"><i class="fa fa-user-plus"></i></button>
					</div>
					<div class="text">
						<div class="content">
							<p>2022-04-14</p>
							<h3><a href="#">How to Increase the Humidity for Your Houseplants</a></h3>
							<small>Increasing the humidity in your home is key to keeping your houseplants healthy and thriving during the cold, dry months. Read about the Grow-How® Team’s favorite ways to increase the humidity in your home to keep houseplants healthy throughout the year.</small><br>
						</div>
						<div class="state">
							<div class="type">
								<i class="fa fa-comment"></i>
								<p>146</p>
							</div>
							<div class="type">
								<i class="fa fa-heart"></i>
								<p>1164</p>
							</div>
							<div class="type">
								<i class="fa fa-share"></i>
								<p>81</p>
							</div>
						</div>
					</div>	 
				</div>
				<div class="post">
					<div class="icon">
						<img src="../images/icon_05.jpg" alt="icon05">
						<p>Sharif Thomas</p>
						<button class="add"><i class="fa fa-user-plus"></i></button>
					</div>
					<div class="text">
						<div class="content">
							<p>2022-05-07</p>
							<h3><a href="#">Why Houseplants Make Great Gifts</a></h3>
							<small>Houseplants make wonderful gifts for family, coworkers, friends, and other loved ones in your life. They are both meaningful and long-lasting, but there are so many other reasons why houseplants make great items to gift. Gifting a lush, living present has never been easier with delivery from the greenhouse to their door, and we’d love to show you the many reasons why you should gift green for any occasion.</small><br>
						</div>
						<div class="state">
							<div class="type">
								<i class="fa fa-comment"></i>
								<p>98</p>
							</div>
							<div class="type">
								<i class="fa fa-heart"></i>
								<p>844</p>
							</div>
							<div class="type">
								<i class="fa fa-share"></i>
								<p>45</p>
							</div>
						</div>
					</div>	 
				</div>
				<div class="page-btn">
					<span>1</span>
					<span>2</span>
					<span>3</span>
					<span>4</span>
					<span>&#8594;</span>
				</div>
			</div>
			<div class="right">
				<div class="upload">
					<div class="box">
						<div class="class">
							<div class="row">
								<i class="fa fa-font"></i>
								<p>Text</p>
							</div>
							<div class="row">
								<i class="fa fa-image"></i>
								<p>Image</p>
							</div>
						</div>
						<div class="user">
							<div class="input">
								<i class="fa fa-user"></i>
								<?php
								// 检查用户是否登录
								if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
									// 用户已登录，设置JavaScript变量为post.php页面
									echo "<script>var redirectUrl = '../WebContent/post.php';</script>";
								} else {
									// 用户未登录，设置JavaScript变量为login page.php页面
									echo "<script>var redirectUrl = '../WebContent/login page.php';</script>";
								}
								?>
								<a href="#" onclick="window.location.href = redirectUrl;">Come here to write your post!</a>
								<!-- <input type="text" placeholder="Come and write your post!"> -->
							</div>
							<!-- <button class="sumbit">sumbit</button> -->
						</div>
					</div>
				</div>
				<div class="topic">
					<h2 class="section-title">Topic</h2>
					<div class="rank">
						<div class="title">
							<div><a href="#">Popular</a></div>
							<div class="color"><a href="#">|</a></div>
							<div class="color"><a href="#">Latest</a></div>
						</div>
						<div class="cover">
							<img src="../images/activitiy_01.jpg" alt="activitiy">
						</div>
						<div class="other">
							<div class="post">
								<img src="../images/activitiy_02.jpg" alt="activitiy">
								<h3><a href="#">Potty training your dogs</a></h3>
							</div>
							<div class="post">
								<img src="../images/activitiy_03.jpg" alt="activitiy">
								<h3><a href="#">My Pet is Lost. What Do I Do?</a></h3>
							</div>
							<div class="post">
								<img src="../images/activitiy_04.jpg" alt="activitiy">
								<h3><a href="#">Make Moving with Pets a Breeze</a></h3>
							</div>
							<div class="post">
								<img src="../images/activitiy_05.jpg" alt="activitiy">
								<h3><a href="#">3 Ways to Celebrate the Holidays with Your Pet</a></h3>
							</div>
							<!-- <div class="post">
								<img src="../images/activitiy_05.png" alt="activitiy">
								<h3><a href="#">Provide your suggestions on our website :&#41;</a></h3>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End forum section -->	

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
