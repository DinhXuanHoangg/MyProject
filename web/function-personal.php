<?php
    include('connect.php');

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM member_course WHERE m_id=$id";
        $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: personal-account.php");
            }
            else{
                echo 'error sql';
            }
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $Address = $_POST['Address'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['Email'];
        $UserName = $_POST['UserName'];
        $PassWord = $_POST['PassWord'];

        $PassWord=md5($PassWord);

        $sql= "UPDATE account SET UserName='$UserName', Password='$PassWord', Address='$Address', PhoneNumber='$PhoneNumber', Email='$Email' WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: personal-account.php");
        }
        else{
            echo 'error sql';
        }
    }



?>