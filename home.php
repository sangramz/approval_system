<?php
session_start();
switch ($_SESSION['access']) {
  case '1':
    include 'admin.html';
    break;

  case '6':
    include 'hod.html';

  default:
    echo 'error';
    break;
}
?>
