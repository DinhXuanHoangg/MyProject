<?php
    include('connect.php');


    $id = 0;

    $Note = '';
    $StaffName = '';



    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $Service = $_POST['Service'];
        $Message = $_POST['Message'];
        
            $sql = "INSERT INTO support (id, Service, Message) VALUES('$id', '$Service', '$Message') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: support.php");
            }
            else{
                echo 'error sql';
            }
        
    }

    if(isset($_GET['note'])){
        $id = $_GET['note'];

        $sql = "SELECT * FROM support WHERE s_id = $id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1){
            $row = $result->fetch_array();
            $Note = $row['Note'];
            $StaffName = $row['StaffName'];
        }

        else{
            echo 'error edit';
        }
    }

    //Update

    if(isset($_POST['add'])){
        $id = $_POST['s_id'];
        $Note = $_POST['Note'];
        $StaffName = $_POST['StaffName'];
                                        
        $sql= "UPDATE support SET Note='$Note', StaffName ='$StaffName' WHERE s_id=$id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: admin-support.php");
        }
        else{
            echo 'error sql';
        }
    }
?>