


<?php 
session_start();
include "connect.php";
if(isset($_POST['action'])){

    
    $query = "INSERT INTO cart (product_name, product_price, product_img,user_id) VALUES (?,?,?,?)";
    $connect= $db->prepare($query);
    $connect->execute([$_POST['name'], $_POST['price'], $_POST['img'], $_SESSION['ID']]);

    $count =$db->prepare("SELECT * FROM cart WHERE user_id=?");
    $count->execute([$_SESSION['ID']]);
    $num = $count->rowCount();
    if($num>0){
        echo $num;
    }
}elseif(isset($_POST['data'])){
    $query = "INSERT INTO cart (product_name, product_price, product_img,user_id) VALUES (?,?,?,?)";
    $connect= $db->prepare($query);
    $connect->execute([$_POST['single_name'], $_POST['single_price'], $_POST['single_img'],$_SESSION['ID']]);

    $count =$db->prepare("SELECT * FROM cart WHERE user_id=?");
    $count->execute([$_SESSION['ID']]);
    $num = $count->rowCount();
    if($num>0){
        echo $num;
    }
}elseif(isset($_POST['wish'])){

    ;
    $get=$db->prepare("SELECT product_name, product_price, product_img1 FROM products WHERE product_id=? ");
    $get->execute([$_POST['id']]);
    $data=$get->fetch();
    
     $data['product_name'];
    
     $query = "INSERT INTO cart (product_name, product_price, product_img,user_id) VALUES (?,?,?,?)";
     $connect= $db->prepare($query);
     $connect->execute([$data['product_name'], $data['product_price'], $data['product_img1'],$_SESSION['ID']]);
    
     $count =$db->prepare("SELECT * FROM cart WHERE user_id=?");
     $count->execute([$_SESSION['ID']]);
     $num = $count->rowCount();
     if($num>0){
         echo $num;
     }
        
    }
    ?>