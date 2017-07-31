<?php

/**
 * For counting the number of rows
 * $type is the table type
 * $status is the approval type "pending" or "Active"
 * $approv is the specific designation for approving "ceo" or "HOD"
 */

class ApprovalCount
{

  function __construct($type, $approv, $status)
  {
    switch ($type) {
      case 'mr':
        $reqType = "Money Requisition";
        $dept = "Accounts";
        break;

      case 'account_vp':
        $reqType = "Vendor Payment";
        $dept = 'Accounts';
        break;

      case 'account_bl':
        $reqType = "Billings & Process";
        $dept = 'Accounts';
        break;

      case 'comm_po':
        $reqType = "PO";
        $dept = 'Commercials';
        break;

      case 'hr_lev':
        $reqType = "Leave";
        $dept = 'HR';
        break;

      case 'hr_rec':
        $reqType = "Recruitment";
        $dept = 'HR';
        break;

      case 'logistics':
        $reqType = "Logistics";
        $dept = 'Commercials';
        break;

      case 'quotation':
        $reqType = "Quotation";
        $dept = 'Commercials';
        break;

      case 'sales_dscr':
        $reqType = "Daily Sales Call Report";
        $dept = 'Sales';
        break;

      case 'sales_site':
        $reqType = "Filed Report";
        $dept = 'Sales';
        break;

      case 'sales_transport':
        $reqType = "Tour & Travel Expenditure";
        $dept = 'Sales';
        break;

      case 'ven_reg':
        $reqType = "Vendor Registeration";
        $dept = 'Sales';
        break;

      default:
        echo 'None';
        break;
    }
    if ($status == 'pending') {
      $this->countPend($type, $approv, $reqType);
    } elseif ($status == 'active') {
      $this->countActive($type, $approv);
    } else {
      echo 'Error in retriving number of approvals';
    }
  }

  public function countPend($type, $approv, $reqType)
  {
    include 'db.php';
    $stmt = $dbcon->prepare("SELECT * FROM $type WHERE $approv='FALSE'");
    $stmt -> execute();
    $noRows=$stmt->rowCount();
    if ($noRows > 0) {
      echo $noRows.' '.$reqType.' Approvals are pending !!!';
    } else {
      echo 'None';
    }

  }
  public function countActive($type, $approv, $reqType)
  {
    include 'db.php';
    $stmt = $dbcon->prepare("SELECT * FROM '$type' WHERE '$approv'='TRUE'");
    $stmt -> execute();
    $noRows=$stmt->rowCount();
    if ($noRows > 0) {
      echo $noRows.' '.$reqType.' Approvals Have Been Approved !!!';
    } else {
      echo 'None';
    }


  }
}

/**
 * Counts a Specific Number of Approvals
 */
?>
