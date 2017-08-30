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
              if ($rowData['mr_reject'] == 'Rejected by HOD' OR $rowData['mr_reject'] == 'Rejected by CEO' OR $rowData['mr_reject'] == 'Rejected by Director') {
                $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['mr_reject'] .' </div><br>
                <a class="btn btn-danger" href="u/del.php?type=money_requisition&id='.$rowData['mr_sl'].'">Delete It !</a>';
              }
              else {
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
                  $btn = '';
                  $btn_reject = '';
                } else {
                  $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                  $btn = '<a href="u/approv.php?id='.$rowData['mr_sl'].'&type=money_requisition&approver=ceo">
                  <i class="fa fa-check"></i>Approve</button>
                  </a>';
                  $btn_reject = '<a href="u/reject.php?id='.$rowData['mr_sl'].'&type=money_requisition&approver=ceo">
                  <i class="fa fa-ban"></i>Reject</button>
                  </a>';
                }
                $action = '<div class="dropdown">
                   <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-bars"></i> Actions
                     <span class="caret"></span>
                   </button>
                   <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                     <li>'.$btn.'</li>
                     <li>'.$btn_reject.'</li>
                     <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                     <li><a href="u/del.php?type=money_requisition&id='.$rowData['mr_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                     <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                   </ul>
                 </div>';
              }


               echo '<div class="col-sm-3">
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
               <div class="col-sm-9">
                 <div class="panel panel-primary">
                   <div class="panel panel-body">
                     <b>Requisition Made on: </b>'.$rowData['mr_date'].' <br/>
                     <b>Made By : </b>'.$rowData['mr_made_by'].' <br/>
                     <b>Purpose : </b> '.$rowData['mr_purpose'].' <br/><br/>
                     <b style="color:red">Amount :</b> '.$rowData['mr_amount'].'<br/><br/>
                     '.$action.'
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
                if ($rowData['vp_reject'] == 'Rejected by HOD' OR $rowData['vp_reject'] == 'Rejected by CEO' OR $rowData['vp_reject'] == 'Rejected by Director') {
                  $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['vp_reject'] .' </div><br>
                  <a class="btn btn-danger" href="u/del.php?type=vendor_payment&id='.$rowData['vp_sl'].'">Delete It !</a>';
                }
                else {
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
                    $btn = '';
                    $btn_reject = '';
                  } else {
                    $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                    $btn = '<a href="u/approv.php?id='.$rowData['vp_sl'].'&type=vendor_payment&approver=ceo">
                    <i class="fa fa-check"></i>Approve
                    </a>';
                    $btn_reject = '<a href="u/reject.php?id='.$rowData['vp_sl'].'&type=vendor_payment&approver=ceo">
                    <i class="fa fa-ban"></i>Reject
                    </a>';

                  }
                  $action = '<div class="dropdown">
                     <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fa fa-bars"></i> Actions
                       <span class="caret"></span>
                     </button>
                     <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                       <li>'.$btn.'</li>
                       <li>'.$btn_reject.'</li>
                       <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                       <li><a href="u/del.php?type=vendor_payment&id='.$rowData['vp_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                       <li><a href=""><i class="fa fa-print"></i> Print </a></li>
                     </ul>
                   </div>';
                }

                 echo '<div class="col-sm-3">
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
                 <div class="col-sm-9">
                   <div class="panel panel-primary">
                     <div class="panel panel-body">
                       <b>Date: </b>'.$rowData['vp_dt'].' <br/>
                       <b>Vendor : </b>'.$rowData['vp_name'].' <br/>
                       <b>Bill No : </b>'.$rowData['vp_billno'].' <br/>
                       <b>Bill Ref : </b>'.$rowData['vp_billref'].' <br/><br/>
                       <b>Remarks/Note : </b> '.$rowData['vp_note'].' <br/><br/>
                       <b style="color:red">Amount :</b> '.$rowData['vp_amt'].'<br/>
                       '.$action.'
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
                  if ($rowData['bl_reject'] == 'Rejected by HOD' OR $rowData['bl_reject'] == 'Rejected by CEO' OR $rowData['bl_reject'] == 'Rejected by Director') {
                    $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['bl_reject'] .' </div><br>
                    <a class="btn btn-danger" href="u/del.php?type=billing&id='.$rowData['bl_sl'].'">Delete It !</a>';
                  }
                  else {
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
                      $btn = '';
                      $btn_reject = '';
                    } else {
                      $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                      $btn = '<a href="u/approv.php?id='.$rowData['bl_sl'].'&type=billing&approver=ceo">
                      <i class="fa fa-check"></i>Approve
                      </a>';
                      $btn_reject = '<a href="u/reject.php?id='.$rowData['bl_sl'].'&type=billing&approver=ceo">
                      <i class="fa fa-ban"></i>Reject
                      </a>';
                    }
                    $action = '<div class="dropdown">
                       <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fa fa-bars"></i> Actions
                         <span class="caret"></span>
                       </button>
                       <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                         <li>'.$btn.'</li>
                         <li>'.$btn_reject.'</li>
                         <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                         <li><a href="u/del.php?type=billing&id='.$rowData['bl_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                         <li><a href=""><i class="fa fa-print"></i> Print </a></li>
                       </ul>
                     </div>';
                  }

                   echo '<div class="col-sm-3">
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
                   <div class="col-sm-9">
                     <div class="panel panel-primary">
                       <div class="panel panel-body">
                         <b>Date: </b>'.$rowData['bl_dt'].' <br/>
                         <b>Client : </b>'.$rowData['bl_name'].' <br/>
                         <b>Bill No : </b>'.$rowData['bl_no'].' <br/>
                         <b>Site : </b>'.$rowData['bl_site'].' <br/><br/>
                         <b>Remarks/Note : </b> '.$rowData['bl_note'].' <br/><br/>
                         <b style="color:red">Amount :</b> '.$rowData['bi_amt'].'<br/><br/>
                         '.$action.'

                       </div>
                     </div>
                   </div>';
                    }
              }
              else {
                echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
              }
        break;

        case 'ds':
            $stmt = $dbcon->prepare("SELECT * FROM sales_dscr WHERE dscr_sl='$id'");
            $stmt->execute();
            $rowCount = $stmt->fetchAll();
            $nRows = count($rowCount);
                if ($nRows = 1) {
                  foreach ($rowCount as $rowData) {
                    if ($rowData['dscr_reject'] == 'Rejected by HOD' OR $rowData['dscr_reject'] == 'Rejected by CEO' OR $rowData['dscr_reject'] == 'Rejected by Director') {
                      $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['dscr_reject'] .' </div><br>
                      <a class="btn btn-danger" href="u/del.php?type=dscr&id='.$rowData['dscr_sl'].'">Delete It !</a>';
                    }
                    else {
                      if ($rowData['dscr_hod_approv'] == TRUE) {
                        $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                      } else {
                        $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                      }
                      if ($rowData['dscr_director_approv'] == TRUE) {
                        $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                      } else {
                        $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                      }
                      if ($rowData['dscr_ceo_approv'] == TRUE) {
                        $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                        $btn = '';
                        $btn_reject = '';
                      } else {
                        $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                        $btn = '<a href="u/approv.php?id='.$rowData['dscr_sl'].'&type=dscr&approver=ceo">
                        <i class="fa fa-check"></i>Approve
                        </a>';

                        $btn_reject = '<a href="u/reject.php?id='.$rowData['dscr_sl'].'&type=dscr&approver=ceo">
                        <i class="fa fa-ban"></i>Reject
                        </a>';
                      }
                      $action = '<div class="dropdown">
                         <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-bars"></i> Actions
                           <span class="caret"></span>
                         </button>
                         <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                           <li>'.$btn.'</li>
                           <li>'.$btn_reject.'</li>
                           <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                           <li><a href="u/del.php?type=dscr&id='.$rowData['dscr_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                           <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                         </ul>
                       </div>';
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
                           <b>DSCR Date: </b>'.$rowData['dscr_dt'].' <br/>
                           <b>DSCR # : </b>'.$rowData['dscr_h'].' <br/><br/>
                           <b>Location : </b>'.$rowData['dscr_loc'].' <br/><br/>
                           <b>Remarks : </b>'.$rowData['dscr_rem'].' <br/><br/>
                           '.$action.'
                         </div>
                       </div>
                     </div>';
                      }
                }
                else {
                  echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
                }
          break;

          case 'te':
              $stmt = $dbcon->prepare("SELECT * FROM sales_transport WHERE transport_sl='$id'");
              $stmt->execute();
              $rowCount = $stmt->fetchAll();
              $nRows = count($rowCount);
                  if ($nRows = 1) {
                    foreach ($rowCount as $rowData) {
                      if ($rowData['transport_reject'] == 'Rejected by HOD' OR $rowData['transport_reject'] == 'Rejected by CEO' OR $rowData['transport_reject'] == 'Rejected by Director') {
                        $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['transport_reject'] .' </div><br>
                        <a class="btn btn-danger" href="u/del.php?type=sales_transport&id='.$rowData['transport_sl'].'">Delete It !</a>';
                      }
                      else {
                        if ($rowData['transport_hod_approv'] == TRUE) {
                          $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                        } else {
                          $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                        }
                        if ($rowData['transport_director_approv'] == TRUE) {
                          $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                        } else {
                          $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                        }
                        if ($rowData['transport_ceo_approv'] == TRUE) {
                          $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                          $btn = '';
                          $btn_reject = '';
                        } else {
                          $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                          $btn = '<a href="u/approv.php?id='.$rowData['transport_sl'].'&type=sales_transport&approver=ceo">
                           <i class="fa fa-check"></i>Approve
                           </a>';
                           $btn_reject = '<a href="u/reject.php?id='.$rowData['transport_sl'].'&type=sales_transport&approver=ceo">
                            <i class="fa fa-ban"></i>Reject
                            </a>';
                        }
                        $action = '<div class="dropdown">
                           <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fa fa-bars"></i> Actions
                             <span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                             <li>'.$btn.'</li>
                             <li>'.$btn_reject.'</li>
                             <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                             <li><a href="u/del.php?type=sales_transport&id='.$rowData['transport_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                             <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                           </ul>
                         </div>
';
                      }


                       echo '<div class="col-sm-3">
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
                       <div class="col-sm-9">
                         <div class="panel panel-primary">
                           <div class="panel panel-body">
                             <b>Bill Date: </b>'.$rowData['transport_dt'].' <br/>
                             <b>Expenditure Bill # : </b>'.$rowData['transport_h'].' <br/><br/>

                             <b>Remarks : </b>'.$rowData['transport_rem'].' <br/><br/>
                             '.$action.'
                           </div>
                         </div>
                       </div>';
                        }
                  }
                  else {
                    echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
                  }
            break;

            case 'st':
                $stmt = $dbcon->prepare("SELECT * FROM sales_site WHERE site_sl='$id'");
                $stmt->execute();
                $rowCount = $stmt->fetchAll();
                $nRows = count($rowCount);
                    if ($nRows = 1) {
                      foreach ($rowCount as $rowData) {
                        if ($rowData['site_reject'] == 'Rejected by HOD' OR $rowData['site_reject'] == 'Rejected by CEO' OR $rowData['site_reject'] == 'Rejected by Director') {
                          $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['site_reject'] .' </div><br>
                          <a class="btn btn-danger" href="u/del.php?type=site_report&id='.$rowData['site_sl'].'">Delete It !</a>';
                        }
                        else {
                          if ($rowData['site_hod_approv'] == TRUE) {
                            $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                          } else {
                            $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                          }
                          if ($rowData['site_director_approv'] == TRUE) {
                            $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                          } else {
                            $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                          }
                          if ($rowData['site_ceo_approv'] == TRUE) {
                            $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                            $btn = '';
                          } else {
                            $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                            $btn = '<a href="u/approv.php?id='.$rowData['site_sl'].'&type=site_report&approver=ceo">
                            <i class="fa fa-check"></i>Approve
                            </a>';
                            $btn_reject = '<a href="u/reject.php?id='.$rowData['site_sl'].'&type=site_report&approver=ceo">
                            <i class="fa fa-ban"></i>Reject
                            </a>';
                          }
                          $action = ' <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bars"></i> Actions
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                                <li>'.$btn.'</li>
                                <li>'.$btn_reject.'</li>
                                <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                                <li><a href="u/del.php?type=site_report&id='.$rowData['site_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                                <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                              </ul>
                            </div>';
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
                               <b>Date: </b>'.$rowData['site_date'].' <br/>
                               <b>Report # : </b>'.$rowData['site_h'].' <br/>

                               <b>Location : </b>'.$rowData['site_loc'].' <br/>
                               <b>Client : </b>'.$rowData['site_client'].' <br/><br/>
                               <b>Remarks : </b>'.$rowData['site_rem'].'<br/><br/>
                              '.$action.'
                             </div>
                           </div>
                         </div>';
                          }
                    }
                    else {
                      echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
                    }
              break;

          case 're':
              $stmt = $dbcon->prepare("SELECT * FROM hr_rec WHERE rec_sl='$id'");
              $stmt->execute();
              $rowCount = $stmt->fetchAll();
              $nRows = count($rowCount);
                  if ($nRows = 1) {
                    foreach ($rowCount as $rowData) {
                      if ($rowData['rec_reject'] == 'Rejected by HOD' OR $rowData['rec_reject'] == 'Rejected by CEO' OR $rowData['rec_reject'] == 'Rejected by Director') {
                        $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['rec_reject'] .' </div><br>
                        <a class="btn btn-danger" href="u/del.php?type=recruitment&id='.$rowData['rec_sl'].'">Delete It !</a>';
                      }
                      else {
                        if ($rowData['rec_hod_approv'] == TRUE) {
                          $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                        } else {
                          $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                        }
                        if ($rowData['rec_director_approv'] == TRUE) {
                          $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                        } else {
                          $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                        }
                        if ($rowData['rec_ceo_approv'] == TRUE) {
                          $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                          $btn = '';
                          $btn_reject= '';
                        } else {
                          $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                          $btn = '<a href="u/approv.php?id='.$rowData['rec_sl'].'&type=recruitment&approver=ceo">
                          <i class="fa fa-check"></i>Approve
                          </a>';
                          $btn_reject = '<a href="u/reject.php?id='.$rowData['rec_sl'].'&type=recruitment&approver=ceo">
                          <i class="fa fa-ban"></i>Reject
                          </a>';
                        }
                        $action = '<div class="dropdown">
                           <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <i class="fa fa-bars"></i> Actions
                             <span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                             <li>'.$btn.'</li>
                             <li>'.$btn_reject.'</li>
                             <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                             <li><a href="u/del.php?type=recruitment&id='.$rowData['rec_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                             <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                           </ul>
                         </div>';
                      }


                       echo '<div class="col-sm-3">
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
                       <div class="col-sm-9">
                         <div class="panel panel-primary">
                           <div class="panel panel-body">
                             <b>Date: </b>'.$rowData['rec_dt'].' <br/>
                             <b>Post : </b>'.$rowData['rec_name'].' <br/>

                             <b>No of Post : </b>'.$rowData['rec_h'].' <br/>
                             <br/>
                             <b>Remarks : </b>'.$rowData['rec_rem'].'
                             <br/><br/>
                             '.$action.'
                           </div>
                         </div>
                       </div>';
                        }
                  }
                  else {
                    echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
                  }
            break;

            case 'le':
                $stmt = $dbcon->prepare("SELECT * FROM hr_lev WHERE lev_sl='$id'");
                $stmt->execute();
                $rowCount = $stmt->fetchAll();
                $nRows = count($rowCount);
                    if ($nRows = 1) {
                      foreach ($rowCount as $rowData) {
                        if ($rowData['lev_reject'] == 'Rejected by HOD' OR $rowData['lev_reject'] == 'Rejected by CEO' OR $rowData['lev_reject'] == 'Rejected by Director') {
                          $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['lev_reject'] .' </div><br>
                          <a class="btn btn-danger" href="u/del.php?type=leave&id='.$rowData['lev_sl'].'">Delete It !</a>';
                        }
                        else {
                          if ($rowData['lev_hod_approv'] == TRUE) {
                            $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                          } else {
                            $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                          }
                          if ($rowData['lev_director_approv'] == TRUE) {
                            $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                          } else {
                            $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                          }
                          if ($rowData['lev_ceo_approv'] == TRUE) {
                            $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                            $btn = '';
                            $btn_reject = '';
                          } else {
                            $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                            $btn = '<a href="u/approv.php?id='.$rowData['lev_sl'].'&type=leave&approver=ceo">
                             <i class="fa fa-check"></i>Approve
                             </a>';
                           $btn_reject = '<a href="u/reject.php?id='.$rowData['lev_sl'].'&type=leave&approver=ceo">
                            <i class="fa fa-ban">Reject
                            </a>';
                          }
                          $action = '<div class="dropdown">
                             <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-bars"></i> Actions
                               <span class="caret"></span>
                             </button>
                             <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                               <li>'.$btn.'</li>
                               <li>'.$btn_reject.'</li>
                               <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                               <li><a href="u/del.php?type=leave&id='.$rowData['lev_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                               <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                             </ul>
                           </div>';
                        }


                         echo '<div class="col-sm-3">
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
                         <div class="col-sm-9">
                           <div class="panel panel-primary">
                             <div class="panel panel-body">
                               <b>Date: </b>'.$rowData['lev_dt'].' <br/>
                               <b>Requested By : </b>'.$rowData['lev_name'].' <br/>

                               <b>No of Days : </b>'.$rowData['lev_no'].' <br/>
                               <br/>
                               <b>Remarks/Details : </b>'.$rowData['lev_rem'].'<br/><br/>
                               '.$action.'
                             </div>
                           </div>
                         </div>';
                          }
                    }
                    else {
                      echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
                    }
              break;

              case 'vr':
                  $stmt = $dbcon->prepare("SELECT * FROM ven_reg WHERE ven_sl='$id'");
                  $stmt->execute();
                  $rowCount = $stmt->fetchAll();
                  $nRows = count($rowCount);
                      if ($nRows = 1) {
                        foreach ($rowCount as $rowData) {
                          if ($rowData['ven_reject'] == 'Rejected by HOD' OR $rowData['ven_reject'] == 'Rejected by CEO' OR $rowData['ven_reject'] == 'Rejected by Director') {
                            $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['ven_reject'] .' </div><br>
                            <a class="btn btn-danger" href="u/del.php?type=vendor_registeration&id='.$rowData['ven_sl'].'">Delete It !</a>';
                          }
                          else {
                            if ($rowData['ven_hod_approv'] == TRUE) {
                              $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                            } else {
                              $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                            }
                            if ($rowData['ven_director_approv'] == TRUE) {
                              $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                            } else {
                              $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                            }
                            if ($rowData['ven_ceo_approv'] == TRUE) {
                              $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                              $btn = '';
                              $btn_reject = '';
                            } else {
                              $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                              $btn = '<a href="u/approv.php?id='.$rowData['ven_sl'].'&type=vendor_registeration&approver=ceo">
                              <i class="fa fa-check"></i>Approve
                              </a>';
                              $btn_reject = '<a href="u/reject.php?id='.$rowData['ven_sl'].'&type=vendor_registeration&approver=ceo">
                              <i class="fa fa-ban"></i>Reject
                              </a>';
                            }
                            $action = '<div class="dropdown">
                               <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fa fa-bars"></i> Actions
                                 <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                                 <li>'.$btn.'</li>
                                 <li>'.$btn_reject.'</li>
                                 <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                                 <li><a href="u/del.php?type=vendor_registeration&id='.$rowData['ven_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                                 <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                               </ul>
                             </div>';
                          }


                           echo '<div class="col-sm-3">
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
                           <div class="col-sm-9">
                             <div class="panel panel-primary">
                               <div class="panel panel-body">
                                 <b>Date: </b>'.$rowData['ven_dt'].' <br/>
                                 <b>Vendor Code : </b>'.$rowData['ven_code'].' <br/>

                                 <b>Vendor Details : </b>'.$rowData['ven_det'].' <br/>
                                 <br/>
                                 <b>Remarks/Details : </b>'.$rowData['ven_rem'].'
                                 <br><br>
                                 '.$action.'
                               </div>
                             </div>
                           </div>';
                            }
                      }
                      else {
                        echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
                      }
                break;

                case 'po':
                    $stmt = $dbcon->prepare("SELECT * FROM comm_po WHERE po_sl='$id'");
                    $stmt->execute();
                    $rowCount = $stmt->fetchAll();
                    $nRows = count($rowCount);
                        if ($nRows = 1) {
                          foreach ($rowCount as $rowData) {
                            if ($rowData['po_reject'] == 'Rejected by HOD' OR $rowData['po_reject'] == 'Rejected by CEO' OR $rowData['po_reject'] == 'Rejected by Director') {
                              $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['po_reject'] .' </div><br>
                              <a class="btn btn-danger" href="u/del.php?type=po_approval&id='.$rowData['po_sl'].'">Delete It !</a>';
                            }
                            else {
                              if ($rowData['po_hod_approv'] == TRUE) {
                                $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                              } else {
                                $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                              }
                              if ($rowData['po_director_approv'] == TRUE) {
                                $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                              } else {
                                $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                              }
                              if ($rowData['po_ceo_approv'] == TRUE) {
                                $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                                $btn = '';
                                $btn_reject = '';
                              } else {
                                $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                                $btn = '<a href="u/approv.php?id='.$rowData['po_sl'].'&type=po_approval&approver=ceo">
                                <i class="fa fa-check"></i>Approve
                                </a>';
                                $btn_reject = '<a href="u/reject.php?id='.$rowData['po_sl'].'&type=po_approval&approver=ceo">
                                <i class="fa fa-ban"></i>Reject
                                </a>';
                              }
                              $action = ' <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars"></i> Actions
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                                    <li>'.$btn.'</li>
                                    <li>'.$btn_reject.'</li>
                                    <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                                    <li><a href="u/del.php?type=po_approval&id='.$rowData['po_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                                    <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                                  </ul>
                                </div>';
                            }


                             echo '<div class="col-sm-3">
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
                             <div class="col-sm-9">
                               <div class="panel panel-primary">
                                 <div class="panel panel-body">
                                   <b>PO Date: </b>'.$rowData['po_dt'].' <br/>
                                   <b>PO # : </b>'.$rowData['po_h'].' <br/>
                                   <b>Vendor Code : </b>'.$rowData['po_code'].' <br/>

                                   <b>Vendor Details : </b>'.$rowData['po_det'].' <br/>
                                   <br/>
                                   <b>Remarks/Details : </b>'.$rowData['po_rem'].' <br/><br/>
                                  '.$action.'
                                 </div>
                               </div>
                             </div>';
                              }
                        }
                        else {
                          echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
                        }
                  break;

                  case 'lo':
                      $stmt = $dbcon->prepare("SELECT * FROM logistics WHERE trans_sl='$id'");
                      $stmt->execute();
                      $rowCount = $stmt->fetchAll();
                      $nRows = count($rowCount);
                          if ($nRows = 1) {
                            foreach ($rowCount as $rowData) {
                              if ($rowData['trans_reject'] == 'Rejected by HOD' OR $rowData['trans_reject'] == 'Rejected by CEO' OR $rowData['trans_reject'] == 'Rejected by Director') {
                                $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['trans_reject'] .' </div><br>
                                <a class="btn btn-danger" href="u/del.php?type=logistics&id='.$rowData['trans_sl'].'">Delete It !</a>';
                              }
                              else {
                                if ($rowData['trans_hod_approv'] == TRUE) {
                                  $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                                } else {
                                  $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                                }
                                if ($rowData['trans_director_approv'] == TRUE) {
                                  $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                                } else {
                                  $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                                }
                                if ($rowData['trans_ceo_approv'] == TRUE) {
                                  $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                                  $btn = '';
                                  $btn_reject = '';
                                } else {
                                  $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                                  $btn = '<a href="u/approv.php?id='.$rowData['trans_sl'].'&type=logistics&approver=ceo">
                                  <i class="fa fa-check"></i>Approve
                                  </a>';
                                  $btn_reject = '<a href="u/reject.php?id='.$rowData['trans_sl'].'&type=logistics&approver=ceo">
                                  <i class="fa fa-ban"></i>Reject
                                  </a>';
                                }
                                $action = '<div class="dropdown">
                                   <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <i class="fa fa-bars"></i> Actions
                                     <span class="caret"></span>
                                   </button>
                                   <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                                     <li>'.$btn.'</li>
                                     <li>'.$btn_reject.'</li>
                                     <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                                     <li><a href="u/del.php?type=logistics&id='.$rowData['trans_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                                     <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                                   </ul>
                                 </div>';
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
                                     <b>Transportation Date: </b>'.$rowData['trans_dt'].' <br/>
                                     <b>Transportation Value : </b>'.$rowData['trans_val'].' <br/><br/>
                                     <b>Tranporter Details : </b>'.$rowData['trans_det'].' <br/><br/>

                                     <b>Remarks/Details : </b>'.$rowData['trans_rem'].'<br><br>
                                     '.$action.'
                                   </div>
                                 </div>
                               </div>';
                                }
                          }
                          else {
                            echo '<tr style="text-align:center"><b style="color:red">Some Error Occured</b></tr>';
                          }
                    break;

                    case 'qo':
                        $stmt = $dbcon->prepare("SELECT * FROM quotation WHERE quotation_sl='$id'");
                        $stmt->execute();
                        $rowCount = $stmt->fetchAll();
                        $nRows = count($rowCount);
                            if ($nRows = 1) {
                              foreach ($rowCount as $rowData) {
                                if ($rowData['quotation_reject'] == 'Rejected by HOD' OR $rowData['quotation_reject'] == 'Rejected by CEO' OR $rowData['quotation_reject'] == 'Rejected by Director') {
                                  $action = '<div class="alert alert-danger" role="alert"> <strong>APPROVAL REJECTED!</strong>This approval has been '. $rowData['quotation_reject'] .' </div><br>
                                  <a class="btn btn-danger" href="u/del.php?type=quotation&id='.$rowData['quotation_sl'].'">Delete It !</a>';
                                }
                                else {
                                  if ($rowData['quotation_hod_approv'] == TRUE) {
                                    $hod_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                                  } else {
                                    $hod_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                                  }
                                  if ($rowData['quotation_director_approv'] == TRUE) {
                                    $direct_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';

                                  } else {
                                    $direct_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';

                                  }
                                  if ($rowData['quotation_ceo_approv'] == TRUE) {
                                    $ceo_approv = '<small class="color-success"><i class="fa fa-check"></i> Approved</small>';
                                    $btn = '';
                                    $btn_reject = '';
                                  } else {
                                    $ceo_approv= '<small class="color-danger"><i class="fa fa-times"></i> Pending</small>';
                                    $btn = '<a href="u/approv.php?id='.$rowData['quotation_sl'].'&type=quotation&approver=ceo">
                                     <i class="fa fa-check"></i>Approve
                                     </a>';
                                     $btn_reject = '<a href="u/reject.php?id='.$rowData['quotation_sl'].'&type=quotation&approver=ceo">
                                      <i class="fa fa-ban"></i>Reject
                                      </a>';
                                  }
                                  $action = '<div class="dropdown">
                                     <button class="btn btn-primary dropdown-toggle" type="button" id="menu10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="fa fa-bars"></i> Actions
                                       <span class="caret"></span>
                                     </button>
                                     <ul class="dropdown-menu bg-danger" aria-labelledby="menu10">
                                       <li>'.$btn.'</li>
                                       <li>'.$btn_reject.'</li>
                                       <li><a href=""><i class="fa fa-edit"></i> Edit </a></li>
                                       <li><a href="u/del.php?type=quotation&id='.$rowData['quotation_sl'].'"><i class="fa fa-minus-square"></i> Delete</a></li>
                                       <li><a href=""><i class="fa fa-print"></i> Print </a></li>

                                     </ul>
                                   </div>';
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
                                       <b>Quotation Date: </b>'.$rowData['quotation_dt'].' <br/>
                                       <b>Quotation # : </b>'.$rowData['quotation_h'].' <br/><br/>
                                       <b>Client Details : </b>'.$rowData['quotation_det'].' <br/><br/>

                                       <b>Remarks/Details : </b>'.$rowData['quotation_rem'].'<br><br>
                                       '.$action.'
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
