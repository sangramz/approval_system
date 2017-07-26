<?php
function ViewPendApprov($view) {

  switch ($view) {

    case 'money_requisition':
      require_once 'db.php';
      $stmt = $dbcon->prepare("SELECT * FROM mr WHERE ceo_approv='FALSE'");
      $stmt->execute();
      $rowCount = $stmt->fetchAll();
      $nRows = count($rowCount);
          if ($nRows > 0) {
            foreach ($rowCount as $rowData) {
               echo "<tr>";
               echo "<td>".$rowData['mr_date']."</td>";
               echo "<td>".$rowData['mr_made_by']."</td>";
               echo "<td>".$rowData['mr_amount']."</td>";
               echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="mr'.$rowData['mr_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
               echo "</tr>";
                }
          }
          else {
            echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
          }
      break;

      case 'bills_proc':
        require_once 'db.php';
        $stmt = $dbcon->prepare("SELECT * FROM accounts_bl WHERE bl_ceo_approv='FALSE'");
        $stmt->execute();
        $rowCount = $stmt->fetchAll();
        $nRows = count($rowCount);
            if ($nRows > 0) {
              foreach ($rowCount as $rowData) {
                 echo "<tr>";
                 echo "<td>".$rowData['bl_dt']."</td>";
                 echo "<td>".$rowData['bl_name']."</td>";
                 echo "<td>".$rowData['bl_amt']."</td>";
                 echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="bl'.$rowData['bl_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                 echo "</tr>";
                  }
            }
            else {
              echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
            }
        break;

        case 'vendor_payment':
          require_once 'db.php';
          $stmt = $dbcon->prepare("SELECT * FROM accounts_vp WHERE vp_ceo_approv='FALSE'");
          $stmt->execute();
          $rowCount = $stmt->fetchAll();
          $nRows = count($rowCount);
              if ($nRows > 0) {
                foreach ($rowCount as $rowData) {
                   echo "<tr>";
                   echo "<td>".$rowData['vp_dt']."</td>";
                   echo "<td>".$rowData['vp_name']."</td>";
                   echo "<td>".$rowData['vp_amt']."</td>";
                   echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="vp'.$rowData['vp_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                   echo "</tr>";
                    }
              }
              else {
                echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
              }
          break;

    default:
      echo 'Cannot Find Any Pending Approvals';
      break;
  }
}
?>
