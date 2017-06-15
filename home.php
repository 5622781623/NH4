<?php require_once('connect.php'); ?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>SENIOR PROJECT</title>
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/icons.css">
      <link rel="stylesheet" href="css/responsee.css">
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
      <script language="javascript" type="text/javascript" src="js/datetimepicker.js"></script>

<!-- datetimepicker STYLE -->
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.223/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.223/styles/kendo.material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.223/styles/kendo.material.mobile.min.css" />
    <script src="https://kendo.cdn.telerik.com/2017.1.223/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.1.223/js/kendo.all.min.js"></script>

   </head>
   <body class="size-1140 align-content-left">
      <div class="line">
         <div id="content-wrapper">
            <!-- LEFT COLUMN -->
            <div class="s-12 m-4 l-3">
               <div class="logo-box">
                  <h1>SENIOR PROJECT</h1>
               </div>
               <div class="aside-nav">
                 <ul class="chevron">
                   <li><a href="home.php"><i class="icon-home"></i>Home</a></li>

                   <li>
                    <a href="aj.php"><i class="icon-list"></i>Topics</a>
                      <ul class="nav nav-second-level">
                        <li><a href="#bu">Bunyarit Uyyanonvara</a></li>
                        <li><a href="#cn">Cholwich Nattee"</a></li>
                        <li><a href="#en">Ekawit Nantajeewarawat</a></li>
                        <li><a href="#gs">Gun Srijuntongsiri</a></li>
                        <li><a href="#kw">Komwut Wipusitwarakun</a></li>
                        <li><a href="#nh">Nguyen Duy Hung</a></li>
                        <li><a href="#pa">Pakinee Aimmanee</a></li>
                        <li><a href="#sm">Stanislav Makhanov</a></li>
                        <li><a href="#su">Sasiporn Usanavasin</a></li>
                        <li><a href="#th">Teerayut Horanont</a></li>
                        <li><a href="#tt">Thanaruk Theeramunkong</a></li>
                        <li><a href="#vs">Virach Sornlertlamvanich</a></li>
                      </ul>
                   </li>
                   <?php
                   if($_SESSION['groupid'] == "Staff"){
                   ?>
                 <li>
                      <a><i class="icon-user"></i><?php echo $_SESSION['uname']?></a>
                      <ul class="nav nav-second-level">
                         <li><a href="ptopic.php">Profile</a></li>
                         <li><a href="ptopic.php">Your Topic</a></li>
                         <li><a href="add.php">Add Topics</a></li>
                         <li><a href="tt.php">Students</a></li>
                         <li><a href="logout.php">Log Out</a></li>
                      </ul>
                   </li>

                   <?php }elseif($_SESSION['groupid'] == "Admin"){ ?>
                   <li>
                      <a><i class="icon-user"></i><?php echo $_SESSION['uname']?></a>
                      <ul class="nav nav-second-level">

                         <li><a href="addnews.php">Add News</a></li>
                         <li><a href="addstaff.php">Add Staff</a></li>
                         <li><a href="logout.php">Log Out</a></li>
                      </ul>
                   </li>

                   <?php }elseif($_SESSION['groupid'] == "student"){ ?>
                     <li>
                        <a><i class="icon-user"></i><?php echo $_SESSION['gName']?></a>
                        <ul class="nav nav-second-level">
                          <li><a href="stInfo.php">Student Info</a></li>
                          <li><a href="select.php">Select Topics</a></li>
                          <li><a href="top.php">Topics</a></li>
                          <li><a href="logout.php">Log Out</a></li>
                        </ul>
                     </li>

                 <?php } else { ?>
                      "<li>
                         <a><i class="icon-user"></i>Sign in</a>
                         <ul class="nav nav-second-level">
                            <li><a href="loginstudent.html">Student</a></li>
                            <li><a href="loginstaff.html">Staff</a></li>
                         </ul>
                      </li>";
                    <?php } ?>

                 </ul>
               </div>
            </div>

       <?php
         if ($_SESSION['groupid'] == "Admin"){
       ?>
             <?php
               $act = $_POST["act"];
               $url = $_POST["url"];
               $note = $_POST["note"];
               $date = $_POST["date"];
               $page=$_POST['page'];
               require_once('connect.php');

               if($page=='addnews') {
                 $q="INSERT INTO news (activity,URL,title,dtime)VALUES ('$act','$url','$note','$date')";
                 $result=$mysqli->query($q);
                 if(!$result){
                   echo "INSERT failed. Error: ".$mysqli->error ;

                 }
               }
             ?>


                          <!-- RIGHT COLUMN class="btn btn-danger square-btn-adjust" -->
                          <div class="s-12 m-8 l-9">

                            <div class="box">
                              <br/>
                             <section>

                                 <?
                                         require_once('connect.php');
                                         $q="select * from news order by n_ID DESC";
                                         $result=$mysqli->query($q);
                                         if(!$result){
                                           echo "Select failed. Error: ".$mysqli->error ;
                                         }

                                        while($row=$result->fetch_array()){ ?>
                                          <article class="line">
                                            <div class="margin">

                                        <div class="s-12 m-12 l-2 date">
                                           <i class="icon-calendar"></i>
                                           <p><font size="4"><?=$row['dtime']?></font></p>
                                        </div>

                                        <div class="s-12 m-12 l-10">
                                           <h4><?=$row['activity']?></h4>
                                           <p>
                                           <div id="social">
                                             <a target="_blank" href="<?=$row['URL']?>"><i class="icon-sli-book-open"></i>&nbsp;&nbsp;<?=$row['title']?></a>
                                           </div>
                                           </p>
                                           <p>
                                             <td><b><a href="edit_news.php?nid=<?=$row['n_ID']?>">EDIT</a></b></td>
                                             <td>|</td>
                                             <td><b><a href="delnews.php?nid=<?=$row['n_ID']?>">DELETE</a></b></td>
                                           </p>
                                             <hr>
                                        </div>
                                     </div>
                                  </article>
                                  <?php } ?>

                               </section>


             <?php
             }
             else{?>

             <!-- RIGHT COLUMN class="btn btn-danger square-btn-adjust" -->
             <div class="s-12 m-8 l-9">

               <div class="box">
                 <br/>
                  <!-- HEADER -->

                  <!-- CAROUSEL -->
                  <!-- <div class="line">
                     <div id="owl-demo" class="owl-carousel owl-theme  margin-bottom">
                        <div class="item"><img src="img/940x380.jpg" alt=""></div>
                        <div class="item"><img src="img/940x380-2.jpg" alt=""></div>
                        <div class="item"><img src="img/940x380-3.jpg" alt=""></div>
                     </div>
                  </div> -->

                  <section>

                    <?
                            require_once('connect.php');
                            $q="select * from news order by n_ID DESC";
                            $result=$mysqli->query($q);
                            if(!$result){
                              echo "Select failed. Error: ".$mysqli->error ;
                            }

                           while($row=$result->fetch_array()){ ?>
                             <article class="line">
                               <div class="margin">

                           <div class="s-12 m-12 l-2 date">
                              <i class="icon-calendar"></i>
                              <p><font size="4"><?=$row['dtime']?></font></p>
                           </div>

                           <div class="s-12 m-12 l-10">
                              <h4><?=$row['activity']?></h4>
                              <p>
                              <div id="social">
                                <a target="_blank" href="<?=$row['URL']?>"><i class="icon-sli-book-open"></i>&nbsp;&nbsp;<?=$row['title']?></a>
                              </div>
                              </p>
                                <hr>
                           </div>
                        </div>
                     </article>
                     <?php } ?>

                  </section>
                  <?php }
                  ?>

               </div>
               <!-- FOOTER -->
               <div class="box footer">
                  <footer class="line">
                     <div class="s-12">
                        <p>Sirindhorn International Institute of Technology, Thammasat University</p>
                     </div>

                  </footer>
               </div>
            </div>

         </div>
      </div>
      <img id="background" class="hide-s" src="img/background.jpg" alt="">
      <script type="text/javascript" src="js/responsee.js"></script>
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function($) {
           $("#owl-demo").owlCarousel({
           	navigation : true,
           	slideSpeed : 300,
           	paginationSpeed : 400,
           	autoPlay : true,
           	singleItem:true
           });
         });

      </script>
   </body>
</html>
