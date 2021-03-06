<?php
 include ('config.php');
 include('session.php');
 $user_check = $_SESSION['login_user'];
 $user_fName = $_SESSION['login_fName'];


if(isset($_SESSION['crnSes'])){
    $crnNo = $_SESSION['crnSes'];
    $classDay = $_SESSION['daySes'];
    $classTime = $_SESSION['timeSes'];
    $section = "<h1 id='class-name'><span class='bold'> " . $classDay . " | " . $classTime . "</span></h1>";
}

?>
<html>
<head>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>
            tinymce.init({ selector:'textarea', statusbar: false, branding: false });
        </script>    
</head>

</html>

<?php

$greeting = "Welcome, ". $user_fName;

//$home2 = $_SESSION['login_role'] . "";
$path = $_SESSION['login_role'];

//navigation links
$home = "<a id='head-links' href='/" . $path . "/classHome.php'>Home</a>";
$ann = "<a id='head-links' href='/" . $path . "/announcements.php'>Announcements</a>";
$assn = "<a id='head-links' href='/" . $path . "/assignments.php'>Assignments</a>";

$material = "<a id='head-links' href='/" . $path . "/courseMaterial.php'>Course Material</a>";
$disc = "<a id='head-links' href='/" . $path . "/discussionBoard.php'>Discussion Board</a>";
$diffSect = "<a href='/" . $path . "/home.php'><li>Choose a Different Section</li></a>";
//$group = "<a id='head-links' href='group.php'>Group Project</a>";

//new tabs
$attendance_link = "<a id='head-links' href='/" . $path . "/attendance/index.php'>Attendance</a>";
$excel_link = "<a id='head-links' href='/" . $path . "/excel/index.php'>Excel Grading</a>";
$reporting_link = "<a id='head-links' href='/" . $path . "/reporting/index.php'>Reporting</a>";
$html_link = "<a id='head-links' href='/" . $path . "/html/index.php'>HTML Grading</a>";
$text_link = "<a id='head-links' href='/" . $path . "/text/index.php'>Text Grading</a>";

?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel='stylesheet' type='text/css' href="/stylesheets/screen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
    
<div class="notLoggedIn" style="display:<?php if($isLoggedIn==true) {echo 'none';}?>;">
    <!--header for index page/login -->
    <div class="head-container">
        <div class="nav-title">
            <center>
                <!--need to check logic for link on button -->
                <div><img src="/assets/img/Pace_logo.png" id="logo"></div>
                <h1>CIS 101 PORTAL</h1>
            </center>
        </div>
    </div>
</div>

<!--header for teacher -->
<div class="LoggedIn" style="display:<?php if($isLoggedIn==false){echo 'none;';} ?>">
    <div class="head-container">
        <div class="welcome">
       <!-- only show if user is logged in -->
        <div class="logged-in"><span style="float:right;">
    <?php echo "$greeting"; ?><br>
    <a href="#">Help</a> <a href="/logout.php">Logout</a> 
        </span>
    </div>

            <div class="nav-title" alight="left">
            <!--need to check logic for link on button -->
                <div><img src="/assets/img/Pace_logo.png" id="logo"></div>
               <h1>CIS 101 PORTAL</h1>

               <?php 
                if($displayClass == true) {
                    echo $section;
                }
               ?>
            </div>
        </div>
    </div>
    
