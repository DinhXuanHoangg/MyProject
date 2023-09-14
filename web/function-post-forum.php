<?php
    include('connect.php');

    $update = false;
    $id = 0;

    $Image = '';
    $Heading = '';
    $Content = '';


// Add
    if(isset($_POST['save'])){
        $Image = $_POST['f_Image'];
        $Heading = $_POST['f_Heading'];
        $Content = $_POST['f_Content'];

        
            $sql = "INSERT INTO forum (f_Image, f_Heading, f_Content) VALUES('$Image', '$Heading', '$Content') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: admin-post-forum.php");
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
        $sql = "DELETE FROM forum WHERE f_id=$id";
        $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: admin-post-forum.php");
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
        $sql = "SELECT * FROM forum WHERE f_id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1){
            $row = $result->fetch_array();
            $Image = $row['f_Image'];
            $Heading = $row['f_Heading'];
            $Content = $row['f_Content'];
        }

        else{
            echo 'error edit';
        }
    }

// Update
    if(isset($_POST['update'])){
        $id = $_POST['f_id'];
        $Image = $_POST['f_Image'];
        $Heading = $_POST['f_Heading'];
        $Content = $_POST['f_Content'];

        $sql= "UPDATE forum SET f_Image='$Image', f_Heading='$Heading', f_Content='$Content' WHERE f_id=$id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: admin-post-forum.php");
        }
        else{
            echo 'error sql';
        }
    }

?>