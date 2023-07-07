<!--connection file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart details</title>
    <!--bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
    crossorigin="anonymous">

    <!--font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file -->
    <link rel="stylesheet" href="style.css">

    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
  </head>
  <body>
   <!-- nav-bar -->
   <div class="container-fluid p-0">
    <!--first child -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- calling cart function -->

<?php  
cart();
 ?>
<!--second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">

        <?php 
        if(!isset($_SESSION['username'])){
          echo " <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li> ";
        }else{
          echo " <li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
        </li> ";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/users_login.php'>Login</a>
        </li> ";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
        </li> ";
        }
        
        ?>    
    </ul>
</nav>
<!--third child -->
<div class="bg-light">
    <h3 class="text-center">Hidden store</h3>
    <p class="text-center">"To know you're close to the end is a kind of freedom.
         Good time to take... inventory." – Captain Price.</p>
</div>
<!--fourth child table-->

<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">

                <!-- php code to display dynamic data -->
                <?php   
               
                $ip = getIPAddress();
                $total = 0;
                $cart_query = "Select * from `cart_details` where ip_address='$ip'";
                $result=mysqli_query($conn,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count >0 ){
                 echo" <thead>
                 <tr>
                     <th>Product title</th>
                     <th>Product image</th>
                     <th>Quantity</th>
                     <th>Total Price</th>
                     <th>Remove</th>
                     <th colspan='2'>Operations</th>
                 </tr>
             </thead>  <tbody>";
                
                while($row=mysqli_fetch_array($result)){
                  $product_id=$row['product_id'];
                  $select_products = "Select * from `products` where product_id='$product_id'";
                  $result_products = mysqli_query($conn,$select_products);
                  while($row_product_price=mysqli_fetch_array($result_products)){
                    $product_price = array($row_product_price['product_price']);
                    $price_table = $row_product_price['product_price'];
                    $product_title = $row_product_price['product_title'];
                    $product_image1 = $row_product_price['product_image1'];
                    $product_values=array_sum($product_price);
                    $total+=$product_values;
              
                
                
                ?>
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1?>" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php  
                     $ip = getIPAddress();
                     if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
                        $result_products_quantity = mysqli_query($conn,$update_cart);
                        $total=$total*$quantities;
                     }
                    
                    ?>
                    <td><?php echo $price_table?></td>
                    <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id ?>"></td>
                    <td class="d-flex">
                       
                       <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" 
                       name="update_cart">
                       <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" 
                       name="remove_cart">
                    </td>
                </tr>

                <?php }}}
                else{
                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                }
                ?>
            </tbody>
        </table>
        <!-- subtotal -->

        <div class="d-flex mb-3">
            <?php 
              $ip = getIPAddress();
              $cart_query = "Select * from `cart_details` where ip_address='$ip'";
              $result=mysqli_query($conn,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count >0 ){

                echo" <h4 class='px-3'>
                Subtotal:<strong class='text-info'> $total</strong>
            </h4>
            <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' 
             name='continue_shopping'>
            <button class='bg-secondary p-3 py-2 border-0' ><a href='./users_area/checkout.php' 
            class='text-light text-decoration-none'>Checkout</a></button>";
              }else{
                echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' 
                 name='continue_shopping'>";
              }
            if(isset($_POST['continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
            }
            ?>
        
        </div>
    </div>
</div>
</form>

<!-- function to remove item -->

<?php 
function remove_cart_item(){
    global $conn;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['remove_item'] as $remove_id){
          echo $remove_id;
          $delete_query = "Delete from `cart_details` where product_id=$remove_id";
          $run_delete = mysqli_query($conn,$delete_query);
          if($run_delete){
            echo "<script>window.open('cart.php','_self')</script>";
          }
  }
    }
}
echo $remove_item=remove_cart_item();
?>

<!--last-child -->
<!-- include footer -->

<?php 
 include("./includes/footer.php")
?>

   </div>  
    <!--bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
    crossorigin="anonymous"></script>
  </body>
</html>