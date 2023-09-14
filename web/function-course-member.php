<?php
    include('connect.php');

    $update = false;
    $id = 0;

    $UserName = '';
    $Heading = '';


    // add

    if(isset($_POST['save'])){
        $UserName = $_POST['UserName'];
        $Heading = $_POST['Heading'];


            $sql = "INSERT INTO member_course (id, c_id) SELECT id, c_id FROM account, course WHERE UserName = '$UserName' AND Heading = '$Heading' ";
            // $sql = "INSERT INTO account (UserName, Password, Address, PhoneNumber, Email, Role) VALUES('$UserName', '$PassWord', '$Address', '$PhoneNumber', '$Email', '$Role') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: admin-course-member.php");
            }
            else{
                echo 'error sql';
            }
        
    }

    // delete

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM member_course WHERE m_id=$id";
        $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: admin-course-member.php");
            }
            else{
                echo 'error sql';
            }
    }

    //edit

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update =true;
        $sql = "SELECT * FROM account, member_course, course WHERE member_course.id = account.id AND member_course.c_id = course.c_id AND m_id = $id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1){
            $row = $result->fetch_array();
            $UserName = $row['UserName'];
            $Heading = $row['Heading'];
        }

        else{
            echo 'error edit';
        }
    }

    //Update

    if(isset($_POST['update'])){
        $id = $_POST['m_id'];
        $UserName = $_POST['UserName'];
        $Heading = $_POST['Heading'];
                                        
        $sql= "UPDATE member_course SET c_id = (SELECT c_id FROM course WHERE course.Heading='$Heading'), id = (SELECT id FROM account WHERE account.UserName='$UserName') WHERE m_id=$id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: admin-course-member.php");
        }
        else{
            echo 'error sql';
        }
    }




?>