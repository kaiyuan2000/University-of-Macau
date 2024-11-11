<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/StorePage.css">
    <script src="https://kit.fontawesome.com/4776385d24.js"></script>
    <title>Pet Home - Store</title>
</head>

<body>
    <?php 
	session_start(); // 启动会话
	include '../WebContent/navbar.php'; // 引入导航栏


	?>
    <!-- End navbar -->
  	
    
    <!-- Body section -->

        
<div class="little_title">
            <!-- special section -->
	<section id="special">
		<div class="container ">
			<h2 class="section-title">Shop by Cats</h2>
			<div class="content slider">
            <?php
                include('../WebContent/get_featured_products.php');
                $count = 0;
                ?>

                <div class="row slider-content">
                    <?php
                    while ($row = $featured_products->fetch_assoc()) {
                        ?>
                        <div class="col-4">
						<!-- <a href="../WebContent/ProductDetail.php"><img src="../images/<?php echo $row['product_image']; ?>" alt="dog-product05"></a> -->
						<a href="../WebContent/ProductDetail.php?product_id=<?php echo $row['product_id']; ?>"><img src="../images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>"></a>   
						<h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p>$<?php echo $row['product_price']; ?></p>
                           
                        </div>
                        <?php
                        $count++;
                       
                        if ($count % 4 == 0) {
                            echo '</div><div class="row slider-content">';
                        }
                        if ($count == 8) {
                          
                           
                            break;
                        }
                    }
                    ?>
                </div>

                <?php
                // 如果最后一行不满四个产品，需要补充闭合标签
                if ($count % 4 != 0) {
                    echo '</div>';
                }
                ?>

                
                <!-- <button class="button prev-button">Pre</button>
                <button class="button next-button">NEXT</button> -->
			</div>
			<a href="../WebContent/StoreCatPage.php" type="button" class="more">More Products</a>
            <br>
            <br>
            <h2 class="section-title-best"> </h2>
		</div>
	</section>
    <section id="special">
		<div class="container ">
			<h2 class="section-title">Shop by Dogs</h2>
			<div class="content slider">
            <?php
                include('../WebContent/get_featured_products.php');
                $count = 0;
                ?>

                <div class="row slider-content">
                <?php
                $count = 0; // 初始化计数器为0
                $category = 0;
                while ($row = $featured_products->fetch_assoc()) {
                    
                    $category++;
                    if ($category >= 13 && $category <= 20) {
                        $count++; // 每次循环开始时递增计数器
                        // 仅当计数器在4到9的范围内时，输出HTML
                        ?>
                        <div class="col-4">
                            <a href="../WebContent/ProductDetail.php?product_id=<?php echo $row['product_id']; ?>"><img src="../images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>"></a>
                            <h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p>$<?php echo $row['product_price']; ?></p>
                        </div>
                        <?php
                        if ($count % 4 == 0) {
                            // 每4个产品后开始新的一行
                            echo '</div><div class="row slider-content">';
                        }
                        if ($count == 8) {
                            echo '</div>';
                            break;
                        }
                    }
                }
               
                ?>

                
                <!-- <button class="button prev-button">Pre</button>
                <button class="button next-button">NEXT</button> -->
			</div>
			    <a href="../WebContent/StoreDogPage.php" type="button" class="more">More Products</a>
                <br>
            <br>
            <h2 class="section-title-best"> </h2>
		    </div>
	</section>
    <section id="special">
		<div class="container ">
			<h2 class="section-title">Shop by Pets Supplies</h2>
			<div class="content slider">
            <!-- <div class="row slider-content"> -->
            <?php
                include('../WebContent/get_featured_products.php');
                $count = 0;
                ?>

                <div class="row slider-content">
                <?php
                $count = 0; // 初始化计数器为0
                $category = 0;
                while ($row = $featured_products->fetch_assoc()) {
                    
                    $category++;
                    if ($category >= 25 && $category <= 32) {
                        $count++; // 每次循环开始时递增计数器
                        // 仅当计数器在4到9的范围内时，输出HTML
                        ?>
                        <div class="col-4">
                            <a href="../WebContent/ProductDetail.php?product_id=<?php echo $row['product_id']; ?>"><img src="../images/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>"></a>
                            <h4><?php echo $row['product_name']; ?></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p>$<?php echo $row['product_price']; ?></p>
                        </div>
                        <?php
                        if ($count % 4 == 0) {
                            // 每4个产品后开始新的一行
                            echo '</div><div class="row slider-content">';
                        }
                        if ($category == 32) {
                            echo '</div>';
                            break;
                        }
                    }
                }
               
                ?>
               
                <!-- <button class="button prev-button">Pre</button>
                <button class="button next-button">NEXT</button> -->
			</div>
			    <a href="../WebContent/StoreServicePage.php" type="button" class="more">More Products</a>
                
		    </div>
	</section>

        </div>
  
    <br><br>
    <!-- End body section -->

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
    <!-- <script>
        const slider = document.querySelector('.slider');
const sliderContent = document.querySelector('.slider-content');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
let currentPosition = 0;

prevButton.addEventListener('click', () => {
  if (currentPosition < 0) {
    currentPosition += slider.clientWidth;
    sliderContent.style.transform = `translateX(${currentPosition}px)`;
  }
});

nextButton.addEventListener('click', () => {
  if (Math.abs(currentPosition) < sliderContent.clientWidth - slider.clientWidth) {
    currentPosition -= slider.clientWidth;
    sliderContent.style.transform = `translateX(${currentPosition}px)`;
  }
});
        </script> -->
</body>

</html>