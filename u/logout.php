<?php
$a = $_GET['logout'];
if ($a==1) {
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../index.html");
}
 ?>
