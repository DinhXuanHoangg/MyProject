<?php 
    include('connect.php');
    session_start();
    if($_SESSION['Role'] != 'Admin' && $_SESSION['Role'] != 'Staff'){
        header("Location: home.php");
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>User Manage</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/admin.css">
        
    </head>
    <body>
        <!-- header area start -->
        <header>
        <div class="left_area">
            <a href="home.php" class="logo"><img src="images/1548659599290.png"></a>

        </div>
        <div class="right_area">
            <div class="search-box">
                <form method="POST">
                    <input class="sb-text" type="text" name="search" placeholder="Search...">
                    <input class="sb-sbm" type="submit" name="submit">
                </form>
            </div>
            <a href="logout.php" class="logout_btn">Logout</a>
        </div>
        
        </header>
        <div class="sidebar">
            <center>
                <img src="./images/ava-admin.png" class="profile_image" alt="">
                <h4><?=$_SESSION['UserName']?></h4>
            </center>
            <?php
                if ( $_SESSION['Role'] === 'Admin'){
                ?>
            <a href="admin-user.php#user-data"><i class="fas fa-users"></i><span>Users</span></a>
            
            <a href="admin-user.php#add-account"><i class="fas fa-user-plus"></i><span>Add Account</span></a>
            <?php } ?>
            <a href="admin-course.php"><i class="far fa-calendar-alt"></i><span>Course</span></a>
            <a href="admin-course-member.php"><i class="fas fa-user-graduate"></i><span>Course Member</span></a>
            <a href="admin-support.php"><i class="fas fa-question-circle"></i><span>Request Counselling</span></a>
            <a href="admin-post-forum.php"><i class="far fa-clipboard"></i><span>Post Forum</span></a>

            
        </div>

        <?php 
            include('connect.php');
            if(isset($_POST["submit"])){
                $str = $_POST["search"];
                if($str != ''){
                    $sql = "SELECT * FROM account WHERE UserName LIKE '%$str%' OR Address LIKE '%$str%' OR Role LIKE '%$str%' OR PhoneNumber LIKE '%$str%' OR Email LIKE '%$str%' ";
                }else{
                    $sql = "SELECT * FROM account";
                }
                $result = mysqli_query($conn, $sql);
                
                if(mysqli_num_rows($result) != 0){
                    ?>
                    <table id="user-data" class="content-table" style="width: calc(100% - 250px);  margin-left: 250px;">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Password</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($row = $result->fetch_assoc()):
                        ?>

                            <tr>
                                <td><?php echo $row['UserName']; ?></td>
                                <td><?php echo $row['Password']; ?></td>
                                <td><?php echo $row['Address']; ?></td>
                                <td><?php echo $row['PhoneNumber']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $row['Role']; ?></td>
                                <td>
                                    <a href="admin-user.php?edit=<?php echo $row['id']; ?>#add-account"
                                    class="btn btn-info">Edit</a>
                                    <a href="function-account.php?delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger" onclick="return confirm('Are you sure to delete this account?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                    <?php
                }
                else{
                    echo '<script>alert("No data")</script>';
                }
            }
        ?>

        <?php 
        include('connect.php');

        $sql = "SELECT * FROM account ";
        $result = mysqli_query($conn, $sql);
        ?>

        <table id="user-data" class="content-table" style="width: calc(100% - 250px);  margin-left: 250px;">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['UserName']; ?></td>
                    <td><?php echo $row['Password']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><?php echo $row['PhoneNumber']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Role']; ?></td>
                    <td>
                        <a href="admin-user.php?edit=<?php echo $row['id']; ?>#add-account"
                        class="btn btn-info">Edit</a>
                        <a href="function-account.php?delete=<?php echo $row['id']; ?>"
                        class="btn btn-danger" onclick="return confirm('Are you sure to delete this account?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
               


        <div class="create-account" id="add-account">
            <form action="function-account.php" method="POST">
            <?php 
            include ('function-account.php');
            ?>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                <label>User Name</label></br>
                <input type="text" name="UserName" class="form-control" value="<?php echo $UserName; ?>" placeholder="Enter user name" required>
                </div>

                <div class="form-group">
                <label>Password</label></br>
                <input type="password" name="PassWord" class="form-control" value="<?php echo $PassWord; ?>" placeholder="Enter password" required>
                </div>

                <div class="form-group">
                <label>Phone number</label></br>
                <input type="text" name="PhoneNumber" class="form-control" value="<?php echo $PhoneNumber; ?>" placeholder="Enter phone number" required>
                </div>

                <div class="form-group">
                <label>Address</label></br>
                <input type="text" name="Address" class="form-control" value="<?php echo $Address; ?>" placeholder="Enter address" required>
                </div>

                <div class="form-group">
                <label>Email</label></br>
                <input type="email" name="Email" class="form-control" value="<?php echo $Email; ?>" placeholder="Enter email" required>
                </div>

                <div class="form-group">
                <label>Role</label></br>
                <select name="Role">
                    <option value="<?php echo $Role; ?>"><?php echo $Role; ?></option>
                    <option value="Admin">Admin</option>
                    <option value="Guest">Guest</option>
                    <option value="Staff">Staff</option>
                </select>
                </div>

                <div class="form-group">
                <?php
                if ($update ==  true):
                ?>
                <button type="submit" name="update">Update</button>
                <?php else: ?>
                <button type="submit" name="save">Create</button>
                <?php endif; ?>
                </div>             
      
                
            </form>
        </div>

        <script src="js/jquery-3.3.1.js"></script>
        <script>
            $(document).ready(function(){

                
                $(".sb-sbm").click(function(e) {
                    if( $(".sb-text").val().length <= 0 ) {
                        e.preventDefault();
                    }

                    $(".sb-text").toggleClass("open");
                });
            });
        </script>
    </body>

</html>