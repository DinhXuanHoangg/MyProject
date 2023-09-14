<?php 
include('connect.php');
session_start();

if(isset($_POST['UserName']) && isset($_POST['Password'])){
$UserName = $_POST['UserName'];
$Password = $_POST['Password'];

// ma hoa
$Password = md5($Password); 

        if (empty($UserName) || (empty($Password))){
            echo 'Please input username and pasword';
        }else{
            $sql = "SELECT * FROM account WHERE UserName ='$UserName' AND Password ='$Password' ";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                $rows = mysqli_fetch_assoc($result);

                if($rows['Role'] === 'Admin' || $rows['Role'] === 'Staff'){
                    $_SESSION['UserName'] = $rows['UserName'];
                    $_SESSION['PhoneNumber'] = $rows['PhoneNumber'];
                    $_SESSION['Email'] = $rows['Email'];
                    $_SESSION['Role'] = $rows['Role'];
                    $_SESSION['id'] = $rows['id'];
                    $_SESSION['Address'] = $rows['Address'];
                    header("Location: admin-user.php");
                }else{
                $_SESSION['UserName'] = $rows['UserName'];
                $_SESSION['PhoneNumber'] = $rows['PhoneNumber'];
                $_SESSION['Email'] = $rows['Email']; 
                $_SESSION['Role'] = $rows['Role'];   
                $_SESSION['id'] = $rows['id'];
                $_SESSION['Address'] = $rows['Address'];
                header("Location: home.php");
                }
            }else {
                echo 'Wrong username or password';
                header("Location: index.php");
                
            }            
        }
}
?>