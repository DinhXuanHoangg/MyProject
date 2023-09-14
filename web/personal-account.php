<?php 
    include('connect.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Admin page</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/admin.css">
        
    </head>
    <body>
        <!-- header area start -->
        <header>
        <div class="left_area">
            <a href="home.php" class="logo"><img src="images/1548659599290.png"></a>
            <!-- <h3>coding <span>Snow</span></h3> -->
        </div>
        <div class="right_area">
            <a href="logout.php" class="logout_btn">Logout</a>
        </div>
        </header>
        <div class="sidebar">
            <center>
                <img src="./images/ava-admin.png" class="profile_image" alt="">
                <h4><?= $_SESSION['UserName']?></h4>
            </center>
            <a href="#course"><i class="far fa-calendar-alt"></i><span>Course</span></a>
            <a href="#change-infomation"><i class="fas fa-user-cog"></i><span>Change Infomation</span></a>
                 
        </div>

        <!-- header area end -->
        <?php 
        include('connect.php');
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM account, member_course, course WHERE member_course.id = account.id AND member_course.c_id = course.c_id AND account.id = '$id' ";
        $result = mysqli_query($conn, $sql);
        ?>

        <table id="course" class="content-table" style="width: calc(100% - 250px);  margin-left: 250px;">
            <thead>
                <tr>
                    <th>Image Of Course</th>
                    <th>Course Name</th>
                    <th>Content</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    
                    <td><img height=100px src="./images/<?php echo $row['Image']; ?>"></td>
                    <td><?php echo $row['Heading']; ?></td>
                    <td><?php echo $row['Content']; ?></td>                    
                    <td>
                        <a href="function-personal.php?delete=<?php echo $row['m_id']; ?>"
                        class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
               


        <div class="create-account" id="change-infomation">
            <form action="function-personal.php" method="POST">
            <?php 
            include ('function-personal.php');
            ?>

                <input type="hidden" name="id" value="<?= $_SESSION['id']?>">

                <div class="form-group">
                <label>User Name</label></br>
                <input type="text" name="UserName" class="form-control" value="<?= $_SESSION['UserName']?>" placeholder="Enter user name" required>
                </div>

                <div class="form-group">
                <label>Password</label></br>
                <input type="password" name="PassWord" class="form-control" placeholder="Enter password" required>
                </div>

                <div class="form-group">
                <label>Phone number</label></br>
                <input type="text" name="PhoneNumber" class="form-control" value="<?= $_SESSION['PhoneNumber']?>" placeholder="Enter phone number" required>
                </div>

                <div class="form-group">
                <label>Address</label></br>
                <input type="text" name="Address" class="form-control" value="<?= $_SESSION['Address']?>" placeholder="Enter address" required>
                </div>

                <div class="form-group">
                <label>Email</label></br>
                <input type="email" name="Email" class="form-control" value="<?= $_SESSION['Email']?>" placeholder="Enter email" required>
                </div>


                <div class="form-group">
                <button type="submit" name="update">Change</button>
                </div>                
                
            </form>
        </div>
    </body>

</html>