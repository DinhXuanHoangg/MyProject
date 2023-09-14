<?php
    include('connect.php');

// Add
    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $f_id = $_POST['f_id'];
        $Comment = $_POST['Comment'];

        
            $sql = "INSERT INTO comment (id, f_id, Comment) VALUES('$id', '$f_id', '$Comment') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: forum.php");
            }
            else{
                echo 'error sql';
            }
        
    }



?>