<?php
session_start();
include 'db.php';
/**
 *All Approval Requests functions are Here. The RequestApproval class will take the Submit type input to perform
 *diffrent approval requests
 */
$ReqType = $_GET['type'];

new RequestApproval($ReqType);

class RequestApproval
{

 function __construct($rt)
 {
   switch ($rt) {
     case 'money_requisition':
       $this->MoneyRequisition($_POST['req_date'], $_POST['req_name'], $_POST['req_purpose'], $_POST['req_amt'], $_POST['req_file']);
       break;

     case '2':
       echo 'This is 2';
       break;

     default:
       echo "Wrong";
       break;
   }
 }

public function MoneyRequisition($dt, $nm, $pur, $amt, $fl)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`mr` (
            `mr_date` ,
            `mr_made_by` ,
            `mr_purpose` ,
            `mr_amount` ,
            `mr_file_path` ,
            `hod_approv` ,
            `direct_approv` ,
            `ceo_approv`
            )
            VALUES (
            '$dt',  '$nm',  '$pur',  '$amt',  '$fl',  'FALSE',  'FALSE',  'FALSE'
            )";
  if ($dbcon->exec($stmt)) {
    header("Location: ../acc-moneyrequisition.html?updated=true");
  } else {
    header("Location: ../acc-moneyrequisition.html?updated=false");
  }

} //End of Money Requisition Request class

}


?>
