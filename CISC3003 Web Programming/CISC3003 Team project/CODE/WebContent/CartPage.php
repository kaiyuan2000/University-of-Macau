<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/CartPage.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>Pet Home - Cart</title>
</head>

<body>
	
    <?php
    session_start();
    include '../WebContent/navbar.php'; // 引入导航栏

    $conn = new mysqli("localhost", "root", "", "webproject", 3306);
    if ($conn->connect_error) {
        die("Fail to connect the mysql server " . $conn->connect_error);
    }

    // 确保购物车存在
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            $sql = "SELECT * FROM products WHERE product_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            }
            // 根据$product_id从数据库中获取商品信息
            // 注意：这里需要你根据实际情况编写代码从数据库获取商品信息并显示
            // 示例：$sql = "SELECT * FROM products WHERE product_id = ?";
            // 显示商品信息和数量
        }
    } else {
        echo "Your cart is empty.";
    }

    // clear cart

        // 检查是否点击了"Remove all"按钮
        if (isset($_POST['clear_cart'])) {
            // 清空购物车
            $_SESSION['cart'] = array();
            // 可选：添加一个消息通知用户购物车已被清空
            // $_SESSION['message'] = "Your cart has been cleared!";
        }
    //delete item 
        if (isset($_POST['remove']) && isset($_POST['remove_product_id'])) {
            $remove_product_id = $_POST['remove_product_id'];
            
            // 从购物车中移除商品
            if (isset($_SESSION['cart'][$remove_product_id])) {
                unset($_SESSION['cart'][$remove_product_id]);
            }
            
            // $_SESSION['message'] = "Product removed from cart successfully!";
        }
        
        ?>

   
    

 

    <!-- End navbar -->

	<div class="little_title">
		
	</div>
	

	   <!-- cart items details  -->
       <div class="small-container ">
    <table class = "payment">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                $total = 0;
                foreach ($_SESSION['cart'] as $product_id => $quantity) {
                    $sql = "SELECT * FROM products WHERE product_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $product_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $subtotal = $row['product_price'] * $quantity;
                        $total += $subtotal;
                        echo "<tr>";
                        echo "<td>
                                <div class='cart-info'><img src='../images/" . $row['product_image'] . "' alt=''>
                                    <div><p>" . $row['product_name'] . "</p> 
                                        <form action='CartPage.php' method='post'>
                                        <input type='hidden' name='remove_product_id' value='" . $product_id . "'>
                                        <button type='submit' name='remove' class='remove'>Remove</button>
                                        </form>
                                    </div>
                                </div>
                            </td>";
                        echo "<td id='price-" . $product_id . "'>$" . $row['product_price'] . "</td>";
                        echo "<td><input type='number' value='" . $quantity . "' class='quantity' data-product-id='" . $product_id . "' onchange='updateSubtotal(this)' min='0'></td>";
                        echo "<td id='subtotal-" . $product_id . "'>$" . $subtotal . "</td>";
                        echo "</tr>";
                    }
                }
            // 显示总计
            
            echo "<tr>";
            echo "<td colspan='3' align='right' class='line'>Total</td>";
            echo "<td class='line' id = 'total'>$" . $total . "</td>";
            echo "</tr>";
        } else {
            echo "<tr><td colspan='4'>Your cart is empty.</td></tr>";
        }
        ?>
        <tr>
            <!-- <td>&nbsp;</td>
            <td>&nbsp;</td> -->
            
            <!-- <td>&nbsp;</td> -->
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            
                <div class="last">

                <form action="CartPage.php" method="post">
                    <td><button type="submit" name="payment" class="more pay"><i class="fa-regular fa-credit-card">&nbsp Pay Now</i></button></td>
                        
                    <td> <button type="submit" name="clear_cart" class="more clear"><i class="fa-solid fa-trash">&nbsp Remove all</i></button></td>
                 </form>
            <!-- <button type="submit" name="clear" class="more clear"><i class="fa-solid fa-trash">&nbsp Remove all</i></button> -->
             
        </div>
       
    </tr>
    </table>

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
	</section>
	<!-- End footer section -->
    <script>
        function updateSubtotal(quantityInput) {
            var productId = quantityInput.getAttribute('data-product-id');
            var price = parseFloat(document.getElementById('price-' + productId).innerText.replace('$', ''));
            var quantity = parseInt(quantityInput.value);
            var newSubtotal = price * quantity;
            document.getElementById('subtotal-' + productId).innerText = '$' + newSubtotal.toFixed(2);
            updateTotal();
        }

        function updateTotal() {
            var total = 0;
            var subtotals = document.querySelectorAll('[id^="subtotal-"]');
            subtotals.forEach(function(subtotal) {
                total += parseFloat(subtotal.innerText.replace('$', ''));
            });
            document.getElementById('total').innerText = '$' + total.toFixed(2);
        }
        </script>

</body>
</html>
