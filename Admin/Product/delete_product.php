<?php
include '../../config.php';
if (!isset($_GET['pro_id']))
{
echo "
<script>
window.location.href = 'view_products.php';
</script>
";
}
$id = $_GET['pro_id'];
$sel = "SELECT * FROM `products` WHERE id = '$id'";
$sel_exe = mysqli_query($conn, $sel);
$row = mysqli_fetch_array($sel_exe);
$imgSRC = "../../img/".$row['img_src'];
if (unlink($imgSRC)){
$delsql = "DELETE FROM `products` WHERE id='$id'";
$sel_exe2 = mysqli_query($conn, $delsql);
if ($sel_exe2) {
echo "<script>
window.location.href = 'view_products.php';
</script>";
}else{
echo "not delete image deleted";
}
}else{
$delsql = "DELETE FROM `products` WHERE id='$id'";
$sel_exe2 = mysqli_query($conn, $delsql);
if ($sel_exe2) {
echo "<script>
window.location.href = 'view_products.php';
</script>";
}
}

?>