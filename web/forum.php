<?php 
    include('connect.php');
    session_start();

    if($_SESSION['UserName'] == ''){
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>TRUE INVEST</title>
        <link rel="stylesheet" href="css/forum.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <!-- logo -->
                    
                    <!--menu-->
                    <nav id="home-nav">
                        <a href="home.php" class="logo"><img src="images/1548659599290.png"></a>
                        <div class="menu-trigger">
                            <span class="span-1"></span>
                            <span class="span-2"></span>
                            <span class="span-3"></span>
                        </div>

                        <ul class="main-menu">
                            <li><a href="home.php">Home</a></li>

                        </ul>
                        
                        <div class="search-box">
                            <form>
                                <input class="sb-text" type="text" placeholder="tìm kiếm">
                                <input class="sb-sbm" type="submit">
                            </form>
                        </div>

                        <div class="user" style="Display: flex; ">
                            <a href="personal-account.php">
                            <i class="fas fa-user-circle" style="margin: auto 5px;"></i>
                            <h5 style="margin: auto 5px;"><?=$_SESSION['UserName']?></h5></a>
                            <a href="logout.php"><input class="btn btn-danger" type="submit" value="Logout"></a>
                        </div>


                    </nav>
                    <!--search-->
                    
                </div>
                <div class="menu-container">
                    <div class="container">
                        <ul id="menu" class="clearfix">
                            <!-- <li>
                                <a href="#">category</a>
                                <ul class="sub-menu">
                                    <li><a href="#">sub category</a></li>
                                    <li><a href="#">sub category</a></li>
                                    <li><a href="#">sub category</a></li>
                                    <li><a href="#">sub category</a></li>
                                </ul>
                            </li> -->
                            <li><a href="course.php">Course</a></li>
                            <li><a href="support.php">Support</a></li>
                            <li><a href="forum.php">Forum</a></li>
                            <?php
                                if ( $_SESSION['Role'] === 'Admin' || $_SESSION['Role'] === 'Staff'){
                            ?>
                            <li><a href="admin-user.php">Manager</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    <section id="baner-img">
        <div class="baner-content text-center">
            <h1>True Invets</h1>
            <p>Securities investment community</p>
            <p>Vietnam underlying securities</p>
             
        </div>
        <a class="btn-about" href="#post">More</a>
    </section>


    <!-- about -->
        <?php 
        include('connect.php');

        $sql = "SELECT * FROM forum ";
        $result = mysqli_query($conn, $sql);
        ?>




        <?php
            while ($row = $result->fetch_assoc()){
        ?>
    <div class="forum" id="post">
        
        <div class="forum-post">
            <h1><?php echo $row['f_Heading']; ?></h1>
            <div class="forum-image">
                <img src="./images/<?php echo $row['f_Image']; ?>" alt="">
            </div>
            <div class="forum-content">
                <p><?php echo $row['f_Content']; ?></p>
                <h5>Posted at: <?php echo $row['f_Time']; ?></h5>
            </div>
        </div>


        <div class="comment">
            <h1>Comment</h1>
            <?php 
                include('connect.php');

                $sql2 = "SELECT * FROM comment, account WHERE comment.id = account.id AND comment.f_id = '".$row['f_id']."' ";
                $result2 = mysqli_query($conn, $sql2);
            ?>
            <?php
                while ($rows = $result2->fetch_assoc()){
            ?>
            <div class="comment-box">
                <h3><?php echo $rows['UserName']; ?></h3>
                <p><?php echo $rows['Comment']; ?>
                </p>
                <h5><?php echo $rows['cmt_Time']; ?></h5>
            </div>

                <?php } ?>

            <div class="comment-box-input">
            <form action="function-comment.php" method="POST">
            <?php 
            include ('function-comment.php');
            ?>
            <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
            <input type="hidden" name="f_id" value="<?php echo $row['f_id'];?>">
            <textarea name="Comment" id="input-comment" cols="100" rows="10"></textarea>
            <button type="submit" name="save" class="send">Send</button>
            </form>
            </div>
            
        </div>
        <div style="height: 1px;"></div>
        
    </div>
        <?php } ?>



    </div>


        <script src="js/jquery-3.3.1.js"></script>
        <script>
            $(document).ready(function(){
                //code Jquery viết ở đây
                
                //phần menu
                $(".menu-trigger").click(function(){
                    $(".menu-container").toggleClass("open");
                    
                    $(".menu-trigger span").toggleClass("open");
                });
                
                //phần search
                
                $(".sb-sbm").click(function(e) {
                    if( $(".sb-text").val().length <= 0 ) {
                        e.preventDefault();
                    }
                    //theme bracket sweet dark
                    $(".sb-text").toggleClass("open");
                });
            });
        </script>
    </body>
    <footer id="info">
        <div class="footer-left">
            <div class="footer-logo"><img src="./images/logo-footer.png"></div>
            <ul class="footer-text">REAL INVESTMENT GROUP CORPORATION</ul>
            <ul class="footer-text">TRUE INVESTMENT CORP.,JSC</ul>
            <ul class="footer-text">Address: LK10-TT3, Dai Kim New Urban Area, Alley 765 Nguyen Xien, Hoang Mai, Hanoi</ul>

        </div>
        <div class="footer-mid">
            <ul class="footer-text" style="font-weight: bold;">Hotline: 0364570081</ul>
            <div class="footer-btn-link">
            <a href="https://www.facebook.com/trueinvest.daututhat"><img width="50px" height="50px" src="./images/fb-btn.png"></a>
            <a href="https://www.youtube.com/channel/UC0DzpK2m6rBI8upNcYEz2vA"><img width="50px" height="50px" src="./images/yt-btn.png"></a>
            </div>
        </div>
        <div class="footer-righ">
            <ul class="footer-text"></ul>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d931.3287079293767!2d105.81373772921984!3d20.98001335132335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad2a697d90b9%3A0x1ec9225291a9f4e2!2zxJDhuqd1IFTGsCBUaOG6rXQgLSBUcnVlIEludmVzdA!5e0!3m2!1svi!2s!4v1617635368440!5m2!1svi!2s" width="500px" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </footer>
</html>


