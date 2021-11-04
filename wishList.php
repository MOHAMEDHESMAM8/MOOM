<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/wishlist.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="fontawesome\css\fontawesome.min.css">
    <title>WishList</title>
</head>
<body>
<?php
include 'includes/navbar.php';
?>
<div class="container">
    <?php 
     if(isset($_GET['remove'])){
        $id=$_GET['remove'];
        $query = "DELETE FROM wishlist WHERE wish_id = ?";        
        $delete = $db->prepare($query);
        $result = $delete->execute(array($id));
    }

    $query=" SELECT P.product_name,P.product_price,P.product_id,P.product_img1,w.wish_id FROM products P INNER JOIN wishlist w ON P.product_id=w.product_id WHERE w.user_id=?";
    $connect=$db->prepare($query);
    $connect->execute([ $_SESSION['ID']]);

    
while($row=$connect->fetch(PDO::FETCH_ASSOC)){
        ?>
    <div class="card">
    <a href="single-product.php?id=<?php echo $row["product_id"];?>" style="color:black;" >
        <div class="conter">
            <img src="uploads\Images\<?php echo $row["product_img1"];?>">
            <div class="info">
                <h2><?php echo $row["product_name"];?></h2>
                <p>$<?php echo $row["product_price"];?></p>
                <p><a href="?remove=<?php echo $row["wish_id"];?>">remove</a></p>
                <input type="hidden" value="<?php echo $row["product_id"];?>">
                <button>Add to cart</button>
            </div>
        </div>
    </a>
    </div>
<?php
}
?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="js\add-to-cart.js"></script>
<?php include 'includes/footer.php'; ?>
     
</body>
</html>