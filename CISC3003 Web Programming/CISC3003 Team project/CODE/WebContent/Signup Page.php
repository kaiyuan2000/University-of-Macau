<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/Signup.css">
	<script src="https://kit.fontawesome.com/4776385d24.js"></script>
	<title>Pet Home - Signup</title>
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
			<h1>SignUp</h1>
			<form id="signupForm" action="../WebContent/Signup.php" method="post">
				<div class="logolable"><lable>Email</lable></div>
				<div class="logoinput">
					<!-- <div>+853<i class="iconfont icon-xia"></i></div> -->
					<div><input type="text" name="Email" id="pn"></div>
				</div>
				<!--<div class="logolable"><lable>Verification Code</lable></div>
				<div class="logoduanxin">
					<input type="text" id="ck">
					<button id="huoquyan">Get Code</button>
				</div>  -->
				<div class="logolabel"><label>User name</label>
					<div class="logomima">
						<input type="text" id="ck" name="username">
					</div>
				</div>
				
				<div class="logolable"><lable>Set Password</lable></div>
				<div class="logomima"><input type="password" name="Password" id="pw"/></div>
				<div class="logolable"><lable>Repeat Password</lable></div>
				<div class="logomima"><input type="password" name="Repassword"id="repw"/></div>
				<div class="logoxieyi">
					<input type="checkbox" id="check"/>
					<span>Read and accepted<a href="#">(Registration Agreement)</a></span>
				</div>
				<div class="logobutton"><input type="submit" value="Signup"></div>
			</form>
			<div class="logocaozuo">
				<div><a href="#"></a></div>
				<div><a href="../WebContent/Login Page.html">Already have an account? Log in</a></div>
			</div>
		</div>
		<script type="text/javascript" src="script/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="script/zuce.js"></script>
		<script>
			document.getElementById("signupForm").onsubmit = function(event) {
				// 获取表单字段
				var email = document.getElementById("pn");
				var username = document.getElementById("ck");
				var password = document.getElementById("pw");
				var repassword = document.getElementById("repw");
				var agreement = document.getElementById("check");
				var fields = [email, username, password, repassword];
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

				if(!agreement.checked){
					fieldValid = false;
					agreement.style.outline = "2px solid red"; // 将复选框标红
					alert("you must accept our Registration Agreement"); // 弹出提示
				} else {
					agreement.style.outline = ""; // 如果勾选了，重置样式
				}
			
				// 如果任何字段无效，阻止表单提交
				if (!fieldValid) {
					event.preventDefault(); // 阻止表单提交
					alert("There is something blank,please fill in"); // 弹出提示
				}
			};
		</script>
	</body>
</html>
