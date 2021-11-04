<?php
include 'includes/navbar.php';
if (!isset($_SESSION['Username'])) {
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/single-product.css">
  <link rel="stylesheet" href="css/nav-bar.css">
  <link rel="stylesheet" href="css/footer.css">

  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="fontawesome\css\fontawesome.min.css">
  <title>Hello, world!</title>
</head>

<body>

  <?php
  
  include 'includes/connect.php';
  $product_id = $_GET['id'];
  $product_details_query = $db->prepare('SELECT * FROM products WHERE product_id = ?');
  $product_details_query->execute(array($product_id));
  $product_details = $product_details_query->fetchAll();
  ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12"> HOME &GT SHOP &GT WOMEN &GT WOMEN'S DRESS </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active"> <img class="d-block w-100" style=" max-height: 347px; " src="uploads/Images/<?php foreach ($product_details as $pro) {
                                                                                echo $pro['product_img1'];
                                                                              } ?>" alt="First slide"> </div>
            <div class="carousel-item "> <img class="d-block w-100" src="uploads/Images/<?php foreach ($product_details as $pro) {
                                                                                echo $pro['product_img2'];
                                                                              } ?>" style=" max-height: 347px; " alt="Second slide"> </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        </div>
      </div>
      <div class="col-md-6 ">
        <div class="row ">
          <h2 class="ajax-name"> <?php
                                  foreach ($product_details as $pro) {
                                    echo $pro['product_name'];
                                  } ?></h2>
        </div>
        <div class="row">
          <h1 class="ajax-price"><i class="fa fa-inr" aria-hidden="true"></i> <?php foreach ($product_details as $pro) {
                                                                                echo $pro['product_price'];
                                                                              } ?></h1>
          &nbsp; &nbsp;
          <h3><del>799</del></h3>
          &nbsp; &nbsp;
          <h2 class="text-success">20% off</h2>
        </div>
        <div class="row">
          <h3 class="text-warning"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></h3>
          <h5>1200 star rating and 250 reviews</h5>
        </div>
        <div class="row">
          <?php foreach ($product_details as $pro) {
            echo $pro['product_description'];
          } ?>
        </div>
        <div class="row">
          <h3 class="text-info"><i class="fa fa-map-marker" aria-hidden="true"></i></h3>
          <p style="font-size: 20px"> &nbsp; Downloaded Just Purchased | &nbsp; <span class="text-success">NO DOWNLOAD FEES</span> </p>
        </div>
        <div class="row">
          <h4>Size: &nbsp;</h4>
          54 mb
        </div>
        <div class="row">
          <h4>Languages Used: &nbsp; &nbsp; </h4>
          <?php foreach ($product_details as $pro) {
            echo '<a class="btn btn-primary text-light">' . $pro['lang_used'] . '</a>';
          } ?>
        </div>

        <div class="row">
          <h4>Seller: &nbsp; &nbsp;</h4>

          <?php
          $user_id = $db->prepare('SELECT user_id FROM products WHERE product_id = ?');
          $user_id->execute(array($product_id));
          $user_id_fetch = $user_id->fetch();

          $seller = $db->prepare('SELECT U.username, U.user_id, U.first_name, U.last_name FROM users U INNER JOIN products P ON U.user_id = P.user_id WHERE U.user_id = ?');
          $seller->execute(array($user_id_fetch['user_id']));
          $sellerFetch = $seller->fetch();

          ?>

          <p style="font-size: 18px"><a href="profile.php?id=<?php echo $sellerFetch['user_id'] ?>"><?php echo $sellerFetch['first_name'] . ' ' . $sellerFetch['last_name'] ?></p>
        </div>

        <div class="row">
          <input type="hidden" value="<?php echo $_GET['id'];?>">
          <button class="btn btn-primary mr-3 add-to-cart">Add To Cart <i class="fa fa-shopping-cart"></i></button>
          <button class="btn btn-danger add-to-wishlist">Add To Wishlist <i class="fa fa-heart"></i></button>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="row mt-5">
      <h2>Similar Products</h2>
    </div>

    <div class="row mt-5 justify-content-center">
    <?php
    $product_query = $db->prepare('SELECT * FROM products WHERE product_id = ?');
      $product_query->execute(array($product_id));
      $product_cat = $product_query->fetch();


      $query = $db->prepare('SELECT * FROM products WHERE product_subcategory = ? LIMIT 3');
      $query->execute(array($product_cat['product_subcategory']));
      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {?>
      <div class="col-md-3">
        <div class="card">
          <img class="card-img-top img-fluid" src="uploads/Images/<?php echo $row['product_img1'] ?>">
          <div class="card-title">
            <h4><?php echo $row['product_name'] ?></h4>
          </div>
          <div class="card-text">
            <?php echo $row['product_description'] ?><br /><br />
            <a class="btn btn-success text-light"> Buy Now</a> &nbsp; <a class="btn btn-danger text-light"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a> <br /><br />
          </div>
        </div>
      </div> <?php } ?>
    </div>


  </div>


  <div class="container mt-5 mb-5">
    
    

    <div class="row mb-5">
      <h2> Post Your Own Reviews</h2>
    </div>


    <form>
      <div class="form-group">
        <label for="review_comment">Enter Your Review Comment :-</label>
        <input type="textarea" class="form-control" id="review_comment" name="review_comment" placeholder="Enter Your Review Here ">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </div>




  <?php include 'includes/footer.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/add-to-cart.js"></script>
<script src="js/wish-ajax.js"></script>

</body>

</html>