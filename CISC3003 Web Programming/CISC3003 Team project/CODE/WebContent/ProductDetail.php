<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/ProductDetail.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>Pet Home - Product Detail</title>
</head>

<body>
	
	<?php 
	session_start(); // 启动会话
	include '../WebContent/navbar.php'; // 引入导航栏

    $conn = new mysqli("localhost", "root", "", "webproject", 3306);
    if ($conn->connect_error) {
        die("Fail to connect the mysql server " . $conn->connect_error);
    }
    
    $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : die('ERROR: Product ID not found.');
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // 现在你可以使用$row['product_name'], $row['product_image'], 等来显示商品详情
    } else {
        echo "No product found with ID " . $product_id;
    }
    
    // add to cart
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
    
        // 如果购物车还不存在，就创建一个
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    
        // 添加或更新购物车中的商品
        $_SESSION['cart'][$product_id] = isset($_SESSION['cart'][$product_id]) ? $_SESSION['cart'][$product_id] + $quantity : $quantity;
    
        // 可以选择添加一个消息通知用户商品已添加到购物车
        // $_SESSION['message'] = "Product added to cart successfully!";
    }
    // // 关闭数据库连接
    // $stmt->close();
	?>
    <!-- End navbar -->

	<div class="little_title">
		
	</div>
	   <!-- single product details-->
       <div class="small-container single-product">

      
        <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <!-- 动态显示商品图片 -->
                <img src="../images/<?php echo htmlspecialchars($row['product_image']); ?>" width="100%" alt="<?php echo htmlspecialchars($row['product_name']); ?>" id="ProductImg">
            </div>
            <div class="col-2 detail">
                <!-- 动态显示商品名称 -->
                <h2 class="product-name"><?php echo htmlspecialchars($row['product_name']); ?></h2>
                <!-- 动态显示商品价格 -->
                <h4 class="price">Mop $<?php echo htmlspecialchars($row['product_price']); ?></h4>
                
                <!-- <input type="number" value="1"> -->
                <!-- 这里的链接需要根据你的购物车系统进行调整 -->
                <!-- <a href="" class="more">Add to Cart</a> -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?product_id=<?php echo htmlspecialchars($product_id); ?>" method="post">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                    <input type="number" name="quantity" value="1" min="1">
                    <button type="submit" name="add_to_cart" class="more">Add to Cart</button>
                </form>
                <h3>Product Detail &nbsp;<i class="fa-solid fa-circle-info"></i></h3>
                <br>
                <!-- 动态显示商品描述，假设你的商品信息中包含了描述 -->
                <p><?php echo htmlspecialchars($row['product_detail']); ?></p>
            </div>
        </div>
        </div>
    </div>
    </div>
        <!-- End of single product details-->

		<!-- footer section -->
    <div >
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
     <div >
	<!-- End footer section -->

</body>
</html>
