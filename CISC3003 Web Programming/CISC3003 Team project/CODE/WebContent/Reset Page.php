<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/Reset.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>Pet Home - Reset</title>
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
	<!-- Sign up Box -->
    <div class="bg"></div>
		<div class="logobox">
			<h1>Reset</h1>
			<form id="signupForm" action="../WebContent/Reset.php" method="post">
				<div class="logolable"><lable>Email</lable></div>
				<div class="logoinput" style="display: flex; align-items: center;">
                    <input type="text" name="Email" id="pn" style="flex-grow: 1;">
                    <!-- <button type="button" id="activateBtn">Activate</button> -->
                </div>
				
				<div class="logolable"><lable>Reset Password</lable></div>
				<div class="logomima"><input type="password" name="Password" id="pw"/></div>
				<div class="logolable"><lable>Confirm New Password</lable></div>
				<div class="logomima"><input type="password" name="Repassword"id="repw"/></div>

				<div class="logobutton"><input type="submit" value="Reset"></div>
			</form>
		</div>
		<script type="text/javascript" src="script/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="script/zuce.js"></script>
		<script>
			document.getElementById("signupForm").onsubmit = function(event) {
				// 获取表单字段
				var email = document.getElementById("pn");
				var password = document.getElementById("pw");
				var repassword = document.getElementById("repw");
				var fields = [email, password, repassword];
				var fieldValid = true; // 假设所有字段都是有效的
			
				// 检查每个字段是否为空
				fields.forEach(function(field) {
					if (field.value.trim() === "") {
						fieldValid = false; // 发现无效字段
						field.style.backgroundColor = "red"; // 将字段边框设置为红色
					} else {
						field.style.backgroundColor  = ""; // 重置边框颜色
					}
				});
			
				// 如果任何字段无效，阻止表单提交
				if (!fieldValid) {
					event.preventDefault(); // 阻止表单提交
					alert("There is something blank,please fill in"); // 弹出提示
				}
			};
		</script>
	</body>
</html>
