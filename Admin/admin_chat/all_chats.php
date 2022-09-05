<?php
include 'chat_nav.php';
$admin_id = $_SESSION['admin_id'];
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<ul class="list-group mt-5">

		<li class="list-group-item bg-primary text-center text-white"><b>Chatting Users</b></li>
		<?php
				$sel = "SELECT * FROM `chat_manager` WHERE `admin_id` = '$admin_id'";
        $exe = mysqli_query($conn,$sel);
        // $row = mysqli_fetch_array($exe);
        while ($row = mysqli_fetch_array($exe)) {
        	$user_id = $row['user_id'];
        	$sel1 = "SELECT * FROM `users` WHERE id='$user_id'";
          $exe1 = mysqli_query($conn,$sel1);
          $row1 = mysqli_fetch_array($exe1);
		echo '<li class="list-group-item"><a href="index.php?user='.$user_id.'">'.$row1['username'].'</a></li>';
        }
				?>
			</ul>
		</div>
	</div>
</div>