<?php
session_start();
include 'db.php';
/**
 *All Approval Requests functions are Here. The RequestApproval class will take the Submit type input to perform
 *diffrent approval requests
 */
$ReqType = $_GET['type'];

new SendApproval($ReqType);

class SendApproval
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
       header("Location: {$_SERVER['HTTP_REFERER']}&update=notapproved");
       break;
   }
 }

public function MoneyRequisition($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 5) {
      $stmt = "UPDATE mr SET hod_approv='1' WHERE mr_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=money_requisition&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=money_requisition&update=notallowed");
      }

    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE mr SET direct_approv='1' WHERE mr_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=money_requisition&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=money_requisition&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE mr SET ceo_approv='1' WHERE mr_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=money_requisition&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=money_requisition&update=notallowed");
      }
    }
  }


} //End of Money Requisition Request class

public function VendorPayment($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE accounts_vp SET vp_hod_approv='1' WHERE vp_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=vendor_payment&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=vendor_payment&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE accounts_vp SET vp_director_approv='1' WHERE vp_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=vendor_payment&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=vendor_payment&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE accounts_vp SET vp_ceo_approv='1' WHERE vp_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=vendor_payment&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=vendor_payment&update=notallowed");
      }
    }
  }


} // End of the Vendor Payment Request Class

public function Billing($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE accounts_bl SET bl_hod_approv='1' WHERE bl_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=bills_proc&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=bills_proc&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE accounts_bl SET bl_director_approv='1' WHERE bl_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=bills_proc&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=bills_proc&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE accounts_bl SET bl_ceo_approv='1' WHERE bl_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=bills_proc&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=bills_proc&update=notallowed");
      }
    }
  }


}

public function DailySales($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE sales_dscr SET dscr_hod_approv='1' WHERE dscr_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=daily_sales&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=daily_sales&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE sales_dscr SET dscr_director_approv='1' WHERE dscr_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=daily_sales&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=daily_sales&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE sales_dscr SET dscr_ceo_approv='1' WHERE dscr_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=daily_sales&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=daily_sales&update=notallowed");
      }
    }
  }
}

public function SalesTransport($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE sales_transport SET transport_hod_approv='1' WHERE transport_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=transport&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=transport&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE sales_transport SET transport_director_approv='1' WHERE transport_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=transport&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=transport&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE sales_transport SET transport_ceo_approv='1' WHERE transport_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=transport&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=transport&update=notallowed");
      }
    }
  }
}


public function SiteReport($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE sales_site SET site_hod_approv='1' WHERE site_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=site&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=site&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE sales_site SET site_director_approv='1' WHERE site_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=site&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=site&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE sales_site SET site_ceo_approv='1' WHERE site_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=site&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=site&update=notallowed");
      }
    }
  }


}

public function RecApprov($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE hr_rec SET rec_hod_approv='1' WHERE rec_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=recruitment&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=recruitment&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE hr_rec SET rec_director_approv='1' WHERE rec_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=recruitment&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=recruitment&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE hr_rec SET rec_ceo_approv='1' WHERE rec_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=recruitment&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=recruitment&update=notallowed");
      }
    }
  }
}

public function LevApprov($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE hr_lev SET lev_hod_approv='1' WHERE lev_sl='$id'";
        if ($dbcon->exec($stmt)) {
          header("Location: ../hod-pa.html?view=leave&update=approved");
        } else {
          header("Location: ../hod-pa.html?view=leave&update=notallowed");
        }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE hr_lev SET lev_director_approv='1' WHERE lev_sl='$id'";
        if ($dbcon->exec($stmt)) {
          header("Location: ../dir-pa.html?view=leave&update=approved");
        } else {
          header("Location: ../dir-pa.html?view=leave&update=notallowed");
        }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE hr_lev SET lev_ceo_approv='1' WHERE lev_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=leave&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=leave&update=notallowed");
      }
    }
  }

}

public function venReg($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE ven_reg SET ven_hod_approv='1' WHERE ven_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=vendor_registeration&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=vendor_registeration&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE ven_reg SET ven_director_approv='1' WHERE ven_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=vendor_registeration&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=vendor_registeration&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE ven_reg SET ven_ceo_approv='1' WHERE ven_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=vendor_registeration&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=vendor_registeration&update=notallowed");
      }
    }
  }
}

public function poApprov($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE comm_po SET po_hod_approv='1' WHERE po_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=po_approvals&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=po_approvals&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE comm_po SET po_director_approv='1' WHERE po_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=po_approvals&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=po_approvals&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE comm_po SET po_ceo_approv='1' WHERE po_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=po_approvals&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=po_approvals&update=notallowed");
      }
    }
  }
}

public function Logistics($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE logistics SET trans_hod_approv='1' WHERE trans_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=logistics&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=logistics&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE logistics SET trans_director_approv='1' WHERE trans_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=logistics&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=logistics&update=notallowed");
      }

    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE logistics SET trans_ceo_approv='1' WHERE trans_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=logistics&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=logistics&update=notallowed");
      }
    }
  }
}

public function quoApprov($id, $approver)
{
  include 'db.php';
  if ($approver == 'hod') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 6) {
      $stmt = "UPDATE quotation SET quotation_hod_approv='1' WHERE quotation_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../hod-pa.html?view=quotation_approval&update=approved");
      } else {
        header("Location: ../hod-pa.html?view=quotation_approval&update=notallowed");
      }
    }
  }
  elseif ($approver == 'dir') {
    if ($_SESSION['access'] == 1 or $_SESSION['access'] == 7) {
      $stmt = "UPDATE quotation SET quotation_director_approv='1' WHERE quotation_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../dir-pa.html?view=quotation_approval&update=approved");
      } else {
        header("Location: ../dir-pa.html?view=quotation_approval&update=notallowed");
      }
    }
  }
  elseif ($approver == 'ceo') {
    if ($_SESSION['access'] == 1) {
      $stmt = "UPDATE quotation SET quotation_ceo_approv='1' WHERE quotation_sl='$id'";
      if ($dbcon->exec($stmt)) {
        header("Location: ../admin-pa.html?view=quotation_approval&update=approved");
      } else {
        header("Location: ../admin-pa.html?view=quotation_approval&update=notallowed");
      }
    }
  }
}

}// End of the Whole Class for Request Approval Class


?>
