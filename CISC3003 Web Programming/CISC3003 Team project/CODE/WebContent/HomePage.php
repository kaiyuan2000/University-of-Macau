<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/HomePage.css">
	<!-- <link rel="stylesheet" href="../css/ProductDetail.css"> -->
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>Pet Home - Home</title>
</head>

<body>
	
	<?php 
	session_start(); // 启动会话
	include '../WebContent/navbar.php'; // 引入导航栏
	?>
    <!-- End navbar -->
	<span>
	<div class="little_title">
		
		</div>
	<!-- hero section -->
	<section id="hero">
			<div class="container">			
				<div class="content">
					<div></div>
					<span></span>
					<span></span>

					<h1><span></span></h1>
					<!-- <a href="#" type="button" class="sgin">Explore Now</a> -->
					
				</div>
				
			</div>
			
		</section>
		<!-- End hero section -->
	</span>
	<section id="arr">

	<div class="container">			
				<div class="content">
	<div class="arrow"><span class="wrapper"><i class="fa-solid fa-angles-down"></i></span></div>
	</div>
	</div>
</section>
		
	
	<!-- special section -->
	<section id="special">
		<div class="container ">
			<h2 class="section-title">Daily Specials</h2>
			<div class="content">
			<div class="row">
            <div class="col-4 ">
                <img src="../images/home_cat-product01.jpeg" alt="cat-product05">
                <h4>PETSSION LIFE CORE Love | Natural Silk Orchid, Turmeric, and Rosemary</h4>
                <div class="rating">
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p class = "line-through">$268.00 </p> 
				<p>$188.00</p> 
            </div>

            <div class="col-4">
                <img src="../images/home_dog-product01.jpg" alt="cat-product06">
                <h4>Orijen Grain-Free Six Fish Recipe Cat Food 1.8kg/5.4kg</h4>
                <div class="rating">
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star-half-o" ></i>
                    <i class="fa fa-star-o"></i>
                </div>
				<p class = "line-through">$176.00</p>
				<p>$108.00</p> 
            </div>

            <div class="col-4">
                <img src="../images/home_cat-product02.jpg" alt="cat-product07">
                <h4>Orijen Grain-Free Chicken Recipe | Adult/Kitten Dry Food 1.8kg/5.4kg</h4>
                <div class="rating">
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p class = "line-through">$149.00</p>
				<p>$88.00</p> 
            </div>

            <div class="col-4">
                <img src="../images/home_dog-product02.jpg" alt="cat-product08">
                <h4>aiwan CATPOOL Gold Cat Butler | Natural Grain-Free Cat Food</h4>
                <div class="rating">
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star" ></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p class = "line-through">$160.00</p>
				<p>$110.00</p> 
            </div>  
        </div>
			</div>
			<a href="../WebContent/StorePage.php" type="button" class="more">More Products</a>
		</div>
	</section>
	<!-- End special section -->

	<!-- best section -->
	<section id="seller">
	
		<div class="container">
		<h2 class = "section-title-best">     </h2>
			<div class="content">
				<div class="left">
					<h2 class="section-title image-with-animation">Best Sellers</h2>
					<div class="row image-with-animation">
						<div class="col rank2 image-with-animation">
							<div class="ordered">
										<img src="../images/two.png" alt="two">
							</div>
							<img class="product" src="../images/home_dog-product01.jpg" alt="activitiy">
							<div class="text">
								<div class="detail">
									<div class="detail-left">
										<span><i class="fa fa-heart" aria-hidden="true"></i></span>
									</div>
									<div class="detail-right">
										
										<span><i class="fa fa-line-chart" aria-hidden="true">  2.6 W</i></span>
										<span><i class="fa fa-thumbs-up" aria-hidden="true"> 11.2K</i></span>
									</div>
								</div>
								<h4><a href="#">Purina Pro Plan Sport Performance</a></h4>
								
							</div>
						</div>
						<div class="col rank1 image-with-animation">
							<div class="ordered">
									<img src="../images/one.png" alt="one">
							</div>
							<img class="product " src="../images/home_cat-top2.jpg" alt="activitiy">
							<div class="text">
							<div class="detail">
									<div class="detail-left">
										<span><i class="fa fa-heart" aria-hidden="true"></i></span>
									</div>
									<div class="detail-right">
										
										<span><i class="fa fa-line-chart" aria-hidden="true"> 3.1 W</i></span>
										<span><i class="fa fa-thumbs-up" aria-hidden="true"> 16.9 KK</i></span>
									</div>
								</div>
								<h4><a href="#">Orijen Grain-Free Chicken Recipe</a></h4>
								
								
							</div>
							
						</div>
						<div class="col rank2 image-with-animation">
						<div class="ordered">
									<img src="../images/three.png" alt="three">
							</div>
							<img class="product" src="../images/home_cat-top3.jpg" alt="activitiy">
							<div class="text">
							<div class="detail">
									<div class="detail-left">
										<span><i class="fa fa-heart" aria-hidden="true"></i></span>
									</div>
									<div class="detail-right">
										
										<span><i class="fa fa-line-chart" aria-hidden="true"> 2.3 W</i></span>
										<span><i class="fa fa-thumbs-up" aria-hidden="true"> 8.5 K</i></span>
									</div>
								</div>
								<h4><a href="#">Taiwan CATPOOL Black Cat Butler</a></h4>
								
							</div>
						</div>
					</div>
					
					
				</div>
				<div class="right image-with-animation">
					<div class="rank">
						<div class="title">
							<div><a href="#">You may like</a></div>
						</div>
						<div class="other">
							<div class="like">
								<img src="../images/home_cat_like01.jpg" alt="activitiy">
								<h3><a href=../WebContent/Library Page.php">Me-O Creamy Cat Treats - Crab</a>
								<div class="price">$ 200.00</div></h3>
								
							</div>
							<div class="like">
								<img src="../images/home_dog_like05.png" alt="activitiy">
								<h3><a href="../WebContent/Library Page.php">Pedigree Puppy Dry Dog Food</a>
								<div class="price" >$ 123.00</div></h3>
							</div>
							<div class="like">
								<img src="../images/home_cat_like02.jpeg" alt="activitiy">
								<h3><a href="../WebContent/Library Page.php">Himalaya Healthy Pet Food</a>
								<div class="price">$ 104.00</div></h3>
							</div>
							<div class="like">
								<img src="../images/home_dog_like06.png" alt="activitiy">
								<h3><a href="../WebContent/Library Page.php">Orijen Dry Dog Food for all Lifestages</a>
								<div class="price">$ 150.00</div></h3>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="bnt">
				<a href="../WebContent/StorePage.php" type="button" class="more">Shop Now!</a>
			</div>
		</div>
	</section>
	<!-- End best section -->

		<!-- resource section -->
		<section id="activity">
		<div class="container">
		<h2 class = "section-title-best">     </h2>
		<h2 class="section-title image-with-animation">Pet Parent Resources</h2>
			<div class="container">
				<div class="row-1">
					<div class="col-1 image-with-animation">
						<img src="../images/home_resource01.jpeg" alt="resource">
						<div class="text">
							<div class="detail">
								<div class="detail-left">
									<span>31 days ago</span>
								</div>
								<div class="detail-right">
									<span><i class="fa fa-comment-dots">1991</i></span>
									<span><i class="fa fa-eye">90000</i></span>
								</div>
							</div>
							<h3><a href="#">Bringing Home a New Dog</a></h3>
							<p>So you’ve decided to get a new dog?! Bringing home a new dog can be very...</p>
							<a href="../WebContent/BlogPage.php" class="read">read more</a>
						</div>
					</div>
					<div class="col-1 image-with-animation">
						<img src="../images/activitiy_04.jpg" alt="resource">
						<div class="text">
							<div class="detail">
								<div class="detail-left">
									<span>19 days ago</span>
								</div>
								<div class="detail-right">
									<span><i class="fa fa-comment-dots">1283</i></span>
									<span><i class="fa fa-eye">80594</i></span>
								</div>
							</div>
							<a href="#"><h3>What Do I Need to Care for My New Cat?</h3></a>
							<p>Bringing home a new cat or kitten is a big deal for both you and your new...</p>
							<a href="../WebContent/BlogPage.php" class="read">read more</a>
						</div>
					</div>
					<div class="col-1 image-with-animation">
						<img src="../images/home_resource03.jpeg" alt="resource">
						<div class="text">
							<div class="detail">
								<div class="detail-left">
									<span>10 days ago</span>
								</div>
								<div class="detail-right">
									<span><i class="fa fa-comment-dots">1283</i></span>
									<span><i class="fa fa-eye">80594</i></span>
								</div>
							</div>
							<a href="#"><h3>Setting-Up an Aquarium</h3></a>
							<p> Here’s everything you need to pamper your fish...</p>
							<a href="../WebContent/BlogPage.php" class="read">read more</a>
						</div>
					</div> 
				</div>
		</div>
	</section>
	<!-- End resource section -->
	
	
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

	<script>
    window.addEventListener('scroll', function() {
      var images = document.querySelectorAll('.image-with-animation');
      var windowHeight = window.innerHeight;
      
      images.forEach(function(image) {
        var imagePosition = image.getBoundingClientRect().top;
        
        if (imagePosition < windowHeight) {
          image.style.opacity = '1';
        }
      });
    });
  </script>

</body>
</html>
