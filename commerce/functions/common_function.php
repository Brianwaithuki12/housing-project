<?php 
//include connect file
// include('./includes/connect.php');

//getting products

function getproducts(){
    global $conn;

    //condition to check isset or not

    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){

      
    
    $select_query= "Select * from `products` order by rand() limit 0,9";
    $result_query=mysqli_query($conn,$select_query);

    // $row=mysqli_fetch_assoc($result_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo " <div class='col-md-4 mb-2'>
              <div class='card'>
                   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                   <h5 class='card-title'>$product_title</h5>
                   <p class='card-text'>$product_description</p>
                   <p class='card-text'>Price: $product_price/-</p>
                   <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                   <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
      </div>";
    }

    }}}

    //getting all products

    function get_all_products(){
      global $conn;

      //condition to check isset or not
  
      if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
  
        
      
      $select_query= "Select * from `products` order by rand()";
      $result_query=mysqli_query($conn,$select_query);
  
      // $row=mysqli_fetch_assoc($result_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo " <div class='col-md-4 mb-2'>
                <div class='card'>
                     <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                     <div class='card-body'>
                     <h5 class='card-title'>$product_title</h5>
                     <p class='card-text'>$product_description</p>
                     <p class='card-text'>Price: $product_price/-</p>
                     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                     <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
  </div>
  </div>
        </div>";
      }
  
      }}

    }

    //getting unique categories
    function get_unique_categories(){
        global $conn;
        //condition to check isset or not
        if(isset($_GET['category'])){
         $category_id=$_GET['category']; 
        $select_query= "Select * from `products` where category_id=$category_id";
        $result_query=mysqli_query($conn,$select_query);

        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows == 0){
            echo "<h2 class='text-center text-danger'>No services for that category</h2>";
        }
        // $row=mysqli_fetch_assoc($result_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo " <div class='col-md-4 mb-2'>
                  <div class='card'>
                       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                       <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <p class='card-text'>Price: $product_price/-</p>
                       <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
          </div>";
        }
    
        }}


        //getting unique brands
    function get_unique_brands(){
        global $conn;
        //condition to check isset or not
        if(isset($_GET['brand'])){
         $brand_id=$_GET['brand']; 
        $select_query= "Select * from `products` where brand_id=$brand_id";
        $result_query=mysqli_query($conn,$select_query);

        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows == 0){
            echo "<h2 class='text-center text-danger'>No services for that brand</h2>";
        }
        // $row=mysqli_fetch_assoc($result_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo " <div class='col-md-4 mb-2'>
                  <div class='card'>
                       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                       <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <p class='card-text'>Price: $product_price/-</p>
                       <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
          </div>";
        }
    
        }}


//displaying brands in side nav
function getbrands(){
    global $conn;
    $select_brands ="Select * from `brands`";
    $result_brands=mysqli_query($conn,$select_brands);
    while($row_data=mysqli_fetch_assoc($result_brands)){
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      echo  " <li class='nav-item'>
      <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
  </li>";
    }
}
//get categories

function getcategories(){
    global $conn;
    $select_categories ="Select * from `categories`";
          $result_categories=mysqli_query($conn,$select_categories);
          while($row_data=mysqli_fetch_assoc($result_categories)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];
            echo  " <li class='nav-item'>
            <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>";
          }
}

//searching products

