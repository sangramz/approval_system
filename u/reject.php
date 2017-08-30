<?php
session_start();
include 'db.php';

$tab = $_GET['type'];


new RejectApproval($tab);

class RejectApproval
{

 function __construct($rt)
 {
   switch ($rt) {
     case 'money_requisition':
       $this->MoneyRequisition($_GET['id'], $_GET['approver']);
       break;

     case 'vendor_payment':
       $this->VendorPayment($_GET['id'], $_GET['approver']);
       break;

     case 'billing':
       $this->Billing($_GET['id'], $_GET['approver']);
       break;

     case 'dscr':
        $this->DailySales($_GET['id'], $_GET['approver']);
        break;

    case 'sales_transport':
      $this->SalesTransport($_GET['id'], $_GET['approver']);
      break;

    case 'site_report':
      $this->SiteReport($_GET['id'], $_GET['approver']);
      break;

    case 'recruitment':
      $this->RecApprov($_GET['id'], $_GET['approver']);
      break;

    case 'leave':
      $this->LevApprov($_GET['id'], $_GET['approver']);
      break;

    case 'vendor_registeration':
      $this->venReg($_GET['id'], $_GET['approver']);
      break;

    case 'po_approval':
      $this->poApprov($_GET['id'], $_GET['approver']);
      break;

    case 'logistics':
      $this->Logistics($_GET['id'], $_GET['approver']);
      break;

    case 'quotation':
      $this->quoApprov($_GET['id'], $_GET['approver']);
      break;


     default:
       echo "Wrong";
       break;
   }
 }

public function MoneyRequisition($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE  `gmc_approvals`.`mr` SET  `mr_reject` =  'Rejected by HOD' WHERE  `mr`.`mr_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE  `gmc_approvals`.`mr` SET  `mr_reject` =  'Rejected by Director' WHERE  `mr`.`mr_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE  `gmc_approvals`.`mr` SET  `mr_reject` =  'Rejected by CEO' WHERE  `mr`.`mr_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }

} //End of Money Requisition Request class

public function VendorPayment($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`accounts_vp` SET  `vp_reject` =  'Rejected by HOD' WHERE  `accounts_vp`.`vp_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`accounts_vp` SET  `vp_reject` =  'Rejected by Director' WHERE  `accounts_vp`.`vp_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`accounts_vp` SET  `vp_reject` =  'Rejected by CEO' WHERE  `accounts_vp`.`vp_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }
} // End of the Vendor Payment Request Class

public function Billing($id, $approver)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`accounts_bl` WHERE `accounts_bl`.`bl_sl` = '$id'";
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`accounts_bl` SET  `bl_reject` =  'Rejected by HOD' WHERE  `accounts_bl`.`bl_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`accounts_bl` SET  `bl_reject` =  'Rejected by Director' WHERE  `accounts_bl`.`bl_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`accounts_bl` SET  `bl_reject` =  'Rejected by CEO' WHERE  `accounts_bl`.`bl_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }
}

public function DailySales($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`sales_dscr` SET  `dscr_reject` =  'Rejected by HOD' WHERE  `sales_dscr`.`dscr_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`sales_dscr` SET  `dscr_reject` =  'Rejected by Director' WHERE  `sales_dscr`.`dscr_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`sales_dscr` SET  `dscr_reject` =  'Rejected by CEO' WHERE  `sales_dscr`.`dscr_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }
}

public function SalesTransport($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`sales_transport` SET  `transport_reject` =  'Rejected by HOD' WHERE  `sales_transport`.`transport_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`sales_transport` SET  `transport_reject` =  'Rejected by Director' WHERE  `sales_transport`.`transport_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`sales_transport` SET  `transport_reject` =  'Rejected by CEO' WHERE  `sales_transport`.`transport_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }
}

public function SiteReport($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`sales_site` SET  `site_reject` =  'Rejected by HOD' WHERE  `sales_site`.`site_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`sales_site` SET  `site_reject` =  'Rejected by Director' WHERE  `sales_site`.`site_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`sales_site` SET  `site_reject` =  'Rejected by CEO' WHERE  `sales_site`.`site_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }
}

public function RecApprov($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`hr_rec` SET  `rec_reject` =  'Rejected by HOD' WHERE  `hr_rec`.`rec_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`hr_rec` SET  `rec_reject` =  'Rejected by Director' WHERE  `hr_rec`.`rec_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`hr_rec` SET  `rec_reject` =  'Rejected by CEO' WHERE  `hr_rec`.`rec_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }
}

public function LevApprov($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`hr_lev` SET  `lev_reject` =  'Rejected by HOD' WHERE  `hr_lev`.`lev_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`hr_lev` SET  `lev_reject` =  'Rejected by Director' WHERE  `hr_lev`.`lev_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`hr_lev` SET  `lev_reject` =  'Rejected by CEO' WHERE  `hr_lev`.`lev_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }
}

public function venReg($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`ven_reg` SET  `ven_reject` =  'Rejected by HOD' WHERE  `ven_reg`.`ven_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`ven_reg` SET  `ven_reject` =  'Rejected by Director' WHERE  `ven_reg`.`ven_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`ven_reg` SET  `ven_reject` =  'Rejected by CEO' WHERE  `ven_reg`.`ven_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }
}

public function poApprov($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`comm_po` SET  `po_reject` =  'Rejected by HOD' WHERE  `comm_po`.`po_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`comm_po` SET  `po_reject` =  'Rejected by Director' WHERE  `comm_po`.`po_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`comm_po` SET  `po_reject` =  'Rejected by CEO' WHERE  `comm_po`.`po_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }
}

public function Logistics($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`logistics` SET  `trans_reject` =  'Rejected by HOD' WHERE  `logistics`.`trans_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`logistics` SET  `trans_reject` =  'Rejected by Director' WHERE  `logistics`.`trans_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`logistics` SET  `trans_reject` =  'Rejected by CEO' WHERE  `logistics`.`trans_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }

}

public function quoApprov($id, $approver)
{
  include 'db.php';
  $stmt = "DELETE FROM `gmc_approvals`.`quotation` WHERE `quotation`.`quotation_sl` = '$id'";
  if ($approver == 'hod') {
    $stmt = "UPDATE `gmc_approvals`.`quotation` SET  `quotation_reject` =  'Rejected by HOD' WHERE  `quotation`.`quotation_sl` = '$id'";
  } elseif ($approver == 'dir') {
    $stmt = "UPDATE `gmc_approvals`.`quotation` SET  `quotation_reject` =  'Rejected by Director' WHERE  `quotation`.`quotation_sl` = '$id'";
  } elseif ($approver == 'ceo') {
    $stmt = "UPDATE `gmc_approvals`.`quotation` SET  `quotation_reject` =  'Rejected by CEO' WHERE  `quotation`.`quotation_sl` = '$id'";
  }
  if ($dbcon->exec($stmt)) {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_true');
  } else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. '&update=reject_false');
  }

}


}// End of the Whole Class for Request Approval Class


?>
