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
        <link rel="stylesheet" href="css/style.css">
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
                        <a href="#" class="logo"><img src="images/1548659599290.png"></a>
                        <div class="menu-trigger">
                            <span class="span-1"></span>
                            <span class="span-2"></span>
                            <span class="span-3"></span>
                        </div>

                        <ul class="main-menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            
                            <li><a href="#lecturer">Lecturer</a></li>
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
        </header>
    <section id="baner-img">
        <div class="baner-content text-center">
            <h1>True Invets</h1>
            <p>Securities investment community</p>
            <p>Vietnam underlying securities</p>
             
        </div>
        <a class="btn-about" href="#about">More</a>
    </section>

    <!-- about -->
        <div class="about" id="about" >
            <div class="heading">
                <h1>TRUE INVEST</h1>
                <h2>VIETNAM SECURITIES INVESTMENT COMMUNITY</h2>
            </div>
            <div class="content">
                <div class="text">
                    <p>True Invest - Real Invest is a unit operating in the field of securities investment training and consulting, providing professional training and investment advice for investors in the market.
                    </p>
                    <p>With the motto that students are the center of the training process, True Invest is proud to be the ONLY unit ready to use the investment results of the academies as a standard of product quality.
                    </p>
                    <p>With a separate investment method, True Invest wishes to create a REAL INVESTMENT COMMUNITY for investors with an easy-to-access but highly effective method.
                    </p>
                </div>
                <div class="about-img">
                    <img height="500px" width="650px" src="./images/about-img.png">
                </div>
            </div>
        </div>

    <!-- Course -->
    <!-- <div class="course" id="course" style="height: 1000px;"> -->
        
    </div>

    <!-- lecturer -->
    <div  class="lecturer" id="lecturer">
        <div class="heading">
            <h1>Lecturer</h1>
        </div>
        <div class="content">
            <div id="lecturer1">
                <div class="img"><img height="400px" width="450px" src="./images/lecturer-Duc.png" ></div>
                <div class="text">
                    <h2>Nguyen Hong Duc</h2>
                    <h4>Co-Founder True Invest</h4>
                    <p>Mr. Nguyen Hong Duc is the Founder of True Invest - True Invest. He graduated from a prestigious university in Vietnam - Foreign Trade University. Since he was a student, he worked at a HungKee Vietnam Financial Group as a Deputy Head of Research and Investment Department.
                    </p>
                    <p>With nearly 10 years of investment experience in the stock market, and scientific, practical and effective teaching methods, he has helped thousands of investors get the right method and appropriate strategy in the market. stock.
                    </p>
                </div>
            </div>
            <div id="lecturer2">
                <div class="text">
                    <h2>Dinh Quang Anh</h2>
                    <h4>Co-Founder True Invest</h4>
                    <p>Mr. Dinh Quang Anh is Co-Founder of True Invest - True Invest. He graduated from two famous universities, Hanoi Law University and National Academy of Music. He has accumulated over 5 years of investment experience in the stock market, Bitcoin, Forex while working as a Securities Analyst at a Financial Investment Institute in Hanoi.
                    </p>
                    <p>With his teaching method based on science and practice, he has trained 500+ investors.</p>
                </div>
                <div class="img"><img height="400" width="450" src="./images/lecturer-Anh.png"></div>
            </div>
        </div>



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


