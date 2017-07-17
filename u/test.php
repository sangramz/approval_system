<?php
global $db, $ses, $dbcon;
$db = array(
            'db_host' => 'localhost',
            'db_name'  => 'gmc_approvals',
            'db_user' => 'root',
            'db_pwd'  => 'Qazxsw12#'
 );

 try {
     $conn = new PDO("mysql:host=localhost;dbname=gmc_approvals", 'root', 'qazxsw123');
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }
 catch(PDOException $e)
     {
     echo "Connection failed: " . $e->getMessage();
     }

 ?>
