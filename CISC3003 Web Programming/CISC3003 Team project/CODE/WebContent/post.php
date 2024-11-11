<?php
session_start(); // 启动会话

$host = "localhost";
$dbname = "webproject";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

function create_unique_id(){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < 20; $i++) {
		$randomString .= $characters[mt_rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

if(isset($_POST['post'])){  
	$id = create_unique_id();
	$Email = $_POST["Email"];
	$title = $_POST["title"];
	$description = $_POST["description"];
	$image = $_FILES["image"]['name'];
	$image_size = $_FILES['image']['size'];
	
	$result = $conn->query("SELECT name FROM `user` WHERE Email = '$Email'");
//     while ($row = $result->fetch_assoc()) {
//         $name = $row['name'];
//     }
	$row = mysqli_fetch_array($result);
	$name = $row['name'];

	// 使用 pathinfo() 函数获取文件后缀
	$imageExtension = pathinfo($image, PATHINFO_EXTENSION);

	// 将 $image 更改为 $id 加上文件后缀
	$image = 'post_' . $id . '.' . $imageExtension;
	// 检查是否有文件被上传
	// if(isset($_FILES["image"]["name"]) && $_FILES["image"]["error"] == 0){
	// 	$target_dir = "../images/"; // 目标目录
	// 	$target_file = $target_dir . basename($image); // 目标文件路径

	// 	// 尝试将文件移动到目标目录
	// 	if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
	// 		echo '<script>

    //             alert("The file '. htmlspecialchars( basename( $_FILES["image"]["name"])) . ' has been uploaded.\\nSend email successfully");

    //             window.location.href="Login Page.php";

    //         </script>';
	// 	} else{
	// 		echo '<script>

    //             alert("Sorry, there was an error uploading your file.");

    //         </script>';
	// 	}
	// }
	if(isset($_FILES["image"]["name"]) && $_FILES["image"]["error"] == 0){
		$target_dir = "../images/"; // 目标目录
		$target_file = $target_dir . basename($image); // 目标文件路径
	
		// 检查目标文件夹是否存在
		if (!file_exists($target_dir)) {
			die("目标目录不存在: " . htmlspecialchars($target_dir));
		}
	
		// 检查目标目录是否可写
		if (!is_writable($target_dir)) {
			die("目标目录不可写: " . htmlspecialchars($target_dir));
		}
	
		// 尝试将文件移动到目标目录
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
			// echo '<script>
			// 		alert("文件 '. htmlspecialchars( basename( $_FILES["image"]["name"])) . ' 已经上传。");
			// 	  </script>';
		} else{
			// 如果文件移动失败，显示错误信息
			$error_message = "对不起，上传文件时出错。";
			switch ($_FILES['image']['error']) {
				case UPLOAD_ERR_INI_SIZE:
					$error_message .= " 文件大小超过了 php.ini 中 upload_max_filesize 的设置。";
					break;
				case UPLOAD_ERR_FORM_SIZE:
					$error_message .= " 文件大小超过了 HTML 表单中 MAX_FILE_SIZE 的设置。";
					break;
				case UPLOAD_ERR_PARTIAL:
					$error_message .= " 文件只有部分被上传。";
					break;
				case UPLOAD_ERR_NO_FILE:
					$error_message .= " 没有文件被上传。";
					break;
				case UPLOAD_ERR_NO_TMP_DIR:
					$error_message .= " 找不到临时文件夹。";
					break;
				case UPLOAD_ERR_CANT_WRITE:
					$error_message .= " 文件写入失败。";
					break;
				case UPLOAD_ERR_EXTENSION:
					$error_message .= " PHP扩展停止了文件上传。";
					break;
			}
			echo '<script>
					alert("' . $error_message . '");
				  </script>';
		}
	} else {
		if ($_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
			// 显示具体的错误信息
			echo '<script>
					alert("上传错误: ' . $_FILES["image"]["error"] . '");
				  </script>';
		}
	}

	if(!$name){
		die("You need to singup!");
	}
	if(!$description){
		die("You need to write a description.");
	}
	if($image_size > 2000000){
		// echo '<script>
		// 			alert("文件 '. htmlspecialchars( basename( $_FILES["image"]["name"])) . ' is too large, upload image below 2,000,000 pixel");
		// 			window.location.href("post.php");
		// 	 </script>';
		die("Image is too large, upload image below 2,000,000 pixel.");
	}else{
		$add_post = $conn->prepare("INSERT INTO `post`(id, Email, name, title, description, image) VALUES(?,?,?,?,?,?)");
		// 在 post.php 中，帖子成功添加到数据库后
		if($add_post->execute([$id, $Email, $name, $title, $description, $image])){
			// 页面跳转到 CommunityPage.php，并通过 URL 参数传递新发布的帖子的 ID
			header('Location: ForumPage.php');
			exit();
		}
	}
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/template.css">
	<link rel="stylesheet" href="../css/post.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>PlantLife Community - post</title>
</head>

<body>
	<?php 
	include '../WebContent/navbar.php'; // 引入导航栏
	?>
    <!-- End navbar -->
	<!-- Body section -->
	<section id="body" style="padding-top: 80px;">
		<div class="space">
			<h1>Edit your post</h1>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="main_user_info">
					<div class="user_input_box">
						<label for="Email">Enter your Email: </label>
						<input type="text" id="Email" name="Email" placeholder="Enter your Email">
					</div>

					<div class="user_input_box">
						<label for="title">Title: </label>
						<input type="text" id="title" name="title" placeholder="Enter your title"><br><br>
					</div>

					<div class="user_input_box">
						<label for="description">Description: </label><br>
						<textarea name="description" id="description" cols="50" rows="10" placeholder="Describe your plant here..."></textarea>
					</div>

					<div class="user_input_box">
						<label for="image">Upload your photo: </label>
						<input type="file" name="image" required accept="image/*" id="image">
					</div>
				</div>
				<div class="submit_btn">
					<input type="submit" class="btn" name="post" value="add post" >
				</div>
			</form>

			<div class="post_info">
				<h3>Your Blog has been Posted</h3>
			</div>
		</div>
	</section>

	<!-- End body section -->

	<!-- footer section -->
	<section id="footer">
		<div class="container">
			<footer>
				<div class="col-1">
					<h3>Download Our App</h3>
					<p>Download App for Android and ios mobile phone.</p>
					<div class="app-logo">
						<img src="../images/play-store.png" alt="play-store">
						<img src="../images/app-store.png" alt="app-store">
					</div>
				</div>
				<div class="col-2">
					<img src="../images/logo.jpg" alt="logo">
					<p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Plants Accessible to Many</p>
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