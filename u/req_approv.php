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

     case 'vendor_payment':
       $this->VendorPayment($_POST['ven_dt'], $_POST['ven_name'], $_POST['ven_bn'], $_POST['ven_br'], $_POST['ven_amt'], $_POST['ven_note']);
       break;

     case 'billing':
       $this->Billing($_POST['bl_dt'], $_POST['bl_name'], $_POST['bl_site'], $_POST['bl_bn'], $_POST['bl_amt'], $_POST['bl_note']);
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
    header("Location: ../acc-moneyrequisition.html?update=req_true");
  } else {
    header("Location: ../acc-moneyrequisition.html?update=req_false");
  }

} //End of Money Requisition Request class

public function VendorPayment($dt, $nm, $bn, $br, $amt, $rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`accounts_vp` (
          `vp_dt` ,
          `vp_name` ,
          `vp_billno` ,
          `vp_billref` ,
          `vp_amt` ,
          `vp_note` ,
          `vp_ceo_approv` ,
          `vp_hod_approv` ,
          `vp_director_approv`
          )
          VALUES (
          '$dt',  '$nm',  '$bn',  '$br',  '$amt',  '$rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../acc-vendorpay.html?update=req_true");
    } else {
      header("Location: ../acc-vendorpay.html?update=req_false");
    }
} // End of the Vendor Payment Request Class

public function Billing($dt, $nm, $site, $blno, $amt, $note)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`accounts_bl` (
          `bl_dt` ,
          `bl_name` ,
          `bl_site` ,
          `bl_no` ,
          `bi_amt` ,
          `bl_note` ,
          `bl_ceo_approv` ,
          `bl_hod_approv` ,
          `bl_director_approv`
          )
          VALUES (
          '$dt',  '$nm',  '$site', '$blno',  '$amt',  '$note',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../acc-billsnproc.html?update=req_true");
    } else {
      header("Location: ../acc-billsnproc.html?update=req_false");
    }
}

}// End of the Whole Class for Request Approval Class


?>
