<?php
    include('connect.php');

    $Image ='';
    $Heading ='';
    $Content='';
    $Description='';
    $Price='';

    if(isset($_GET['show'])){
        $id = $_GET['show'];
        $sql = "SELECT * FROM course WHERE c_id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1){
            $row = $result->fetch_array();
            $Image = $row['Image'];
            $Content = $row['Content'];
            $Description = $row['Description'];
            $Price = $row['Price'];
        }

        else{
            echo 'error show';
        }
    }

    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $c_id = $_POST['c_id'];

            $sql = "INSERT INTO member_course (id, c_id) VALUES('$id', '$c_id')";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: course.php");
            }
            else{
                echo 'error sql';
            }
        
    }

?>