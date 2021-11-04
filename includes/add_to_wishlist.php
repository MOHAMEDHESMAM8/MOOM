<?php 
include "connect.php";
session_start();
if(isset($_POST['wish'])){

    
    $query = "INSERT INTO wishlist (product_id, user_id) VALUES (?,?)";
    $connect= $db->prepare($query);
    $connect->execute([$_POST['id'],$_SESSION['ID']]);

    $count =$db->prepare("SELECT * FROM wishlist WHERE user_id=?");
    $count->execute([$_SESSION['ID']]);
    $num = $count->rowCount();
    if($num>0){
        echo $num;
    }
}
if(isset($_POST['single'])){

    
    $query = "INSERT INTO wishlist (product_id, user_id) VALUES (?,?)";
    $connect= $db->prepare($query);
    $connect->execute([$_POST['id'],$_SESSION['ID']]);

    $count =$db->prepare("SELECT * FROM wishlist WHERE user_id=?");
    $count->execute([$_SESSION['ID']]);
    $num = $count->rowCount();
    if($num>0){
        echo $num;
    }
}

