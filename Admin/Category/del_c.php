<?php
include '../../config.php';
if (!isset($_GET['catid']))
{
echo "
<script>
window.location.href = 'view_c.php';
</script>
";
}
$id = $_GET['catid'];
$delpro2 = "DELETE FROM `category` WHERE id='$id'";
$del_exe2 = mysqli_query($conn, $delpro2);
if ($del_exe2) {
echo "
<script>
window.location.href = 'view_c.php';
</script>
";
}else{
echo "categorie not deleted";
}
?>