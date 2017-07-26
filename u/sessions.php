<?php
session_start();
function getSession($dept) {
  switch ($dept) {
    case '1':
      $_SESSION['access'] = 1;
      $_SESSION['user'] = 'Super Admin';
      header('Location: ../home.php');
      break;

    case '2':
      $_SESSION['access'] = 2;
      $_SESSION['user'] = 'Accounts';
      header('Location: ../home.php');
      break;

    case '3':
      $_SESSION['access'] = 3;
      $_SESSION['user'] = 'Sales Operations';
      header('Location: ../home.php');
      break;

    case '4':
      $_SESSION['access'] = 4;
      $_SESSION['user'] = 'Human Resource';
      header('Location: ../home.php');
      break;

    case '5':
      $_SESSION['access'] = 5;
      $_SESSION['user'] = 'Commercials';
      header('Location: ../home.php');
      break;

    case '6':
      $_SESSION['access'] = 6;
      $_SESSION['user'] = 'HOD';
      header('Location: ../home.php');
      break;

    case '7':
      $_SESSION['access'] = 7;
      $_SESSION['user'] = 'Director';
      header('Location: ../home.php');
      break;

    default:
      echo "None";
      break;
  }
}
?>