<!-- teacher and student top navigation -->
<div id="nav">
    <center>
    <!-- change color based on link selection -->    
        <div class="nav-links" <?php if($showNav==false){
                    echo 'style="display:none"'; } ?>>
        <br>
            <ul>
               <li id="nav-ann"><?php 
                    if ($thisPage == "Home") {
                        $home = "<a id='this-link' href='/" . $path . "/classHome.php'>Home</a>"; }
                        echo $home; ?>
                </li>

                <li id="nav-ann"><?php 
                    if ($thisPage == "Announcements") {
                        $ann = "<a id='this-link' href='/" . $path . "/announcements.php'>Announcements</a>"; }
                        echo $ann; ?>
                </li>

                <li id="nav-assn"><?php 
                    if ($thisPage == "Assignments") {
                        $assn = "<a id='this-link' href='/" . $path . "/assignments.php'>Assignments</a>"; }

                        echo $assn; ?>
                </li>

                <li id="nav-disc"><?php 
                    if ($thisPage == "Discussion Board") {
                    $disc = "<a id='this-link' href='/" . $path . "/discussionBoard.php'>Discussion Board</a>"; }

                    echo $disc; ?>
                </li>

                 <?php 
                     if($isTeacher==true) {
                     ?>
                        <li id="nav-attendance"><?php 
                            if($thisPage == "Attendance") {
                                $attendance_link = "<a id='this-link' href='/" . $path . "/attendance/index.php'>Attendance</a>";
                            }

                            echo $attendance_link; ?>
                        </li>

                     <?php
                     }
                 ?>



                <li id="nav-excel"><?php 
                    if($thisPage == "Excel") {
                        $excel_link = "<a id='this-link' href='/" . $path . "/excel/index.php'>Excel Grading</a>";
                    }

                    echo $excel_link; ?>
                </li>

                <li id="nav-reporting"><?php 
                    if($thisPage == "Reporting") {
                        $reporting_link = "<a id='this-link' href='/" . $path . "/reporting/index.php'>Reporting</a>";
                    }

                    echo $reporting_link; ?>
                </li>

                <li id="nav-html"><?php 
                    if($thisPage == "HTML Grading") {
                        $html_link = "<a id='this-link' href='/" . $path . "/html/index.php'>HTML Grading</a>";
                    }

                    echo $html_link; ?>
                </li>

                <li id="nav-text"><?php 
                    if($thisPage == "Text Grading") {
                        $text_link = "<a id='this-link' href='/" . $path . "/text/index.php'>Text Grading</a>";
                    }

                    echo $text_link; ?>
                </li>


            
                <?php
                    if($isTeacher==true) {
                        echo "<li id='nav-disc'><a id='head-links' href='/" . $path . "/home.php'>Choose Another Section</a></li>";
                    
                    }
                ?>
               <!-- <li id="nav-group"><?php 
                    //if ($thisPage == "Group Project") {
                    //$group = "<a id='this-link' href='group.php'>Group Project</a>"; }

                    //echo $group; ?>
                </li> -->
            </ul>
            <br>
        </div>
    </center>
</div>
    
<!-- teacher and student mobile navigation -->
 <button class="hamburger" 
    <?php if($showNav==false){
        echo 'style="display:none"';
    } ?>>&#9776;
</button>

<button class="cross">x</button>
    
<div class="menu">
    <ul>
        
        
        <a href="classHome.php">
                <?
                if($thisPage=="Home") {
                    echo "<li class='this-menu'>Home</li>";
                } else {
                    echo "<li>Home</li>";
                }
                ?>
                </a>
        

                  
            <a href="announcements.php">
                <?
                if($thisPage=="Announcements") {
                    echo "<li class='this-menu'>Announcements</li>";
                } else {
                    echo "<li>Announcements</li>";
                }
                ?>
                </a>

            <a href="assignments.php">
                <?
                if($thisPage=="Assignments") {
                    echo "<li class='this-menu'>Assignments</li>";
                } else {
                    echo "<li>Assignments</li>";
                }
                ?>
                </a>

<!--            <a href="students.php">
                <?
                /**if($thisPage=="Students") {
                    echo "<li class='this-menu'>Students</li>";
                } else {
                    echo "<li>Students</li>";
                }**/
                ?>
                </a> -->



            <a href="courseMaterial.php">
                <?
                if($thisPage=="Course Material") {
                    echo "<li class='this-menu'>Course Material</li>";
                } else {
                    echo "<li>Course Material</li>";
                }
                ?></a>

            <a href="discussionBoard.php">
                <?
                if($thisPage=="Discussion Board") {
                    echo "<li class='this-menu'>Discussion Board</li>";
                } else {
                    echo "<li>Discussion Board</li>";
                }
                ?></a>
        
            <?php if($isTeacher==true){
                echo $diffSect;
            } ?>
<!--            <a href="group.php">
                <?/**
                if($thisPage=="Group Project") {
                    echo "<li class='this-menu'>Group Project</li>";
                } else {
                    echo "<li>Group Project</li>";
                } **/
                ?></a> -->
    </ul>
</div> <!--end of hamburger menu -->    
        
</div> <!--end of loggedIn-->   
    
    


<!-- SCRIPT FOR HAMBURGER MENU -->
<script>
//hamburger menu jquery
$( ".cross" ).hide();
$( ".menu" ).hide();

$( ".hamburger" ).click(function() {
    $( ".menu" ).slideToggle( "slow", function() {
        $( ".hamburger" ).hide();
    $( ".cross" ).show();
    });
});

$( ".cross" ).click(function() {
    $( ".menu" ).slideToggle( "slow", function() {
        $( ".cross" ).hide();
        $( ".hamburger" ).show();
    });
});
        
        
    </script>

</body>


</html>
