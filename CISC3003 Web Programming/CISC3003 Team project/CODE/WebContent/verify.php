<?php
// verify.php
$conn = new mysqli("localhost", "root", "", "webproject", 3306);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['code']) && !empty($_GET['code'])){
    $Email = $_GET['email'];
    $verification_code = $_GET['code'];
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE Email = ? AND verification_code = ? AND status = 0");
    $stmt->bind_param("ss", $Email, $verification_code);
    $stmt->execute();
    $result = $stmt->get_result();
    // echo '<script>alert("找到的行数: ' . $result->num_rows . '");</script>';
    $stmt_1= $conn->prepare("SELECT * FROM `user` WHERE Email = ? AND verification_code = ? AND status = 1");
    $stmt_1->bind_param("ss", $Email, $verification_code);
    $stmt_1->execute();
    $result_1 = $stmt_1->get_result();
    if($result->num_rows > 0){
        // 验证码匹配，更新用户验证状态
        $updateStmt = $conn->prepare("UPDATE `user` SET status = 1 WHERE Email = ?");
        $updateStmt->bind_param("s", $Email);
        
        if($updateStmt->execute()){
            // echo '您的邮箱已成功验证。';
            // // 可以在这里重定向到登录页面
            echo '<script>alert("Success verified");</script>';
            echo '<script>window.location.replace("Login Page.php");</script>';
            // echo '<script>alert("您的邮箱已成功验证。"); window.location="Login Page.php";</script>';
            exit;
        } else {
            echo '验证失败，请重试。';
            exit;
        }
    } 
    elseif($result_1->num_rows > 0) {
        // echo '找到的行数: ' . $result->num_rows;
        echo '<script>alert("Already verified, please login.");</script>';
        echo '<script>window.location.replace("Login Page.php");</script>';
    }
    else{
        echo 'Invalid link';
    }
} else {
    // 非法访问
    echo '非法访问。';
}
?>