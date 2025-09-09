<?php
@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};


if(isset($_POST['order'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street']);
    $placed_on = date('d-M-Y');

        $cart_total = 0;
        $cart_products[] = '';

        $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($cart_query) > 0){
            while($cart_item = mysqli_fetch_assoc($cart_query)){
                $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
                $sub_total = ($cart_item['price'] * $cart_item['quantity']);
                $cart_total += $sub_total;
            }
        }

        $total_products = implode(', ',$cart_products);

        $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND username = '$username' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

        if($cart_total == 0){
            header('location:checkout.php');

        }elseif(mysqli_num_rows($order_query) > 0){
            header('location:checkout.php');
        }else{
            mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, username, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$username', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
            mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $message[] = 'order placed successfully!';

            header('location:my_orders.php');
            
        }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>checkout order</h3>
    <h1 class="title">- checkout -</h1>
</section>



<section class="checkout">

    <form action="" method="POST">

        <div class="flex">
            <div class="inputBox">
                <span>your name :</span>
                <input type="text" name="name" placeholder="enter your name" required >
            </div>
            <div class="inputBox">
                <span>phone number :</span>
                <input type="number" name="number" min="0" placeholder="enter your number" required>
            </div>
            <div class="inputBox">
                <span>your username :</span>
                <input type="text" name="username" placeholder="enter username" required>
            </div>
            <div class="inputBox">
                <span>payment method :</span>
                <select name="method">
                    <option value="cash on delivery">cash on delivery</option>
                </select>
            </div>
            <div class="inputBox">
                <span>address line 01 :</span>
                <input type="text" name="flat" placeholder="e.g. flat no." required>
            </div>
            <div class="inputBox">
                <span>address line 02 :</span>
                <input type="text" name="street" placeholder="e.g.  streen name" >
            </div>
            <div class="inputBox">
                <span>city :</span>
                <input type="text" name="city" placeholder="e.g. mumbai">
            </div>
            
        </div>

        <input type="submit" name="order" value="order now" class="button">

    </form>

</section>






<?php @include 'footer.php'; ?>


</body>
</html>