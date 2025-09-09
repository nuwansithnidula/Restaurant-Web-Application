<?php
@include 'config.php';

session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom admin css file link  -->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <?php include('header.php');?>
<!-- home section  -->
    <div class="home">
            <div class="content">
                <h1>Enjoy <span>Delicious Food </span> in Your Healthy Life. </h1>
                <br>
                <p>Tasty Food Restaurant has earned a reputation as one of the restaurants in Sri Lanka that serves delicious and high quality food and drinks. Our aim is to provide you with quality and safe delicious food and drinks.</p>
                <br>
                <a href="https://www.youtube.com/watch?v=OuY-zJy_fBw" target='blank'><button class="button"> visit Now </button></a>
                
            </div>
            <img src="./image/logo.png" alt="">

    </div>

<!-- heme section end  -->

<!-- food item sub-menu  -->
<div class="food_items">
        <div class="item">
            <img src="./image/mainfoods.jpg" alt="">
            <div class="item-content">
                <h3> Main foods</h3>
                <p> You can see the our main food here.</p>
                <br>
            </div>
        </div>

        <div class="item">
            <img src="./image/appetizers.jpg" alt="food_img">
            <div class="item-content">
                <h3> Appetizers</h3>
                <p> You can see the our appetizers here.</p>
                <br>
                <a href="main_manu.php"><button class="button2"> See Menu</button></a>


            </div>
        </div>

        <div class="item">
            <img src="./image/baverages.jpg" alt="food_img">
            <div class="item-content">
                <h3> Baverages</h3>
                <p> You can see the our baverages here.</p>
                <br>
            </div>
        </div>

    </div> 
<!-- food item sub-menu end -->

<!-- why people choose us  -->
    <div class="main_slide2">
        <div class="foodimg">
            <img src="./image/chooseUs.png" alt="why_img" >
        </div>
      
        <div class="question">
            <div>
                <h2>Why Pople Choose Us?</h2>
            </div>
            <div>
                <div class="q-ans">
                        
                        <h4><i class="fa-solid fa-snowflake"></i>  Delicious Food </h4>
                        <p> Our dishes are crafted with care and bursting with flavor, making every bite memorable.</p>

                </div>

                <div class="q-ans">

                        <h4><i class="fa-solid fa-snowflake"></i>  Fresh Ingredients </h4>
                        <p> We source the freshest, highest quality ingredients to create dishes that are both delicious and wholesome.</p>

                </div>

                <div class="q-ans">

                        <h4><i class="fa-solid fa-snowflake"></i>  Health-Conscious Options</h4>
                        <p> Whether you're vegetarian, vegan, or gluten-free, we have delicious options to suit every dietary preference and restriction.</p>
                </div>

                

            </div>
               
        </div>
    </div>

<!-- why people choose us end -->


<!-- favaurite food items  -->
<div class="maim_slide3">
        <div class="fav-head">
            <h3>Our Popular Food Items</h3>
            <p>Among the many dishes available in our restaurant, here are some of the most talked about dishes among customers.</p>
        </div>
        <div class="fav-food">
            <div class="item">
                <div>
                    <img src="./image/cheese koththu.jpg" alt="">
                </div>
                <h3>Koththu</h3>
                <P class="fav-price">LKR 1200.00</P>
            </div>
            <br>
            <div class="item">
                <div>
                    <img src="./image/mix-rice.jpg" alt="">
                </div>
                <h3>Mix-Rice</h3>
                <P class="fav-price">LKR 1450.00</P>
            </div>
            <br>
            <div class="item">
                <div>
                    <img src="image/seafood.jpg" alt="">
                </div>
                <h3>Seafood</h3>
                <P class="fav-price">LKR 1800.00</P>
            </div>
            <br>
            <div class="item">
                <div>
                    <img src="image/Noodles.jpg" alt="">
                </div>
                <h3>Noodles</h3>
                <P class="fav-price">LKR 750.00</P>
            </div>
        </div>
       
        <div class="dsgn"></div>
</div>
<!-- favaurite food items end -->

<!-- footer  -->
<?php include('footer.php')?>
<!-- footer end -->

</body>
</html>