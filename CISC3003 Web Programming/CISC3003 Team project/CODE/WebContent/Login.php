<?php
session_start(); // 开始或继续会话

// 检查是否通过POST方法接收到了数据
if (isset($_POST['Email']) && isset($_POST['Password'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // 创建数据库连接
    $conn = new mysqli("localhost", "root", "", "webproject", 3306);
    if ($conn->connect_error) {
        die("Fail to connect the mysql server " . $conn->connect_error);
    }

    // 使用预处理语句来防止SQL注入
    $stmt = $conn->prepare("SELECT * FROM user WHERE Email = ?");
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // 检查密码是否匹配
        if (($Password == $row['Password'])) {
            // 检查是否已激活账户
            if($row['status'] > 0){
                // 密码匹配，设置会话变量
                $_SESSION['user_logged_in'] = true;
                $_SESSION['Email'] = $Email;
                // 如果是完成激活reset
                if($row['status'] == 2){
                    $updateStmt = $conn->prepare("UPDATE `user` SET status = 1 WHERE Email = ?");
                    $updateStmt->bind_param("s", $Email);
                }

                // 重定向到用户页面
                header('Location: user.php?Email=' . urlencode($Email));
                exit();
            }
            else{
                // 账户未激活
                // $_SESSION['login_error'] = 'account not activated';
                // header("Location: Login Page.php");
                echo '<script>
                    alert("account not activated, check your email");
                    window.location.href="Login Page.php";
                  </script>';
                exit();
            }
        } else {
            // 密码不匹配
            // $_SESSION['login_error'] = 'Email or password wrong';
            // header("Location: Login Page.html");
            // exit();
            echo '<script>
                    alert("Wrong Email or Password");
                    window.location.href="Login Page.php";
                  </script>';
            exit();
        }
    } else {
        // 找不到用户
        // $_SESSION['login_error'] = 'no such user';
        // header("Location: Login Page.php");
        echo '<script>
            alert("Not such user");
            window.location.href="Login Page.php";
            </script>';
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    // 没有接收到数据，重定向回登录页面
    header("Location: Login Page.html");
    exit();
}
?>

<?php
// 原来的，现在没用了
// if ( ( $_POST['Email'] != null ) && ( $_POST['Password'] != null ) ) {
//     $Email = $_POST['Email'];
//     $Password = $_POST['Password'];
//     $conn = new mysqli("localhost", "root", "", "webproject", 3306);
// 	mysqli_select_db($conn,'webproject');
    
//     $sql = "select * from user where Email = '$Email' ";
//     $res = mysqli_query($conn,$sql);
//     $row = mysqli_fetch_assoc($res);
//     if ($row['Password'] == ($Password)) {               //($row['Password'] == md5($Password))
//         //setcookie('Email',$Email,time()+10);
//         //setcookie('Password',$Password,time()+10);
//         echo("hello");
//         header('Location:user.php'."?Email=$Email?");
//     }
//     else{
//         header("Location:Login Page.html");
//         //back to login page
//     } 
// }
// else{
//     header("Location:Login Page.html");
//     //back to login page
// }

?>

