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

     case 'dscr':
       $this->DailySales($_POST['dscr_date'], $_POST['dscr_h'], $_POST['dscr_location'], $_POST['dscr_rem']);
       break;

     case 'sales_transport':
       $this->SalesTransport($_POST['transport_date'], $_POST['transport_h'], $_POST['transport_rem']);
       break;

     case 'site_report':
       $this->SiteReport($_POST['site_date'], $_POST['site_h'], $_POST['site_loc'], $_POST['site_client'], $_POST['site_rem']);
       break;

     case 'recruitment':
       $this->RecApprov($_POST['rec_date'], $_POST['rec_h'], $_POST['rec_name'], $_POST['rec_rem']);
       break;

     case 'leave':
       $this->LevApprov($_POST['lev_date'], $_POST['lev_name'], $_POST['lev_no'], $_POST['lev_rem']);
       break;

     case 'vendor_registeration':
       $this->venReg($_POST['ven_details'], $_POST['ven_code'], $_POST['ven_dt'], $_POST['ven_rem']);
       break;

     case 'po_approval':
       $this->poApprov($_POST['po_det'], $_POST['po_code'], $_POST['po_h'], $_POST['po_dt'], $_POST['po_rem']);
       break;

     case 'logistics':
       $this->Logistics($_POST['trans_det'], $_POST['trans_val'], $_POST['trans_dt'], $_POST['trans_rem']);
       break;

     case 'quotation':
       $this->quoApprov($_POST['quotation_h'], $_POST['quotation_dt'], $_POST['quotation_det'], $_POST['quotation_rem']);
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

public function DailySales($dt, $h, $loc, $rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`sales_dscr` (
          `dscr_dt` ,
          `dscr_h` ,
          `dscr_loc` ,
          `dscr_rem` ,
          `dscr_hod_approv` ,
          `dscr_director_approv` ,
          `dscr_ceo_approv`
          )
          VALUES (
          '$dt',  '$h',  '$loc', '$rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../sales-report.html?update=sub_true");
    } else {
      header("Location: ../sales-report.html?update=req_false");
    }
}

public function SalesTransport($dt, $h, $rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`sales_transport` (
          `transport_dt` ,
          `transport_h` ,
          `transport_rem` ,
          `transport_hod_approv` ,
          `transport_director_approv` ,
          `transport_ceo_approv`
          )
          VALUES (
          '$dt',  '$h', '$rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../sales-transport.html?update=req_true");
    } else {
      header("Location: ../sales-transport.html?update=req_false");
    }
}

public function SiteReport($dt, $h, $loc, $client, $rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`sales_site` (
          `site_date` ,
          `site_h` ,
          `site_loc` ,
          `site_client` ,
          `site_rem` ,
          `site_hod_approv` ,
          `site_director_approv` ,
          `site_ceo_approv`
          )
          VALUES (
          '$dt',  '$h',  '$loc', '$client', '$rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../sales-site.html?update=sub_true");
    } else {
      header("Location: ../sales-site.html?update=req_false");
    }
}

public function RecApprov($dt, $h, $name, $rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`hr_rec` (
          `rec_dt` ,
          `rec_h` ,
          `rec_name` ,
          `rec_rem` ,
          `rec_hod_approv` ,
          `rec_director_approv` ,
          `rec_ceo_approv`
          )
          VALUES (
          '$dt',  '$h',  '$name', '$rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../hr-recruitment.html?update=req_true");
    } else {
      header("Location: ../hr-recruitment.html?update=req_false");
    }
}

public function LevApprov($dt, $name, $no, $rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`hr_lev` (
          `lev_dt` ,
          `lev_name` ,
          `lev_no` ,
          `lev_rem` ,
          `lev_hod_approv` ,
          `lev_director_approv` ,
          `lev_ceo_approv`
          )
          VALUES (
          '$dt',  '$name',  '$no', '$rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../hr-leave.html?update=req_true");
    } else {
      header("Location: ../hr-leave.html?update=req_false");
    }
}

public function venReg($det, $code, $dt, $rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`ven_reg` (
          `ven_det` ,
          `ven_code` ,
          `ven_dt` ,
          `ven_rem` ,
          `ven_hod_approv` ,
          `ven_director_approv` ,
          `ven_ceo_approv`
          )
          VALUES (
          '$det',  '$code',  '$dt', '$rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../comm-vendor.html?update=req_true");
    } else {
      header("Location: ../comm-vendor.html?update=req_false");
    }
}

public function poApprov($det, $code, $po_h, $po_dt, $po_rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`comm_po` (
          `po_det` ,
          `po_code` ,
          `po_h` ,
          `po_dt` ,
          `po_rem` ,
          `po_hod_approv` ,
          `po_director_approv` ,
          `po_ceo_approv`
          )
          VALUES (
          '$det',  '$code', '$po_h',  '$po_dt', '$po_rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../comm-poa.html?update=req_true");
    } else {
      header("Location: ../comm-poa.html?update=req_false");
    }
}

public function Logistics($det, $val, $dt, $rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`logistics` (
          `trans_det` ,
          `trans_val` ,
          `trans_dt` ,
          `trans_rem` ,
          `trans_hod_approv` ,
          `trans_director_approv` ,
          `trans_ceo_approv`
          )
          VALUES (
          '$det',  '$val', '$dt', '$rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../comm-logistics.html?update=req_true");
    } else {
      header("Location: ../comm-logistics.html?update=req_false");
    }
}

public function quoApprov($h, $dt, $det, $rem)
{
  include 'db.php';
  $stmt = "INSERT INTO  `gmc_approvals`.`quotation` (
          `quotation_h` ,
          `quotation_dt` ,
          `quotation_det` ,
          `quotation_rem` ,
          `quotation_hod_approv` ,
          `quotation_director_approv` ,
          `quotation_ceo_approv`
          )
          VALUES (
          '$h',  '$dt', '$det', '$rem',  'FALSE',  'FALSE',  'FALSE'
          )";
    if ($dbcon->exec($stmt)) {
      header("Location: ../comm-quotation.html?update=req_true");
    } else {
      header("Location: ../comm-quotation.html?update=req_false");
    }
}

}// End of the Whole Class for Request Approval Class


?>
