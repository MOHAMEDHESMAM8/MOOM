<?php
include "includes/connect.php";
session_start();
                    if(isset($_POST['save'])){
                        $user_data = $db->prepare('SELECT * FROM users WHERE username = ?');
                        $user_data->execute(array($_SESSION['Username']));
                        $get_user_data = $user_data->fetchAll();


                        $first_name  = $_POST['first_name'];
                        $last_name   = $_POST['last_name'];
                        $phone_no    = $_POST['phone_no'];
                        $bio         = $_POST['bio'];
                        $country     = $_POST['country'];
                        // $cover_img   = $_FILES['cover_img'];
                        // $profile_img = $_FILES['profile_img'];

                        $coverImg_filename = $_FILES['cover_img']['name'];
                        $profileImg_filename = $_FILES['profile_img']['name'];

                        
                        if( $_FILES['profile_img']['size'] !=0){
                        move_uploaded_file($_FILES['profile_img']['tmp_name'], "uploads/images/" . $profileImg_filename);

                        $profile_data = $db->prepare('UPDATE users SET first_name = ?, last_name = ?, phone_no = ?, bio = ?, country = ?, profile_pic = ? WHERE username = ?');
                        $profile_data->execute(array($first_name, $last_name, $phone_no, $bio, $country,  $profileImg_filename, $_SESSION['Username']));
                        header("Location: profile.php?id=" .$_SESSION["ID"]. "");
                        }else{
                        $profile_data = $db->prepare('UPDATE users SET first_name = ?, last_name = ?, phone_no = ?, bio = ?, country = ? WHERE username = ?');
                        $profile_data->execute(array($first_name, $last_name, $phone_no, $bio, $country, $_SESSION['Username']));
                        header("Location: profile.php?id=" .$_SESSION["ID"]. "");
                        }
                        if($_FILES['cover_img']['size'] !=0 ){
                            move_uploaded_file($_FILES['cover_img']['tmp_name'], "uploads/images/" . $coverImg_filename);
    
                            $profile_data = $db->prepare('UPDATE users SET  cover_pic = ? WHERE username = ?');
                            $profile_data->execute(array( $coverImg_filename, $_SESSION['Username']));
                            header("Location: profile.php?id=" .$_SESSION["ID"]. "");
                        }
    
                       
                        

                    }
                
                
                    ?>