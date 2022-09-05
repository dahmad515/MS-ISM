<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['admin_id']);
  echo "<script>
          window.location.href = 'index.php';
        </script>";
?>