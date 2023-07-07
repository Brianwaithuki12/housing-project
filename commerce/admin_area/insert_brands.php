<?php 
include('../includes/connect.php');
if(isset($_POST['insert_brands'])){
  $brand_title=$_POST['brand_title'];
  //select data from database to check if its already present in the database
  $select_query = "Select * from `brands` where brand_title='$brand_title'";
  $result_select=mysqli_query($conn,$select_query);
  $number=mysqli_num_rows($result_select); //get the number of rows of that particular result
  if($number>0){
    echo "<script>alert('brand already in database')</script>";
  }else{
  $insert_query="insert into `brands` (brand_title) values ('$brand_title')";
  $result =mysqli_query($conn,$insert_query);
  if($result){
    echo "<script>alert('brand has been added successfully')</script>";
  }
}
}
?>
<h2 class="text-center">INSERT BRANDS</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control"
   name="brand_title" placeholder="Insert Brands"
    aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brands" 
 value="Insert brands">
 
</div>
</form>