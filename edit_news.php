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
                         <li><a href=".php">ADMIN</a></li>
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

            <!-- RIGHT COLUMN class="btn btn-danger square-btn-adjust" -->
            <div class="s-12 m-8 l-9">

              <div class="box head">

              <div style="color: white;float: right;font-size: 22px;">

              </div>
              </div>



              <div class="box">
                <?php
                  if ($_SESSION['groupid'] == "Admin"){
                ?>
                  <!-- HEADER -->
                  <div class="line">
                    <section>

                       <h2>News</h2>
                       <br/>
                       <div class="line">
                         <form class="customform" action="update_news.php" method="POST">

                            <div class="line">

                                    <?php
                                      require_once('connect.php');
                                      $nID = $_GET['nid'];
                                      $q = "select * from news where n_ID= $nID";
                                      $result = $mysqli->query($q);
                                      if(!$result){
                                        echo "Select failed; ".$mysqli->error;
                                      }
                                      $row = $result->fetch_array();

                                    ?>


                             <div class="line">
                                <input type="hidden" name="n" value="<?=$row['n_ID']?>">
                                <input type="text" size="5" value="<?=$row['activity']?>" name="act" >
                              </div>

                              <div class="line">
                                <div class="margin">
                                <div class="s-12 l-6">
                                 <h4>URL</h4>
                                 <input type="text" size="5" value="<?=$row['url']?> "name="url" />
                               </div>
                               <div class="s-12 l-6">
                                <h4>Note</h4>
                                <input type="text" size="5" value="<?=$row['title']?>" name="note" />
                              </div>
                              </div>
                               </div>

                               <!-- <div class="line">
                                  <div class="s-12 l-2 left">
                                     <input type="Text" name="demo1" id="demo1" maxlength="25" size="25">
                                     <a href="javascript:NewCal('demo1','ddmmmyyyy',true,24)">
                                       <img src="img/cal.gif" width="16" height="16" border="0" alt="Pick a date">
                                     </a>

                                   </div>
                              </div> -->

                              <div class="s-12 l-6 left" id="example">
                                  <div class="demo-section k-content">
                                    <h4>Date</h4>
                                      <input name="date" value="<?=$row['dtime']?>" id="datetimepicker" style="width: 100%;" />
                                 </div>
                              </div>
                              <div class="line">
                              <div class="s-12 l-2 right"><button type="submit">Submit</button></div>
                            </div>

                          </form>


                       </div>
                         </section>


                  </div>
                  <?php
                  }
                  else{
                  	echo "You do not have a permission to accsee this page";
                  }
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
      <script>
                  $(document).ready(function () {
                      // create DateTimePicker from input HTML element
                      $("#datetimepicker").kendoDateTimePicker({
                          value:new Date()
                      });
                  });
              </script>
   </body>
</html>
