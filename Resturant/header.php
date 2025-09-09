<header class="header">

    <div class="flex">

        <a href="home.php" class="logo">Tasty Resto.</a>

        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                
                <?php

                    if(isset($_SESSION['user_id'])){
                        echo '<li><a href="./main_manu.php">Oder Now</a></li>';
                        echo '<li><a href="./my_orders.php">My orders</a></li>';
                    }else{
                        echo '<li><a href="contact.php">Contact Us</a></li>';
                    }
                ?>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </nav>

        <div class="icons">
                    

            <?php
               if(isset($_SESSION['user_id'])){
                    $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                    $cart_num_rows = mysqli_num_rows($select_cart_count);
               }

            ?>


               
            <?php
                    if(isset($_SESSION['user_id'])){
                        echo '<a href="./cart.php" class="fas fa-shopping-cart cart" style="color:var(--textColor);"><span style="font-size:1rem;"> ( '.$cart_num_rows.' ) </span></a>
                        <button class="log-btn"><a href="./logout.php">Logout</a></button>';
                    }else{
                        echo '<button class="log-btn"><a href="./login.php">Login</a></button>';
                    }

                ?>
        </div>


    </div>

</header>