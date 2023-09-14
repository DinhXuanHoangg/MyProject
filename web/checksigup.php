<?php
    include('connect.php');

    if(isset($_POST['reg'])){
        $Address = $_POST['Address'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['Email'];
        $UserName = $_POST['UserName'];
        $PassWord = $_POST['PassWord'];
        $Role = 'Guest';

        // ma hoa

        $PassWord = md5($PassWord);

        
            $sql = "INSERT INTO account (UserName, Password, Address, PhoneNumber, Email, Role) VALUES('$UserName', '$PassWord', '$Address', '$PhoneNumber', '$Email', '$Role') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: index.php");
            }
            else{
                echo ' something';
            }
        
    }

    else{
        echo 'dm quan';
    }




?>