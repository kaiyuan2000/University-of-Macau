<?php
session_start();

// 清除所有会话变量
$_SESSION = array();

// 销毁会话
session_destroy();

// 重定向到登录页面或网站主页
header("Location: Login Page.php");
exit();
?>