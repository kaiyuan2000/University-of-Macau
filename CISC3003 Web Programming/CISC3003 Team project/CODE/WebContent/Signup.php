<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';

if (trim($_POST['Password']) != trim($_POST['Repassword'])) {   
    exit('password is not same!');   
}
$Email = (trim($_POST['Email']));
$Password = (trim($_POST['Password']));
$username = (trim($_POST['username']));

$randomNumber = rand(1, 6);
$icon = "user_0". $randomNumber .".png";
    
$conn = new mysqli("localhost", "root", "", "webproject", 3306);
if ($conn->connect_error) {
    echo "连接失败: " . $conn->connect_error;
    exit;
}
$stmt = $conn->prepare("SELECT * FROM `user` WHERE Email = ?");
$stmt->bind_param("s", $Email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo '<script>alert("You already have account, please LogIn"); window.location.href="Login Page.php";</script>';
} 
else {
    // 插入新用户数据
    // $stmt = $conn->prepare("INSERT INTO user ( Password, Email, name, icon) VALUES (?, ?, ?, ?)");
    // $stmt->bind_param("ssss",  $Password, $Email, $username, $icon);

    $verification_code = md5(rand(0,1000));
    // 插入新用户数据，包括验证码
    $stmt = $conn->prepare("INSERT INTO user (Password, Email, name, icon,status,verification_code) VALUES (?, ?, ?, ?, 0, ?)");
    $stmt->bind_param("sssss", $Password, $Email, $username, $icon,$verification_code);
    if ($stmt->execute()) {
        
        // 验证连接
        $verifyLink = "http://localhost/CISC3003-GroupProject-Team01/WebContent/verify.php?email=$Email&code=$verification_code";

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //服务器配置
            $mail->CharSet ="UTF-8";                     //设定邮件编码
            $mail->SMTPDebug = 0;                        // 调试模式输出
            $mail->isSMTP();                             // 使用SMTP
            $mail->Host = 'smtp.qq.com';                // SMTP服务器
            $mail->SMTPAuth = true;                      // 允许 SMTP 认证
            $mail->Username = '623915589@qq.com';                // SMTP 用户名  即邮箱的用户名
            $mail->Password = 'ktmyofheclqbbfdb';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
            $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
            $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

            $mail->setFrom('623915589@qq.com', 'Mailer');  //发件人
            $mail->addAddress($Email, $username);  // 收件人
            //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
            $mail->addReplyTo('623915589@qq.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
            //$mail->addCC('cc@example.com');                    //抄送
            //$mail->addBCC('bcc@example.com');                    //密送

            //发送附件
            // $mail->addAttachment('../xy.zip');         // 添加附件
            // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

            //Content
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = 'Activate your Account now ' . time();
            $mail->Body = 
            '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f9;
                        margin: 0;
                        padding: 20px;
                        color: #333;
                    }
                    .container {
                        background-color: #fff;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                        padding: 20px;
                        text-align: left; /* 修改这里 */
                    }
                    .verify-link {
                        background-color: #007BFF;
                        color: #ffffff;
                        padding: 10px 20px;
                        text-decoration: none;
                        border-radius: 5px;
                    }
                    h1 {
                        color: #333;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>You are verifying your Email</h1>
                    <p>Dear ' . $username . ': <br> You are sign up / reset password on our website PetHome, 
                    please click the button below to verify your Email address. 
                    We appreciate your trust and will continuously provide top service for you! <br>
                    If it is not operated by yourself, please ignore it and <a>report</a> to us!</p>
                    <a href="' . $verifyLink . '" class="verify-link">Verify</a>
                </div>
            </body>
            </html>';     
                
            $mail->AltBody = '如果邮件客户端不支持HTML则显示此内容';

            $mail->send();
            // echo '<script>alert("邮件发送成功");</script>';
            // header('Location: Login Page.php');
            echo '<script>
                    alert("Send email successfully");
                    window.location.href="Login Page.php";
                </script>';
            exit; // 确保后续代码不会被执行
        } catch (Exception $e) {
            echo '邮件发送失败: ', $mail->ErrorInfo;}
    } 
    else {
        echo '<script>alert("Signup failed!");</script>';
    }

}
$stmt->close();
$conn->close();


?>