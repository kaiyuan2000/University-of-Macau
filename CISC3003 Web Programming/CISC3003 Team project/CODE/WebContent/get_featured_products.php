<?php
    session_start(); // 开始或继续会话
  // 创建数据库连接
  $conn = new mysqli("localhost", "root", "", "webproject", 3306);
  if ($conn->connect_error) {
      die("Fail to connect the mysql server " . $conn->connect_error);
  }

    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $featured_products = $stmt->get_result();

    // $stmt_dog = $conn->prepare("SELECT * FROM products_dog LIMIT 12");
    // $stmt_dog->execute();
    // $featured_products_dog = $stmt_dog->get_result();

    // $stmt_sup = $conn->prepare("SELECT * FROM products_sup LIMIT 12");
    // $stmt_sup->execute();
    // $featured_products_sup = $stmt_sup->get_result();

?>