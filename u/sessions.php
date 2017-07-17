<?php
session_start();
function getSession($dept) {
  switch ($dept) {
    case '1':
      $_SESSION['access'] = 1;
      $_SESSION['user'] = 'Super Admin';
      header('Location: ../home.php');
      break;

    case '6':
      $_SESSION['access'] = 6;
      $_SESSION['user'] = 'HOD';
      header('Location: ../home.php');
      break;

    default:
      echo "None";
      break;
  }
}
?>
