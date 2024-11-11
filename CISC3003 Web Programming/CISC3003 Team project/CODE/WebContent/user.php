<?php 
// $Email=$_GET['Email'];

// $select_db = mysqli_connect("localhost", "root", "", "webproject")or die("Fail to connect the mysql server <br>");
// $sql_query = "SELECT name FROM user WHERE Email = '$Email';";
// $result = mysqli_query($select_db, $sql_query);
// $row = mysqli_fetch_row($result);
// $name = $row[0];

// $sql_query_02 = "SELECT icon FROM user WHERE Email = '$Email';";
// $result_02 = mysqli_query($select_db, $sql_query_02);
// $row_02 = mysqli_fetch_row($result_02);
// $icon = $row_02[0];
session_start(); // 开始或继续会话
if (!isset($_SESSION['user_logged_in'])) {
    header("Location: Login Page.php"); // 如果用户未登录，重定向到登录页面
    exit();
}

$Email = $_GET['Email'] ?? ''; // 使用 PHP 7.0+ 的空合并运算符

// 创建数据库连接
$conn = new mysqli("localhost", "root", "", "webproject");
if ($conn->connect_error) {
    die("fail to connect " . $conn->connect_error);
}

// 使用预处理语句来防止SQL注入
$stmt = $conn->prepare("SELECT name, icon FROM user WHERE Email = ?");
$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $icon = $row['icon'];
} else {
    echo "cannot find the user";
    $stmt->close();
    $conn->close();
    exit();
}

// 假设 $Email 已经被定义和过滤
$Email = $conn->real_escape_string($Email);

// 编写 SQL 查询语句
$sql = "SELECT COUNT(*) AS post_count FROM post WHERE Email = '$Email'";

// 执行查询
$result = $conn->query($sql);

// 获取查询结果
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $postCount = $row['post_count'];
} else {
    $postCount = 0; // 如果没有找到帖子，设置数量为 0
}

$stmt->close();
$conn->close();
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
	<?php  // 启动会话
	include '../WebContent/navbar.php'; // 引入导航栏
	?>
    <!-- End navbar -->

	<!-- User Banner -->
	<div class="banner">
	<div class="user-back"><img src="../images/activitiy_05.jpg"></div>
			<div class="user">
				<div class="user-img"><img src="../images/<?= htmlspecialchars($icon) ?>" alt="User Icon" ></div> 
				<div class="user-text">
					<div><h3><?php htmlspecialchars($name)?></h3><i class="iconfont icon-v"></i><span>+Fol</span><span>...</span></div>
					<p>Following 1<span>|</span>Followers 7745</p>
				</div>
			</div>
	</div>
    
	<!-- User Navigation-->
	<div class="user-nav">
			<ul>
				<li><a href="">Post <?php echo $postCount; ?></a></li>
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
						<!-- <li><a href="#">all</a></li>
						<li><a href="#">picture</a></li> -->
						<li><a href="#">blog post</a></li>
					</ul>
					<form action="#">
						<input type="text" placeholder="Search for works">
						<i class="iconfont icon-btn_search"></i>
					</form>
				</div>
				<div class="opus">
					<ul>
    				<?php 
        				$select_db = mysqli_connect("localhost", "root", "", "webproject")or die("Fail to connect the mysql server <br>");
        				$sql_query = "SELECT * FROM post WHERE Email = '$Email';";
        				$result = mysqli_query($select_db, $sql_query);
        				while($row=mysqli_fetch_row($result)){
        				    echo '<li>
							<a href="#">
								<img src="../images/' . $row[5] . '" alt="">
								<div>
									<div class="opus-time">April 09, 2023</div>
									<h3>'. $row[3] .'</h3>
									<span class="opus-biao">'. $row[4] .'</span>
									<div class="opus-static">
										<div><span><i class="iconfont icon-yanjing"></i>188865</span><span><i class="iconfont icon-xiaoxi"></i>25</span></div>
										<div><span><i class="iconfont icon-shoucang"></i>791</span></div>
									</div>
								</div>
							</a>
						</li>';
        				}
    				?>
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
