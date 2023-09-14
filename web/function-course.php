<?php
    include('connect.php');

    $update = false;
    $c_id = 0;

    $Image = '';
    $Heading = '';
    $Content = '';
    $Description = '';
    $Price = '';

// Add
    if(isset($_POST['save'])){
        $Image = $_POST['Image'];
        $Heading = $_POST['Heading'];
        $Content = $_POST['Content'];
        $Description = $_POST['Description'];
        $Price = $_POST['Price'];

        
            $sql = "INSERT INTO course (Image, Heading, Content, Description, Price) VALUES('$Image', '$Heading', '$Content', '$Description', '$Price') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: admin-course.php");
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
        $sql = "DELETE FROM course WHERE c_id=$id";
        $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: admin-course.php");
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
        $sql = "SELECT * FROM course WHERE c_id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1){
            $row = $result->fetch_array();
            $Image = $row['Image'];
            $Heading = $row['Heading'];
            $Content = $row['Content'];
            $Description = $row['Description'];
            $Price = $row['Price'];
        }

        else{
            echo 'error edit';
        }
    }

// Update
    if(isset($_POST['update'])){
        $id = $_POST['c_id'];
        $Image = $_POST['Image'];
        $Heading = $_POST['Heading'];
        $Content = $_POST['Content'];
        $Description = $_POST['Description'];
        $Price = $_POST['Price'];

        $sql= "UPDATE course SET Image='$Image', Heading='$Heading', Content='$Content', Description='$Description', Price='$Price' WHERE c_id=$id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: admin-course.php");
        }
        else{
            echo 'error sql';
        }
    }

?>