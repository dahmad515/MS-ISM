<?php
include "../../config.php";
// include "chat_nav.php";
// session_start();
$admin_id = $_SESSION['admin_id'];
if(isset($_POST['insertData'])){
  $id = $_POST['user'];
  // echo $admin_id;
  $checkadmin = "SELECT * FROM `chat_manager` WHERE user_id = '$id' AND admin_id = '$admin_id'";
  $exeadmin = mysqli_query($conn,$checkadmin);
  $rowadmin = mysqli_fetch_array($exeadmin);
  // row > 0 =/ Not
  if (!$rowadmin > 0){
    // insert the data for chat management
  $insertmanager = "INSERT INTO `chat_manager`(`admin_id`, `user_id`) VALUES ('$admin_id','$id')";
  $executemanage = mysqli_query($conn,$insertmanager);
  if ($executemanage) {

  $insertmanager2 = "SELECT * FROM `chat_manager` WHERE user_id = '$id' AND admin_id = '$admin_id'";
  $executemanage2 = mysqli_query($conn,$insertmanager2);
  $rowmanager2 = mysqli_fetch_array($executemanage2);
  if ($rowmanager2 > 0){
  // if chat manager have the data
  $chat_id = $rowmanager2['id'];
  // if chat manager have the data
  $message = $_POST["mxg"];
  $insert = "INSERT INTO `groupchat`(`user_id`,`admin_id`, `chatter_name`,`chat_id`, `message`) VALUES ('$id', '$admin_id', 'admin', '$chat_id','$message')";
  $execute = mysqli_query($conn,$insert);
  if ($execute) {
    echo "executed";
  }// end of chat manage have a data
}
  }
  }else{
  $insertmanager2 = "SELECT * FROM `chat_manager` WHERE user_id = '$id' AND admin_id = '$admin_id'";
  $executemanage2 = mysqli_query($conn,$insertmanager2);
  $rowmanager2 = mysqli_fetch_array($executemanage2);
  if ($rowmanager2 > 0){
  // if chat manager have the data
  $chat_id = $rowmanager2['id'];
  // if chat manager have the data 
  $message2 = $_POST["mxg"];
  $insert2 = "INSERT INTO `groupchat`(`user_id`,`admin_id`, `chatter_name`,`chat_id`, `message`) VALUES ('$id', '$admin_id', 'admin', '$chat_id','$message2')";
  $execute2 = mysqli_query($conn,$insert2);
  if ($execute2) {
    echo "executed";
  }// end of chat manage have a data
  }
  }
  
}

if(isset($_GET['selectData'])){
        $user = $_GET['user'];
        
        $sel = "SELECT * FROM `chat_manager` WHERE `admin_id` = '$admin_id' AND `user_id` = '$user'";
        $exe = mysqli_query($conn,$sel);
        $row = mysqli_fetch_array($exe);
        if ($row > 0){
          $chat_id = $row['id'];
          $sel2 = "SELECT * FROM `groupchat` WHERE `chat_id` = '$chat_id'";
          $exe2 = mysqli_query($conn,$sel2);
          while ($row2 = mysqli_fetch_array($exe2)) {
          $userids = $row2['user_id'];
          $chatter_name = $row2['chatter_name'];
          $sel1 = "SELECT * FROM `users` WHERE id='$userids'";
          $exe1 = mysqli_query($conn,$sel1);
          $row1 = mysqli_fetch_array($exe1);
          $sel3 = "SELECT * FROM `admins` WHERE id='$admin_id'";
          $exe3= mysqli_query($conn,$sel3);
          $row3 = mysqli_fetch_array($exe3);
          if($chatter_name == 'admin'){
          echo '<p class="mex admin_chat bg-success text-white">'.$row3['username'].' : '.$row2['message'].'</p>';
          }else{
          echo '<p class="mex bg-primary text-white">'.$row1['username'].' : '.$row2['message'].'</p>';

          }
        }
        }
      }
?>