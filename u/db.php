<?php
try {
    $dbcon = new PDO("mysql:host=localhost;dbname=gmc_approvals", 'root', 'qazxsw123');
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
 ?>
