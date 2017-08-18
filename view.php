<?php
session_start();
if ($_SESSION['access'] == 1 ) {
  // For the Admin
} elseif ($_SESSION['access'] == 2) {
  //For the Accounts
} elseif ($_SESSION['access'] == 3 ) {
  //For the Sales
} elseif ($_SESSION['access'] == 4 ) {
  //For the Human Resources
} elseif ($_SESSION['access'] == 6 ) {
  //For the Commerce
} elseif ($_SESSION['access'] == 7 ) {
  //For the HOD
}


?>
