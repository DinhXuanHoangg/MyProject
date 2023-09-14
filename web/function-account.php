<?php
    include('connect.php');

    $update = false;
    $id = 0;

    $Address = '';
    $PhoneNumber = '';
    $Email = '';
    $UserName = '';
    $PassWord = '';
    $Role = '';

// Add
    if(isset($_POST['save'])){
        $Address = $_POST['Address'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['Email'];
        $UserName = $_POST['UserName'];
        $PassWord = $_POST['PassWord'];
        $Role = $_POST['Role'];

        $PassWord = md5($PassWord);

        
            $sql = "INSERT INTO account (UserName, Password, Address, PhoneNumber, Email, Role) VALUES('$UserName', '$PassWord', '$Address', '$PhoneNumber', '$Email', '$Role') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: admin-user.php");
            }
            else{
                echo 'error sql';
            }
        
    }

    // else{
    //     echo 'error btn';
    // }

// Delete
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM account WHERE id=$id";
        $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: admin-user.php");
            }
            else{
                echo 'error sql';
            }
    }

    // else{
    //     echo 'error';
    // }

// Edit
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update =true;
        $sql = "SELECT * FROM account WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1){
            $row = $result->fetch_array();
            $Address = $row['Address'];
            $PhoneNumber = $row['PhoneNumber'];
            $Email = $row['Email'];
            $UserName = $row['UserName'];
            $PassWord = $row['Password'];
            $Role = $row['Role'];
        }

        else{
            echo 'error edit';
        }
    }

// Update
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $Address = $_POST['Address'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $Email = $_POST['Email'];
        $UserName = $_POST['UserName'];
        $PassWord = $_POST['PassWord'];
        $Role = $_POST['Role'];

        $PassWord=md5($PassWord);

        $sql= "UPDATE account SET UserName='$UserName', Password='$PassWord', Address='$Address', PhoneNumber='$PhoneNumber', Email='$Email', Role='$Role' WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: admin-user.php");
        }
        else{
            echo 'error sql';
        }
    }


?>