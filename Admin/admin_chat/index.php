<?php
// session_start();
include "../../header.php";
include "../../config.php";
// include "chat_nav.php";
// echo $_SESSION["id"];
// if (!isset($_SESSION["admin_id"])) {
// 	header("location:../../all_login.php");
// }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.mex{
			padding: 10px 20px;
			max-width: 300px;
			clear: both;
			border-radius: 10px;
		}
		.admin_chat{
			float: right;
			width: 100%;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
<a href="all_chats.php">Go Back</a>
		<div class="col-md-6 offset-md-3 border mb-5 rounded bg-light">
			<div class="messages" id="massages_div">
				
			</div>
				<div class="input-group fixed-bottom w-50 mx-auto mb-3">
                  <input type="text" name="mxg" id="mxg" required="required" class="form-control" placeholder="Write here">
                  <button class="btn btn-primary text-white" onclick="insertData();" type="submit" >Send ></button>
                </div>
		</div>
    </div>
</div>
<script type="text/javascript">
	let massages_div = document.getElementById('massages_div');
	let mxg = document.getElementById('mxg');
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	const user = urlParams.get('user');
	if(!user){
		window.location.href = '../../login.php';
	}
function insertData()
{
    let xhr=new XMLHttpRequest();
    xhr.open('POST','add_chat.php',true);
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.onreadystatechange=function(){
        if(this.readyState ==4 && this.status == 200){
            console.log(this.responseText);
    	}
        }
    xhr.send("mxg="+mxg.value+"&user="+user+"&insertData");
    mxg.value='';
}
	function selectData(){
    let xhr=new XMLHttpRequest();
    xhr.open('GET',`add_chat.php?selectData&user=${user}`,true);
    xhr.onreadystatechange=function(){
        if(this.readyState ==4 && this.status == 200){
        	massages_div.innerHTML = this.responseText;
   		}
    }
    xhr.send();
    // scrollfunction();
}

	function scrollfunction(){
		// console.log('hi how are you');
		window.scrollBy(0, massages_div.scrollHeight);
	}
setInterval(selectData,1000);
setTimeout(scrollfunction,2000);

</script>
</body>
</html>