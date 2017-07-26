<?php
require_once 'db.php';
$pd = $_POST['rowid'];
$type = $pd[0].$pd[1];
$id = substr($pd, 2);


switch ($type) {
  case 'mr':
      $stmt = $dbcon->prepare("SELECT * FROM mr WHERE mr_sl='$id'");
      $stmt->execute();
      $rowCount = $stmt->fetchAll();
      $nRows = count($rowCount);
          if ($nRows = 1) {
            foreach ($rowCount as $rowData) {
              if ($rowData['hod_approv'] == TRUE) {
                $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
              } else {
                $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
              }
              if ($rowData['direct_approv'] == TRUE) {
                $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
              } else {
                $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
              }
              if ($rowData['ceo_approv'] == TRUE) {
                $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
              } else {
                $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
              }

               echo '<div class="col-sm-4">
                 <div class="panel border-primary no-border border-3-top">
                 <div class="panel-heading">
                     <div class="panel-title">
                         <h5>Status</h5>
                     </div>
                 </div>
                 <div class="panel-body">
                     <div class="row">
                         <table class="table table-striped">
                           <tbody>
                             <tr>
                               <th>Hod</th>
                               <td>
                                '.$hod_approv.'
                                </td>
                             </tr>
                             <tr>
                               <th>Director</th>
                               <td>
                                '.$direct_approv.'
                                </td>
                             </tr>
                             <tr>
                               <th>CEO</th>
                               <td>
                                '.$ceo_approv.'
                              </td>
                             </tr>
                           </tbody>
                         </table>
                     </div>
                 </div>
             </div>
               </div>
               <div class="col-sm-7">
                 <div class="panel panel-primary">
                   <div class="panel panel-body">
                     <b>Requisition Made on: </b>'.$rowData['mr_date'].' <br/>
                     <b>Made By : </b>'.$rowData['mr_made_by'].' <br/>
                     <b>Purpose : </b> '.$rowData['mr_purpose'].' <br/><br/>
                     <b style="color:red">Amount :</b> '.$rowData['mr_amount'].'<br/>

                   </div>
                 </div>
               </div>';
                }
          }
          else {
            echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
          }
    break;

    case 'vp':
        $stmt = $dbcon->prepare("SELECT * FROM accounts_vp WHERE vp_sl='$id'");
        $stmt->execute();
        $rowCount = $stmt->fetchAll();
        $nRows = count($rowCount);
            if ($nRows = 1) {
              foreach ($rowCount as $rowData) {
                if ($rowData['vp_hod_approv'] == TRUE) {
                  $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                } else {
                  $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                }
                if ($rowData['vp_director_approv'] == TRUE) {
                  $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                } else {
                  $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                }
                if ($rowData['vp_ceo_approv'] == TRUE) {
                  $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                } else {
                  $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                }

                 echo '<div class="col-sm-4">
                   <div class="panel border-primary no-border border-3-top">
                   <div class="panel-heading">
                       <div class="panel-title">
                           <h5>Status</h5>
                       </div>
                   </div>
                   <div class="panel-body">
                       <div class="row">
                           <table class="table table-striped">
                             <tbody>
                               <tr>
                                 <th>Hod</th>
                                 <td>
                                  '.$hod_approv.'
                                  </td>
                               </tr>
                               <tr>
                                 <th>Director</th>
                                 <td>
                                  '.$direct_approv.'
                                  </td>
                               </tr>
                               <tr>
                                 <th>CEO</th>
                                 <td>
                                  '.$ceo_approv.'
                                </td>
                               </tr>
                             </tbody>
                           </table>
                       </div>
                   </div>
               </div>
                 </div>
                 <div class="col-sm-7">
                   <div class="panel panel-primary">
                     <div class="panel panel-body">
                       <b>Date: </b>'.$rowData['vp_dt'].' <br/>
                       <b>Vendor : </b>'.$rowData['vp_name'].' <br/>
                       <b>Bill No : </b>'.$rowData['vp_billno'].' <br/>
                       <b>Bill Ref : </b>'.$rowData['vp_billref'].' <br/><br/>
                       <b>Remarks/Note : </b> '.$rowData['vp_note'].' <br/><br/>
                       <b style="color:red">Amount :</b> '.$rowData['vp_amt'].'<br/>

                     </div>
                   </div>
                 </div>';
                  }
            }
            else {
              echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
            }
      break;

      case 'bl':
          $stmt = $dbcon->prepare("SELECT * FROM accounts_bl WHERE bl_sl='$id'");
          $stmt->execute();
          $rowCount = $stmt->fetchAll();
          $nRows = count($rowCount);
              if ($nRows = 1) {
                foreach ($rowCount as $rowData) {
                  if ($rowData['bl_hod_approv'] == TRUE) {
                    $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                  } else {
                    $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                  }
                  if ($rowData['bl_director_approv'] == TRUE) {
                    $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                  } else {
                    $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                  }
                  if ($rowData['bl_ceo_approv'] == TRUE) {
                    $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                  } else {
                    $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                  }

                   echo '<div class="col-sm-4">
                     <div class="panel border-primary no-border border-3-top">
                     <div class="panel-heading">
                         <div class="panel-title">
                             <h5>Status</h5>
                         </div>
                     </div>
                     <div class="panel-body">
                         <div class="row">
                             <table class="table table-striped">
                               <tbody>
                                 <tr>
                                   <th>Hod</th>
                                   <td>
                                    '.$hod_approv.'
                                    </td>
                                 </tr>
                                 <tr>
                                   <th>Director</th>
                                   <td>
                                    '.$direct_approv.'
                                    </td>
                                 </tr>
                                 <tr>
                                   <th>CEO</th>
                                   <td>
                                    '.$ceo_approv.'
                                  </td>
                                 </tr>
                               </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                   </div>
                   <div class="col-sm-7">
                     <div class="panel panel-primary">
                       <div class="panel panel-body">
                         <b>Date: </b>'.$rowData['bl_dt'].' <br/>
                         <b>Client : </b>'.$rowData['bl_name'].' <br/>
                         <b>Bill No : </b>'.$rowData['bl_no'].' <br/>
                         <b>Site : </b>'.$rowData['bl_site'].' <br/><br/>
                         <b>Remarks/Note : </b> '.$rowData['bl_note'].' <br/><br/>
                         <b style="color:red">Amount :</b> '.$rowData['bi_amt'].'<br/>

                       </div>
                     </div>
                   </div>';
                    }
              }
              else {
                echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
              }
        break;

  default:
    # code...
    break;
}

 ?>
