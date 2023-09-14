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
        <title>Course</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/course.css">
        <link rel="stylesheet" href="./css/modal.css">
        <link rel="stylesheet" href="./css/slide.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>
    <body>
        <Header>
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
                            <!-- <li><a href="#about">About</a></li> -->
                            <li><a href="#group-item">Course</a></li>
                            <li><a href="#comment">Comment</a></li>
                            <li><a href="#info">Contact</a></li>
                        </ul>
                        
                        <div class="search-box">
                            <form>
                                <input class="sb-text" type="text" placeholder="tìm kiếm">
                                <input class="sb-sbm" type="submit">
                            </form>
                        </div>

                        <div class="user">
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
        </Header>
        <div class="baner">
                <div class="baner-content">
                    <div class="baner-img"><img height="450px" width="500px" src="./images/banner-01-1.png" alt=""></div>
                    <div class="baner-text">
                        <p>Hundreds of investors have chosen to follow the investment method of True Invest. With a highly applicable method in the Vietnamese market, it will definitely be a powerful helper on your stock investment path.</p>
                        <p>So are you ready to become the next smart investor to conquer success with True Invest?</p>
                    </div>
                </div>
        </div>

        <?php 
            include('connect.php');
            $sql = "SELECT * FROM course";
            $result = mysqli_query($conn, $sql);
        ?>


        <div class="group-item" id="group-item">
            <div class="heading">
                <h1>Course</h1>
            </div>
            <div class="course-info">
                <?php 
                    while ($row = $result->fetch_assoc()):
                ?>
                <div class="item">
                    <div class="info-img">
                        <img width="380px" height="220px" style="border-radius: 10px;" src="./images/<?php echo $row['Image'] ?>" alt="">
                    </div>
                    <div class="info-content">
                        <h1><?php echo $row['Heading']; ?></h1>
                        <p><?php echo $row['Content']; ?></p>
                        
                    </div>
                    <div class="info-button">
                        <a style="font-size: 20px;" class="btn btn-primary" href="course.php?show=<?php echo $row['c_id']; ?>#showinfo" role="button">More Info</a>
                    </div>

                    
                </div>

                <?php 
                    endwhile;
                ?>
            </div>

            <form action="function-showinfo.php" method="POST">
                <?php include ('function-showinfo.php') ?>
                    <div class="modal" id="showinfo">
                        <div class="modal__overlay">
                            <a href="#group-item" class="exit-showinfo"></a>
                        </div>

                        <div class="modal__body">
                            <div class="modal__inner">
                                <!-- content -->
                                <div class="modal-img">
                                    <img height="300px" style="border-radius: 20px;"  src="./images/<?php echo $Image; ?>" alt="">
                                </div>
                                <div class="modal-description">
                                    <p><?php echo $Description; ?></p>
                                </div>
                                <div style="font-size: 40px; margin: 0 50px; display: flex;">
                                    <label style="width: 430px; text-align: left;">Price: <?php echo $Price; ?> USD</label>
                 
                                    
                                    
                                    <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
                                    <input type="hidden" name="c_id" value="<?php echo $id; ?>">


                                    <button type="submit" name="save" onclick="return confirm('Are you sure to Register?')">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>            
        </div> 
        
        <div class="comment-about-course" id="comment">
            <div class="heading">
                <h1>Comment About Course</h1>
            </div>
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1">
                    <input type="radio" name="radio-btn" id="radio2">
                    <input type="radio" name="radio-btn" id="radio3">
                    <input type="radio" name="radio-btn" id="radio4">
                    <input type="radio" name="radio-btn" id="radio5">
                    <input type="radio" name="radio-btn" id="radio6">

                    <div class="slide first">
                        <div class="inslide">
                        <img src="./images/huyenmy.jpg" alt="">
                        <h3> - Participants of Protrade 20 and Investor courses - </h3>
                        <p>I officially returned to "Real Investment" since August after learning 1 basic course of True Invest, another course has not yet started. But after a while, I really see that the method that True Invest has come up with compensated for the shortcomings of 6 years ago. Thank you for having an interesting investment experience and getting quite good results as now.</p>
                        
                        <h4> Ms. Huyen My </h4>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="inslide">
                        <img src="./images/cmt2.png" alt="">
                        <h3> - Participants of Protrade 20 and Investor courses - </h3>
                        <p>I know Mr. Nguyen Hong Duc, Founder of True Invest - True Invest where I study Technical Analysis. I was impressed by his sharp mindset and his endless passion for market analysis. That led me to attend the course "Fundamental analysis and stock valuation" organized by him. For me the course is a new approach to the market, besides the traditional approach, next to the traditional approach is Technical Analysis. Standing on the shoulders of giants like Jesse Livermore, Richart Wyckoff, William O'Neil, Warren Buffett, Peter Lynch, along with Mr. Duc's experience in the market, I believe the knowledge from the course will help I have a lot to do with my personal investment.<p>
                        <h4>Ms. Kim Hung</h4>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="inslide">
                        <img src="./images/cmt3.png" alt="">
                        <h3> - Customers invest according to recommendations - </h3>
                        <p>Duc is a very good person, specialized in many years of research. Formerly a research manager with deep understanding of both Fundamental Analysis and Technical Analysis. The recommendations made by Germany have a clear basis and are effective. Thank you very much for knowing Duc and True Invest!</p>
                        <h4>Mr. Khanh Minh</h4>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="inslide">
                        <img src="./images/cmt4.png" alt="">
                        <h3> - A participant of Protrade 20 course - </h3>
                        <p>Mr. Duc's lecturer is very enthusiastic, and has very deep and wide knowledge not only in securities but also in other fields. If you really care about stocks and don't have too much time tracking digital boards then this is a great place to start.<p>
                        <h4>Mrs. Oanh Nguyen</h4>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="inslide">
                        <img src="./images/cmt5.png" alt="">
                        <h3> - Participants of Protrade 20 and Investor courses - </h3>
                        <p>An investment method that goes into the real value of the business, analysis, evaluation, not prediction. That is the true meaning of investment. Hope to learn more!</p>
                        <h4>Mr. Thanh Tung</h4>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="inslide">
                        <img src="./images/cmt6.png" alt="">
                        <h3> - Customers invest according to recommendations - </h3>
                        <p>Mr. Duc's lecturer is very enthusiastic, and has very deep and wide knowledge not only in securities but also in other fields. If you really care about stocks and don't have too much time tracking digital boards then this is a great place to start.</p>
                        <h4>Mr. Manh Long</h4>
                        </div>
                    </div>

                    <div class="navigation-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                        <div class="auto-btn4"></div>
                        <div class="auto-btn5"></div>
                        <div class="auto-btn6"></div>
                    </div>

                </div>

                <div class="navigation-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <label for="radio4" class="manual-btn"></label>
                    <label for="radio5" class="manual-btn"></label>
                    <label for="radio6" class="manual-btn"></label>
                </div>
            </div>
                <script>
                    var counter =1;
                    setInterval(function(){
                        document.getElementById('radio' + counter).checked = true;
                        counter++;
                        if(counter > 6){
                            counter = 1;
                        }
                    }, 5000);
                </script>
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
            <ul class="footer-text">CÔNG TY CỔ PHẦN TẬP ĐOÀN ĐẦU TƯ THẬT</ul>
            <ul class="footer-text">TRUE INVESTMENT CORP.,JSC</ul>
            <ul class="footer-text">Địa chỉ: LK10-TT3, Khu đô thị mới Đại kim, Ngõ 765 Nguyễn Xiển, Hoàng Mai, Hà Nội</ul>

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