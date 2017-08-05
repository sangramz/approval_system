<?php
session_start();
include 'inc.php';
$d = $_POST['dept'];
$u = $_POST['uid'];
$p = $_POST['pwd'];
new Login($d, $u, $p, $dbcon); //Takes User input to Login Class
class Login
{

  function __construct($dept, $user, $pwd, $dbcon)
  {
    $this->SignIn($dept, $user, $pwd, $dbcon);
  }
  public function SignIn($dept, $user, $pwd, $dbcon) //Checking Login
  {
    $que = "SELECT *
            FROM usr
            WHERE usr_sl = :dept";
    $querun = $dbcon -> prepare($que);
    $querun->bindParam(':dept', $dept);
    $querun -> execute();
    $row = $querun->fetch();
    if ($row['usr_nm'] == $user && $row['usr_pwd'] == $pwd) {
      getSession($dept);
    }
    else {
      header("Location: ../index.html?err=wrong_login");
    }
  }
}

 ?>
