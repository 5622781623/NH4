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
                    <a><i class="icon-list"></i>Topics</a>
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
            <!-- RIGHT COLUMN -->
            <div class="s-12 m-8 l-9">
               <div class="box">
                  <!-- HEADER -->
<!-- bu02 -->
                  <div class="line">
                     <section>

                        <h2><a name="bu">Bunyarit Uyyanonvara</a></h2>


                        <?
                      					require_once('connect.php');
                      				 	$q="select * from topic where UserID = '02' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                      					$result=$mysqli->query($q);
                      					if(!$result){
                      						echo "Select failed. Error: ".$mysqli->error ;
                                }

                      				 while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

<!--ch03 -->
                  <div class="line">
                     <section>

                        <h2><a name="ch">Cholwich Nattee</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '03' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

<!-- en04 -->
                  <div class="line">
                     <section>

                        <h2><a name="en">Ekawit Nantajeewarawat</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '04' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

<!-- gs05 -->
                  <div class="line">
                     <section>

                        <h2><a name="gs">Gun Srijuntongsiri</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '05' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

<!--kw06  -->
                  <div class="line">
                     <section>

                        <h2><a name="kw">Komwut Wipusitwarakun</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '06' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

                  <div class="line">
                     <section>

                        <h2><a name="nh">Nguyen Duy Hung</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '07' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

                  <div class="line">
                     <section>

                        <h2><a name="pa">Pakinee Aimmanee</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '08' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

                  <div class="line">
                     <section>

                        <h2><a name="sm">Stanislav Makhanov</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '09' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

                  <div class="line">
                     <section>

                        <h2><a name="su">Sasiporn Usanavasin</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '10' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

                  <div class="line">
                     <section>

                        <h2><a name="th">Teerayut Horanont</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '11' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

                  <div class="line">
                     <section>

                        <h2><a name="tt">Thanaruk Theeramunkong</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '12' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>

                  <div class="line">
                     <section>

                        <h2><a name="vs">Virach Sornlertlamvanich</a></h2>


                        <?
                                require_once('connect.php');
                                $q="select * from topic where UserID = '13' order by code";
                                //$q="select * from topic INNER JOIN member ON topic.UserID=member.UserID;";
                                $result=$mysqli->query($q);
                                if(!$result){
                                  echo "Select failed. Error: ".$mysqli->error ;
                                }

                               while($row=$result->fetch_array()){ ?>

                                 <br/>
                                 <table class="bordered">
                                   <thead>
                                     <tr>

                                       <th width="100"><?=$row['code']?></th>
                                       <th><?=$row['title']?></th>


                              </tr>
                              </thead>
                              <tr>
                                  <td colspan="2";><?=$row['note']?></td>
                              </tr>
                            </table>
                              <br />
                            <? } ?>

                     </section>
                  </div>
               </div>
               <!-- FOOTER -->
               <div class="box footer">
                  <footer class="line">
                     <div class="s-12 l-12">
                        <p>Sirindhorn International Institute of Technology,Thammasat University</p>
                     </div>
                  </footer>
               </div>
            </div>
         </div>
      </div>
      <img id="background" class="hide-s" src="img/background.jpg" alt="">
      <script type="text/javascript" src="js/responsee.js"></script>
   </body>
</html>
