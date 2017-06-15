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

            <!-- RIGHT COLUMN class="btn btn-danger square-btn-adjust" -->
            <div class="s-12 m-8 l-9">

              <div class="box head">

              <div style="color: white;float: right;font-size: 30px;">
                 Group: <?php echo $_SESSION['gName']
                //  $tempgname = $_SESSION['gName'];?>
              </div>
              </div>



              <div class="box">

                  <!-- HEADER -->
                  <div class="line">
                    <section>
                       <h2>Selecting Topic/Advisor</h2>
                       <h6>You can list at most 12 topics code ['TT1', 'SU2', ....] as preferred topics.</h6>

                       <div class="line">
                          <form class="customform" action="addsel.php" method="post">


                              <div class="line">
                                <div class="margin">


                                 <div class="s-12 l-4">
                                  <h4>1st</h4>
                                  <select name="1st">
                                  <?php
                                    $q="select code,title from topic order by code";
                                    if($result=$mysqli->query($q)){
                                      while($row=$result->fetch_array()){
                                        echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                                      }
                                    }else{
                                      echo 'Query error: '.$mysqli->error;
                                    }
                                  ?>
                                  </select>
                                </div>
                                <div class="s-12 l-4">
                                 <h4>2nd</h4>
                                 <select name="2nd">
                                 <?php
                                   $q="select code,title from topic order by code";
                                   if($result=$mysqli->query($q)){
                                     while($row=$result->fetch_array()){
                                       echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                                     }
                                   }else{
                                     echo 'Query error: '.$mysqli->error;
                                   }
                                 ?>
                                 </select>
                               </div>
                               <div class="s-12 l-4">
                                <h4>3rd</h4>
                                <select name="3rd">
                                <?php
                                  $q="select code,title from topic order by code";
                                  if($result=$mysqli->query($q)){
                                    while($row=$result->fetch_array()){
                                      echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                                    }
                                  }else{
                                    echo 'Query error: '.$mysqli->error;
                                  }
                                ?>
                                </select>
                              </div>

                              <div class="s-12 l-4">
                               <h4>4th</h4>
                               <select name="4th">
                               <?php
                                 $q="select code,title from topic order by code";
                                 if($result=$mysqli->query($q)){
                                   while($row=$result->fetch_array()){
                                     echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                                   }
                                 }else{
                                   echo 'Query error: '.$mysqli->error;
                                 }
                               ?>
                               </select>
                             </div>

                             <div class="s-12 l-4">
                              <h4>5th</h4>
                              <select name="5th">
                              <?php
                                $q="select code,title from topic order by code";
                                if($result=$mysqli->query($q)){
                                  while($row=$result->fetch_array()){
                                    echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                                  }
                                }else{
                                  echo 'Query error: '.$mysqli->error;
                                }
                              ?>
                              </select>
                            </div>

                            <div class="s-12 l-4">
                             <h4>6th</h4>
                             <select name="6th">
                             <?php
                               $q="select code,title from topic order by code";
                               if($result=$mysqli->query($q)){
                                 while($row=$result->fetch_array()){
                                   echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                                 }
                               }else{
                                 echo 'Query error: '.$mysqli->error;
                               }
                             ?>
                             </select>
                           </div>

                         <div class="s-12 l-4">
                          <h4>7th</h4>
                          <select name="7th">
                          <?php
                            $q="select code,title from topic order by code";
                            if($result=$mysqli->query($q)){
                              while($row=$result->fetch_array()){
                                echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                              }
                            }else{
                              echo 'Query error: '.$mysqli->error;
                            }
                          ?>
                          </select>
                        </div>

                        <div class="s-12 l-4">
                         <h4>8th</h4>
                         <select name="8th">
                         <?php
                           $q="select code,title from topic order by code";
                           if($result=$mysqli->query($q)){
                             while($row=$result->fetch_array()){
                               echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                             }
                           }else{
                             echo 'Query error: '.$mysqli->error;
                           }
                         ?>
                         </select>
                       </div>

                       <div class="s-12 l-4">
                        <h4>9th</h4>
                        <select name="9th">
                        <?php
                          $q="select code,title from topic order by code";
                          if($result=$mysqli->query($q)){
                            while($row=$result->fetch_array()){
                              echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                            }
                          }else{
                            echo 'Query error: '.$mysqli->error;
                          }
                        ?>
                        </select>
                      </div>

                      <div class="s-12 l-4">
                       <h4>10th</h4>
                       <select name="10th">
                       <?php
                         $q="select code,title from topic order by code";
                         if($result=$mysqli->query($q)){
                           while($row=$result->fetch_array()){
                             echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                           }
                         }else{
                           echo 'Query error: '.$mysqli->error;
                         }
                       ?>
                       </select>
                     </div>

                     <div class="s-12 l-4">
                      <h4>11th</h4>
                      <select name="11th">
                      <?php
                        $q="select code,title from topic order by code";
                        if($result=$mysqli->query($q)){
                          while($row=$result->fetch_array()){
                            echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                          }
                        }else{
                          echo 'Query error: '.$mysqli->error;
                        }
                      ?>
                      </select>
                    </div>

                    <div class="s-12 l-4">
                     <h4>12th</h4>
                     <select name="12th">
                     <?php
                       $q="select code,title from topic order by code";
                       if($result=$mysqli->query($q)){
                         while($row=$result->fetch_array()){
                           echo '<option value="'.$row['code'].'">'.$row['code'].'</option>';
                         }
                       }else{
                         echo 'Query error: '.$mysqli->error;
                       }
                     ?>
                     </select>
                   </div>



                </div>
                 </div>

                            <div class="line">
                              <h6 style="color:red; text-align:right">* You cannot change your preferred topics after you have submited</h6>
                              <div class="s-12 l-2 right"><button type="submit">Submit</button>



                              </div>
                            </div>
                          <input type="hidden" name="gName" value="<?=$_SESSION['gName']?>">
                          </form>


                       </div>
                         </section>


                  </div>

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

      <script language="JavaScript" type="text/JavaScript">
      <!--
      function MM_jumpMenu(targ,selObj,restore){ //v3.0
        eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
        if (restore) selObj.selectedIndex=0;
      }
      //-->
      </script>

   </body>
</html>
