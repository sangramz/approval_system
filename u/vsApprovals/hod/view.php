<?php

function ViewPendApprov($view) {

  switch ($view) {

    case 'money_requisition':
      require_once '../../db.php';
      $stmt = $dbcon->prepare("SELECT * FROM mr WHERE hod_approv='FALSE'");
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
        require_once '../db.php';
        $stmt = $dbcon->prepare("SELECT * FROM accounts_bl WHERE bl_hod_approv='FALSE'");
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
          require_once '../db.php';
          $stmt = $dbcon->prepare("SELECT * FROM accounts_vp WHERE vp_hod_approv='FALSE'");
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

          case 'daily_sales':
            require_once '../db.php';
            $stmt = $dbcon->prepare("SELECT * FROM sales_dscr WHERE dscr_hod_approv ='FALSE'");
            $stmt->execute();
            $rowCount = $stmt->fetchAll();
            $nRows = count($rowCount);
                if ($nRows > 0) {
                  foreach ($rowCount as $rowData) {
                     echo "<tr>";
                     echo "<td>".$rowData['dscr_dt']."</td>";
                     echo "<td>".$rowData['dscr_h']."</td>";
                     echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="ds'.$rowData['dscr_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                     echo "</tr>";
                      }
                }
                else {
                  echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                }
            break;

            case 'transport':
              require_once '../db.php';
              $stmt = $dbcon->prepare("SELECT * FROM sales_transport WHERE transport_hod_approv ='FALSE'");
              $stmt->execute();
              $rowCount = $stmt->fetchAll();
              $nRows = count($rowCount);
                  if ($nRows > 0) {
                    foreach ($rowCount as $rowData) {
                       echo "<tr>";
                       echo "<td>".$rowData['transport_dt']."</td>";
                       echo "<td>".$rowData['transport_h']."</td>";
                       echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="te'.$rowData['transport_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                       echo "</tr>";
                        }
                  }
                  else {
                    echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                  }
              break;

              case 'site':
                require_once '../db.php';
                $stmt = $dbcon->prepare("SELECT * FROM sales_site WHERE site_hod_approv ='FALSE'");
                $stmt->execute();
                $rowCount = $stmt->fetchAll();
                $nRows = count($rowCount);
                    if ($nRows > 0) {
                      foreach ($rowCount as $rowData) {
                         echo "<tr>";
                         echo "<td>".$rowData['site_date']."</td>";
                         echo "<td>".$rowData['site_h']."</td>";
                         echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="st'.$rowData['site_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                         echo "</tr>";
                          }
                    }
                    else {
                      echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                    }
                break;

                case 'recruitment':
                  require_once '../db.php';
                  $stmt = $dbcon->prepare("SELECT * FROM hr_rec WHERE rec_hod_approv ='FALSE'");
                  $stmt->execute();
                  $rowCount = $stmt->fetchAll();
                  $nRows = count($rowCount);
                      if ($nRows > 0) {
                        foreach ($rowCount as $rowData) {
                           echo "<tr>";
                           echo "<td>".$rowData['rec_dt']."</td>";
                           echo "<td>Recruitment For the Post : ".$rowData['rec_name']."</td>";
                           echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="re'.$rowData['rec_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                           echo "</tr>";
                            }
                      }
                      else {
                        echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                      }
                  break;

                  case 'leave':
                    require_once '../db.php';
                    $stmt = $dbcon->prepare("SELECT * FROM hr_lev WHERE lev_hod_approv ='FALSE'");
                    $stmt->execute();
                    $rowCount = $stmt->fetchAll();
                    $nRows = count($rowCount);
                        if ($nRows > 0) {
                          foreach ($rowCount as $rowData) {
                             echo "<tr>";
                             echo "<td>".$rowData['lev_dt']."</td>";
                             echo "<td>Leave Request by ".$rowData['lev_name']."</td>";
                             echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="le'.$rowData['lev_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                             echo "</tr>";
                              }
                        }
                        else {
                          echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                        }
                    break;

                    case 'vendor_registeration':
                      require_once '../db.php';
                      $stmt = $dbcon->prepare("SELECT * FROM ven_reg WHERE ven_hod_approv ='FALSE'");
                      $stmt->execute();
                      $rowCount = $stmt->fetchAll();
                      $nRows = count($rowCount);
                          if ($nRows > 0) {
                            foreach ($rowCount as $rowData) {
                               echo "<tr>";
                               echo "<td>".$rowData['ven_dt']."</td>";
                               echo "<td>Vendor Registeration for ".$rowData['ven_code']."</td>";
                               echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="vr'.$rowData['ven_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                               echo "</tr>";
                                }
                          }
                          else {
                            echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                          }
                      break;

                      case 'po_approvals':
                        require_once '../db.php';
                        $stmt = $dbcon->prepare("SELECT * FROM comm_po WHERE po_hod_approv ='FALSE'");
                        $stmt->execute();
                        $rowCount = $stmt->fetchAll();
                        $nRows = count($rowCount);
                            if ($nRows > 0) {
                              foreach ($rowCount as $rowData) {
                                 echo "<tr>";
                                 echo "<td>".$rowData['po_dt']."</td>";
                                 echo "<td>PO Approvals for ".$rowData['po_code']."</td>";
                                 echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="po'.$rowData['po_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                                 echo "</tr>";
                                  }
                            }
                            else {
                              echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                            }
                        break;

                        case 'logistics':
                          require_once '../db.php';
                          $stmt = $dbcon->prepare("SELECT * FROM logistics WHERE trans_hod_approv ='FALSE'");
                          $stmt->execute();
                          $rowCount = $stmt->fetchAll();
                          $nRows = count($rowCount);
                              if ($nRows > 0) {
                                foreach ($rowCount as $rowData) {
                                   echo "<tr>";
                                   echo "<td>".$rowData['trans_dt']."</td>";
                                   echo "<td>Logistics bearing Value ".$rowData['trans_val']."</td>";
                                   echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="lo'.$rowData['trans_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                                   echo "</tr>";
                                    }
                              }
                              else {
                                echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                              }
                          break;

                          case 'quotation_approval':
                            require_once '../db.php';
                            $stmt = $dbcon->prepare("SELECT * FROM quotation WHERE quotation_hod_approv ='FALSE'");
                            $stmt->execute();
                            $rowCount = $stmt->fetchAll();
                            $nRows = count($rowCount);
                                if ($nRows > 0) {
                                  foreach ($rowCount as $rowData) {
                                     echo "<tr>";
                                     echo "<td>".$rowData['quotation_dt']."</td>";
                                     echo "<td>Quotation Approval bearing # ".$rowData['quotation_h']."</td>";
                                     echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="qo'.$rowData['quotation_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
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

function ViewApprovedRequest($view) {

  switch ($view) {

    case 'money_requisition':
      require_once '../db.php';
      $stmt = $dbcon->prepare("SELECT * FROM mr WHERE hod_approv='1'");
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
        require_once '../db.php';
        $stmt = $dbcon->prepare("SELECT * FROM accounts_bl WHERE bl_hod_approv='1'");
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
          require_once '../db.php';
          $stmt = $dbcon->prepare("SELECT * FROM accounts_vp WHERE vp_hod_approv='1'");
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

          case 'daily_sales':
            require_once '../db.php';
            $stmt = $dbcon->prepare("SELECT * FROM sales_dscr WHERE dscr_hod_approv ='1'");
            $stmt->execute();
            $rowCount = $stmt->fetchAll();
            $nRows = count($rowCount);
                if ($nRows > 0) {
                  foreach ($rowCount as $rowData) {
                     echo "<tr>";
                     echo "<td>".$rowData['dscr_dt']."</td>";
                     echo "<td>".$rowData['dscr_h']."</td>";
                     echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="ds'.$rowData['dscr_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                     echo "</tr>";
                      }
                }
                else {
                  echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                }
            break;

            case 'transport':
              require_once '../db.php';
              $stmt = $dbcon->prepare("SELECT * FROM sales_transport WHERE transport_hod_approv ='1'");
              $stmt->execute();
              $rowCount = $stmt->fetchAll();
              $nRows = count($rowCount);
                  if ($nRows > 0) {
                    foreach ($rowCount as $rowData) {
                       echo "<tr>";
                       echo "<td>".$rowData['transport_dt']."</td>";
                       echo "<td>".$rowData['transport_h']."</td>";
                       echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="te'.$rowData['transport_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                       echo "</tr>";
                        }
                  }
                  else {
                    echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                  }
              break;

              case 'site':
                require_once '../db.php';
                $stmt = $dbcon->prepare("SELECT * FROM sales_site WHERE site_hod_approv ='1'");
                $stmt->execute();
                $rowCount = $stmt->fetchAll();
                $nRows = count($rowCount);
                    if ($nRows > 0) {
                      foreach ($rowCount as $rowData) {
                         echo "<tr>";
                         echo "<td>".$rowData['site_date']."</td>";
                         echo "<td>".$rowData['site_h']."</td>";
                         echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="st'.$rowData['site_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                         echo "</tr>";
                          }
                    }
                    else {
                      echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                    }
                break;

                case 'recruitment':
                  require_once '../db.php';
                  $stmt = $dbcon->prepare("SELECT * FROM hr_rec WHERE rec_hod_approv ='1'");
                  $stmt->execute();
                  $rowCount = $stmt->fetchAll();
                  $nRows = count($rowCount);
                      if ($nRows > 0) {
                        foreach ($rowCount as $rowData) {
                           echo "<tr>";
                           echo "<td>".$rowData['rec_dt']."</td>";
                           echo "<td>Recruitment For the Post : ".$rowData['rec_name']."</td>";
                           echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="re'.$rowData['rec_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                           echo "</tr>";
                            }
                      }
                      else {
                        echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                      }
                  break;

                  case 'leave':
                    require_once '../db.php';
                    $stmt = $dbcon->prepare("SELECT * FROM hr_lev WHERE lev_hod_approv ='1'");
                    $stmt->execute();
                    $rowCount = $stmt->fetchAll();
                    $nRows = count($rowCount);
                        if ($nRows > 0) {
                          foreach ($rowCount as $rowData) {
                             echo "<tr>";
                             echo "<td>".$rowData['lev_dt']."</td>";
                             echo "<td>Leave Request by ".$rowData['lev_name']."</td>";
                             echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="le'.$rowData['lev_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                             echo "</tr>";
                              }
                        }
                        else {
                          echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                        }
                    break;

                    case 'vendor_registeration':
                      require_once '../db.php';
                      $stmt = $dbcon->prepare("SELECT * FROM ven_reg WHERE ven_hod_approv ='1'");
                      $stmt->execute();
                      $rowCount = $stmt->fetchAll();
                      $nRows = count($rowCount);
                          if ($nRows > 0) {
                            foreach ($rowCount as $rowData) {
                               echo "<tr>";
                               echo "<td>".$rowData['ven_dt']."</td>";
                               echo "<td>Vendor Registeration for ".$rowData['ven_code']."</td>";
                               echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="vr'.$rowData['ven_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                               echo "</tr>";
                                }
                          }
                          else {
                            echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                          }
                      break;

                      case 'po_approvals':
                        require_once '../db.php';
                        $stmt = $dbcon->prepare("SELECT * FROM comm_po WHERE po_hod_approv ='1'");
                        $stmt->execute();
                        $rowCount = $stmt->fetchAll();
                        $nRows = count($rowCount);
                            if ($nRows > 0) {
                              foreach ($rowCount as $rowData) {
                                 echo "<tr>";
                                 echo "<td>".$rowData['po_dt']."</td>";
                                 echo "<td>PO Approvals for ".$rowData['po_code']."</td>";
                                 echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="po'.$rowData['po_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                                 echo "</tr>";
                                  }
                            }
                            else {
                              echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                            }
                        break;

                        case 'logistics':
                          require_once '../db.php';
                          $stmt = $dbcon->prepare("SELECT * FROM logistics WHERE trans_hod_approv ='1'");
                          $stmt->execute();
                          $rowCount = $stmt->fetchAll();
                          $nRows = count($rowCount);
                              if ($nRows > 0) {
                                foreach ($rowCount as $rowData) {
                                   echo "<tr>";
                                   echo "<td>".$rowData['trans_dt']."</td>";
                                   echo "<td>Logistics bearing Value ".$rowData['trans_val']."</td>";
                                   echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="lo'.$rowData['trans_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
                                   echo "</tr>";
                                    }
                              }
                              else {
                                echo '<tr style="text-align:center"><b style="color:red">No Pending Approvals</b></tr>';
                              }
                          break;

                          case 'quotation_approval':
                            require_once '../db.php';
                            $stmt = $dbcon->prepare("SELECT * FROM quotation WHERE quotation_hod_approv ='1'");
                            $stmt->execute();
                            $rowCount = $stmt->fetchAll();
                            $nRows = count($rowCount);
                                if ($nRows > 0) {
                                  foreach ($rowCount as $rowData) {
                                     echo "<tr>";
                                     echo "<td>".$rowData['quotation_dt']."</td>";
                                     echo "<td>Quotation Approval bearing # ".$rowData['quotation_h']."</td>";
                                     echo '<td><button class="btn btn-warning" data-toggle="modal" data-target="#va" id="bt_va" data-id="qo'.$rowData['quotation_sl'].'"><i class="glyphicon glyphicon-eye-open"></i> View Approval</button></td>';
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
