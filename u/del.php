<?php
session_start();
include 'db.php';

$tab = $_GET['type'];


new DeleteApproval($tab);

class DeleteApproval
{

 function __construct($rt)
 {
   switch ($rt) {
     case 'money_requisition':
       $this->MoneyRequisition($_GET['id']);
       break;

     case 'vendor_payment':
       $this->VendorPayment($_GET['id']);
       break;

     case 'billing':
       $this->Billing($_GET['id']);
       break;

     case 'dscr':
        $this->DailySales($_GET['id']);
        break;

    case 'sales_transport':
      $this->SalesTransport($_GET['id']);
      break;

    case 'site_report':
      $this->SiteReport($_GET['id']);
      break;

    case 'recruitment':
      $this->RecApprov($_GET['id']);
      break;

    case 'leave':
      $this->LevApprov($_GET['id']);
      break;

    case 'vendor_registeration':
      $this->venReg($_GET['id']);
      break;

    case 'po_approval':
      $this->poApprov($_GET['id']);
      break;

    case 'logistics':
      $this->Logistics($_GET['id']);
      break;

    case 'quotation':
      $this->quoApprov($_GET['id']);
      break;


     default:
       echo "Wrong";
       break;
   }
 }

public function MoneyRequisition($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`mr` WHERE `mr`.`mr_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }

} //End of Money Requisition Request class

public function VendorPayment($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`accounts_vp` WHERE `accounts_vp`.`vp_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }
} // End of the Vendor Payment Request Class

public function Billing($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`accounts_bl` WHERE `accounts_bl`.`bl_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }
}

public function DailySales($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`sales_dscr` WHERE `sales_dscr`.`dscr_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }
}

public function SalesTransport($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`sales_transport` WHERE `sales_transport`.`transport_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }
}

public function SiteReport($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`sales_site` WHERE `sales_site`.`site_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }
}

public function RecApprov($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`hr_rec` WHERE `hr_rec`.`rec_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }
}

public function LevApprov($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`hr_lev` WHERE `hr_lev`.`lev_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }
}

public function venReg($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`ven_reg` WHERE `ven_reg`.`ven_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }
}

public function poApprov($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`comm_po` WHERE `comm_po`.`po_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }
}

public function Logistics($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`logistics` WHERE `logistics`.`trans_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }

}

public function quoApprov($id)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`quotation` WHERE `quotation`.`quotation_sl` = '$id'";
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=del_false');
  }

}


}// End of the Whole Class for Request Approval Class


?>
