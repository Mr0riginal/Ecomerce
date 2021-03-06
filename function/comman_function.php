<?php
// include connect file
include('./includes/connect.php');

//getting products
function getproducts(){
    global $con;

    //condition to cheak isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['barand'])){
    $select_query="select * from `products` order by rand() LIMIT 0,3";
        $result_query=mysqli_query($con,$select_query);
        // $row=mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
            <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='#' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
            </div>
          </div>
        </div>";
        }
}
}
}


//getting all products
function get_all_products(){
  global $con;

    //condition to cheak isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['barand'])){
    $select_query="select * from `products` order by rand()";
        $result_query=mysqli_query($con,$select_query);
        // $row=mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
            <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='#' class='btn btn-info'>Add to cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
            </div>
          </div>
        </div>";
        }
}
} 
}

//getting unique categories
function get_unique_categories(){
    global $con;

    //condition to cheak isset or not
    if(isset($_GET['category'])){
       $category_id=$_GET['category']; 
    $select_query="select * from `products` where category_id=$category_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
          echo "<h2 class='text-center text-danger'>No stork for this category</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
            <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='#' class='btn btn-info'>Add to cart</a>
              <a href='#' class='btn btn-secondary'>view more</a>
            </div>
          </div>
        </div>";
        }
}
}

//getting unique brand
function get_unique_brands(){
  global $con;

  //condition to cheak isset or not
  if(isset($_GET['brand'])){
     $brand_id=$_GET['brand']; 
  $select_query="select * from `products` where brand_id=$brand_id";
      $result_query=mysqli_query($con,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No stork for this category</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
          <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <a href='#' class='btn btn-info'>Add to cart</a>
            <a href='#' class='btn btn-secondary'>view more</a>
          </div>
        </div>
      </div>";
      }
}
}




//displaying brand in sidenav
function getbrands(){
    global $con;
    $select_brand="select * from `brands`";
              $result_brand=mysqli_query($con,$select_brand);
              while($row_data=mysqli_fetch_assoc($result_brand)){
                $brand_title=$row_data['brand_title'];
                $brand_id=$row_data['brand_id'];
                echo "<li class='nav-item '>
                <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
              </li>";
              }
}


//displaying category in sidenav
function getcategory(){
    global $con;
    $select_category="select * from `categories`";
              $result_category=mysqli_query($con,$select_category);
              while($row_data=mysqli_fetch_assoc($result_category)){
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo "<li class='nav-item '>
                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
              </li>";
              } 
}


//searching products function
function search_product(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
    $search_query="select * from `products` where products_keyword like '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        // $row=mysqli_fetch_assoc($result_query);
        // echo $row['product_title'];
        $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No Result Found. No product found on this category</h2>";
      }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card'>
            <img class='card-img-top' src='./admin_area/product_images/$product_image1' alt='$product_title'>
            <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <a href='#' class='btn btn-info'>Add to cart</a>
              <a href='#' class='btn btn-secondary'>view more</a>
            </div>
          </div>
        </div>";
        }
}
}


?>