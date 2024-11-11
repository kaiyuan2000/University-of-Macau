<div id="navbar">
    <div class="container">
        <div class="logo">
            <img src="../images/logo.jpg" alt="logo">
        </div>
        <nav class="menu">
            <ul id="menu_items">
                <li><a href="../WebContent/HomePage.php">Home</a></li>
                <li><a href="../WebContent/ForumPage.php">Forum</a></li>
                <li><a href="../WebContent/BlogPage.php">Blog</a></li>
                <!-- <li><a href="../WebContent/User Page.php">User</a></li> -->
                <li><a href="../WebContent/StorePage.php">Store</a></li>
            </ul>
        </nav>
        <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
            <div class="icon"><a href="user.php?Email=<?php echo $_SESSION['Email']; ?>"><i class="fa fa-user"></i>My profile &nbsp;</a></div>
            <div class="icon">
                <a href="logout.php"><i class="fa fa-sign-out"></i>Logout &nbsp;</a>
            </div>
        <?php else: ?>
            <div class="icon">
            <a href="../WebContent/Login Page.php"><i class="fa fa-right-to-bracket"></i>Login &nbsp;</a>
            </div>
        <?php endif; ?>
       
        <div class="icon">
            <a href="../WebContent/Signup Page.php"><i class="fa fa-user-plus"></i>SignUp &nbsp;</a>
        </div>
        <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
            <div class="icon">
                <a href="../WebContent/CartPage.php"><i class="fa-solid fa-cart-shopping"></i>Cart &nbsp;</a>
            </div>  
        <?php endif; ?>
        <!-- if click purchase, then need to login -->
       
        
        <div class="menu-icon" onClick="mentoggle()">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</div>
<script>
        var MenuItems = document.getElementById("menu_items");
        MenuItems.style.maxHeight = "0px";
        function mentoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>