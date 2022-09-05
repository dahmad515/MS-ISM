<?php
include "../config.php";
include 'header_chat.php';
// include 'chat_nav.php';
if (!isset($_SESSION["id"])) {
	  echo "<script>
          window.location.href = '../all_login.php';
        </script>";
}
$id = $_SESSION['id'];
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<ul class="list-group mt-5">

		<li class="list-group-item bg-primary text-center text-white"><b>Chatting Users</b></li>
		<?php
		$sel = "SELECT * FROM `chat_manager` WHERE `user_id` = '$id'";
        $exe = mysqli_query($conn,$sel);
        // $row = mysqli_fetch_array($exe);
        while ($row = mysqli_fetch_array($exe)) {
        	$admin_id = $row['admin_id'];
        	$sel1 = "SELECT * FROM `admins` WHERE id='$admin_id'";
          $exe1 = mysqli_query($conn,$sel1);
          $row1 = mysqli_fetch_array($exe1);
		echo '<li class="list-group-item"><a href="index.php?admin='.$admin_id.'">'.$row1['username'].'</a></li>';
        }
				?>
			</ul>
		</div>
	</div>
</div>