function searchproduct(){
    global $conn;
    if(isset($_GET['search_data_product'])){

    $search_data_value=$_GET['search_data'];
    $search_query ="Select * from `products` where product_keywords like '%$search_data_value%'";
    $result_query=mysqli_query($conn,$search_query);
    
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows == 0){
        echo "<h2 class='text-center text-danger'>No results match</h2>";
    }
    // $row=mysqli_fetch_assoc($result_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo " <div class='col-md-4 mb-2'>
              <div class='card'>
                   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                   <h5 class='card-title'>$product_title</h5>
                   <p class='card-text'>$product_description</p>
                   <p class='card-text'>Price: $product_price/-</p>
                   <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                   <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
      </div>";
    } }}

    //view details function

    function view_details(){
      global $conn;

    //condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){

      $product_id=$_GET['product_id'];
    
    $select_query= "Select * from `products` where product_id=$product_id";
    $result_query=mysqli_query($conn,$select_query);

    // $row=mysqli_fetch_assoc($result_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_image1=$row['product_image1'];
      $product_image2=$row['product_image2'];
      $product_image3=$row['product_image3'];
      $product_price=$row['product_price'];
      $category_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      echo " <div class='col-md-4 mb-2'>
              <div class='card'>
                   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                   <h5 class='card-title'>$product_title</h5>
                   <p class='card-text'>$product_description</p>
                   <p class='card-text'>Price: $product_price/-</p>
                   <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                   <a href='index.php' class='btn btn-secondary'>Go home</a>
</div>
</div>
      </div>
      
      <div class='col-md-8'>
      <!-- related images -->
      <div class='row'>
          <div class='col-md-12'>
              <h4 class='text-center text-info mb-5'>Related products</h4>
          </div>
          <div class='col-md-6'>
          <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
          </div>
          <div class='col-md-6'>
          <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
          </div>
      </div>
    </div>  ";
    }
  }
    }}

    }
    //get IP_adress function
    function getIPAddress() {  
      //whether ip is from the share internet  
       if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                  $ip = $_SERVER['HTTP_CLIENT_IP'];  
          }  
      //whether ip is from the proxy  
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
       }  
  //whether ip is from the remote address  
      else{  
               $ip = $_SERVER['REMOTE_ADDR'];  
       }  
       return $ip;  
  }  
  // $ip = getIPAddress();  
  // echo 'User Real IP Address - '.$ip;  

  // cart function
  function cart(){
     if(isset($_GET['add_to_cart'])){
      global $conn;
      $ip = getIPAddress();
      $get_product_id = $_GET['add_to_cart'];
      $select_query="Select * from `cart_details` where ip_address='$ip' and product_id =$get_product_id";
      $result_query=mysqli_query($conn,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows > 0){
          echo "<script>alert('Item already in cart')</script>";
          echo "<script>window.open('index.php','_self)</script>";
      }else{
        $insert_query= "Insert into `cart_details` 
        (product_id,ip_address,quantity) values($get_product_id,'$ip',0) ";
        $result_query=mysqli_query($conn,$insert_query);
        echo "<script>alert('Item is added in cart')</script>";
        echo "<script>window.open('index.php','_self)</script>";

      }
     }
  }

  //function to get cart item number
    function cart_item(){
      if(isset($_GET['add_to_cart'])){
        global $conn;
        $ip = getIPAddress();
        
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($conn,$select_query);
        $count_items=mysqli_num_rows($result_query);
      }else{
        global $conn;
        $ip = getIPAddress();
        
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($conn,$select_query);
        $count_items=mysqli_num_rows($result_query);
  
        }

        echo $count_items;
       }

       //total price function

    function total_cart_price(){
      global $conn;
      $ip = getIPAddress();
      $total = 0;
      $cart_query = "Select * from `cart_details` where ip_address='$ip'";
      $result=mysqli_query($conn,$cart_query);
      while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products = "Select * from `products` where product_id='$product_id'";
        $result_products = mysqli_query($conn,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price = array($row_product_price['product_price']);
          $product_values=array_sum($product_price);
          $total+=$product_values;
      }
    }
    echo $total;
  }

  // get user order details

  function get_user_order_details(){
    global $conn;
    $username=$_SESSION['username'];
    $get_details= "Select * from `user_table` where username='$username'";
    $result_query = mysqli_query($conn,$get_details);
    while($row_query = mysqli_fetch_array($result_query)){
      $user_id = $row_query['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
          if(!isset($_GET['delete_account'])){
            $get_orders="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
            $result_orders_query = mysqli_query($conn,$get_orders);
            $row_count=mysqli_num_rows($result_orders_query);
            if($row_count > 0){
              echo "<h3 class='text-center text-success mt-5 mb-2'>
              You have <span class = 'text-danger'>$row_count</span> pending orders</h3>
              <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order details</a></p>
              ";
              
            }else{
              echo "<h3 class='text-center text-success mt-5 mb-2'>
              You have <span class = 'text-danger'>0</span> pending orders</h3>
              <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>
              ";
            }
          }
        }
      }
    }
  }
?>