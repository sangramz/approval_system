<?php
session_start();
switch ($_SESSION['access']) {
  case '1':
    include 'admin.html';
    break;

  case '2':
    include 'acc-home.html';
    break;

  case '3':
    include 'sales-home.html';
    break;

  case '4':
    include 'hr-home.html';
    break;

  case '5':
    include 'comm-overview.html';
    break;

  case '6':
    include 'hod.html';

  case '7':
    include 'dir.html';

  default:
    header("Location: index.html");
    break;
}
?>
