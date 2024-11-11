<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/LoginPage.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>PlantLife Community - Login Page</title>
</head>

<body>
<?php 
	session_start(); // 启动会话
	include '../WebContent/navbar.php'; // 引入导航栏
	?>
    <!-- End navbar -->

    <div class="head">
			<div class="banner">
				<div><img src="../images/background_01.jpg"></div>
			</div>
    </div>
    <div class="bg"></div>
		<div class="logobox">
			<h1>Login</h1>
			<!-- <ul class="logoclass"> -->
				<!-- <li><a href="#">Phone Number</a></li> -->
				<!-- <li><a href="#">Email</a></li> -->
			<!-- </ul> -->

			<div id="error-message" style="display:none; color:red; text-align:center;"></div>

			<form action="../WebContent/Login.php" method="post">
				<div class="logolable"><lable>Email </lable></div>
				<div class="logoinput">
					<input type="text" name="Email" id="pn">
				</div>
				<div class="logolable"><lable>Password</lable></div>
				<div class="logomima"><input type="password" name="Password" id="pw"/></div>	
				<div class="logobutton"><input type="submit" value="Login">
			</div>
			</form>
			<div class="logocaozuo">
				<div><a href="../WebContent/Signup Page.php">SignUp</a></div>
				
				<!-- <div><a href="../WebContent/Library Page.php">Forget Password?</a></div> -->
				<div><a href="../WebContent/Reset Page.php">Forget Password?</a></div>
				<!-- 这里要写跳转的更改密码界面/邮箱登录界面 -->

			</div>
			<div class="logohuozhe">
				<div>Or</div>
			</div>
			<ul class="logoqita">
				<li><a href="#"><i class="iconfont icon-weixin"></i></a></li>
				<li><a href="#"><i class="iconfont icon-weibo"></i></a></li>
				<li><a href="#"><i class="iconfont icon-ai-qq"></i></a></li>
			</ul>
		</div>
		<script type="text/javascript" src="../js/logo.js"></script>
		<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const urlParams = new URLSearchParams(window.location.search);
				const error = urlParams.get('error');
				if (error === 'invalid_credentials') {
					const errorMessageDiv = document.getElementById('error-message');
					errorMessageDiv.textContent = 'Wrong email or password, please try again.';
					errorMessageDiv.style.display = 'block';
				}
			});
			</script>
		
</body>
</html>
