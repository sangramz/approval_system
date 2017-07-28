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

        case 'ds':
            $stmt = $dbcon->prepare("SELECT * FROM sales_dscr WHERE dscr_sl='$id'");
            $stmt->execute();
            $rowCount = $stmt->fetchAll();
            $nRows = count($rowCount);
                if ($nRows = 1) {
                  foreach ($rowCount as $rowData) {
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
                           <b>DSCR Date: </b>'.$rowData['dscr_dt'].' <br/>
                           <b>DSCR # : </b>'.$rowData['dscr_h'].' <br/><br/>
                           <b>Location : </b>'.$rowData['dscr_loc'].' <br/><br/>
                           <b>Remarks : </b>'.$rowData['dscr_rem'].' <br/><br/>


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
                             <b>Bill Date: </b>'.$rowData['transport_dt'].' <br/>
                             <b>Expenditure Bill # : </b>'.$rowData['transport_h'].' <br/><br/>

                             <b>Remarks : </b>'.$rowData['transport_rem'].' <br/><br/>


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
                               <b>Date: </b>'.$rowData['site_date'].' <br/>
                               <b>Report # : </b>'.$rowData['site_h'].' <br/>

                               <b>Location : </b>'.$rowData['site_loc'].' <br/>
                               <b>Client : </b>'.$rowData['site_client'].' <br/><br/>
                               <b>Remarks : </b>'.$rowData['site_rem'].'



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
                             <b>Date: </b>'.$rowData['rec_dt'].' <br/>
                             <b>Post : </b>'.$rowData['rec_name'].' <br/>

                             <b>No of Post : </b>'.$rowData['rec_h'].' <br/>
                             <br/>
                             <b>Remarks : </b>'.$rowData['rec_rem'].'



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
                               <b>Date: </b>'.$rowData['lev_dt'].' <br/>
                               <b>Requested By : </b>'.$rowData['lev_name'].' <br/>

                               <b>No of Days : </b>'.$rowData['lev_no'].' <br/>
                               <br/>
                               <b>Remarks/Details : </b>'.$rowData['lev_rem'].'



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
                                 <b>Date: </b>'.$rowData['ven_dt'].' <br/>
                                 <b>Vendor Code : </b>'.$rowData['ven_code'].' <br/>

                                 <b>Vendor Details : </b>'.$rowData['ven_det'].' <br/>
                                 <br/>
                                 <b>Remarks/Details : </b>'.$rowData['ven_rem'].'



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
                                   <b>PO Date: </b>'.$rowData['po_dt'].' <br/>
                                   <b>PO # : </b>'.$rowData['po_h'].' <br/>
                                   <b>Vendor Code : </b>'.$rowData['po_code'].' <br/>

                                   <b>Vendor Details : </b>'.$rowData['po_det'].' <br/>
                                   <br/>
                                   <b>Remarks/Details : </b>'.$rowData['po_rem'].'



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
                                     <b>Transportation Date: </b>'.$rowData['trans_dt'].' <br/>
                                     <b>Transportation Value : </b>'.$rowData['trans_val'].' <br/><br/>
                                     <b>Tranporter Details : </b>'.$rowData['trans_det'].' <br/><br/>

                                     <b>Remarks/Details : </b>'.$rowData['trans_rem'].'



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
                                       <b>Quotation Date: </b>'.$rowData['quotation_dt'].' <br/>
                                       <b>Quotation # : </b>'.$rowData['quotation_h'].' <br/><br/>
                                       <b>Client Details : </b>'.$rowData['quotation_det'].' <br/><br/>

                                       <b>Remarks/Details : </b>'.$rowData['quotation_rem'].'



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
