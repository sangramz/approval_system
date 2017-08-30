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
    foreach ($rowCount as $rowData) {
      echo '<form action="u/update.php?type=money_requisition" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nm">Requisition Made By:</label>
              <input type="text" class="form-control" name="req_name" value="'.$rowData['mr_made_by'].'" id="nm" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9">
            <div class="form-group">
              <label for="pur">Purpose :</label>
              <textarea class="form-control" name="req_purpose" id="pur" rows="5">'.$rowData['mr_purpose'].'</textarea>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="amt">Amount :</label>
              <textarea class="form-control" name="req_amt" id="amt" rows="5">'.$rowData['mr_amount'].'</textarea>
            </div>
          </div>
          </div>

        <button type="submit" class="btn btn-success pull-right">Update</button>
      </form>';
    }
    break;

    case 'vp':
      $stmt = $dbcon->prepare("SELECT * FROM accounts_vp WHERE vp_sl='$id'");
      $stmt->execute();
      $rowCount = $stmt->fetchAll();
      foreach ($rowCount as $rowData) {
        echo '<form action="u/update.php?type=vendor_payment" method="post">
        <div class="row">
          <div class="col-md-4">

          </div>
          <div class="col-md-8">
            <div class="form-group">
            <label for="vn">Name of the Vendor :</label>
            <input type="text" id="vn" value="'.$rowData['vp_name'].'" name="ven_name" class="form-control">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
            <label for="bn">Bill No :</label>
            <input type="text" id="bn" name="ven_bn" value="'.$rowData['vp_billno'].'" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
            <label for="br">Bill Ref :</label>
            <input type="text" id="br" name="ven_br" value="'.$rowData['vp_billref'].'" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
            <label for="amt">Amount :</label>
            <input type="text" id="amt" name="ven_amt" value="'.$rowData['vp_amt'].'" class="form-control">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <textarea class="form-control" placeholder="Remarks/Descriptions/Notes..." name="ven_note" rows="7">'.$rowData['vp_note'].'</textarea>
          </div>
        </div>
        <input type="submit" value="Update" class="btn btn-success pull-right">
      </form>';
      }
      break;

      case 'bl':
        $stmt = $dbcon->prepare("SELECT * FROM accounts_bl WHERE bl_sl='$id'");
        $stmt->execute();
        $rowCount = $stmt->fetchAll();
        foreach ($rowCount as $rowData) {
          echo '<form action="u/edit.php?type=billing" method="post">
          <div class="row">

            <div class="col-md-8">
              <div class="form-group">
              <label for="vn">Name of the Client:</label>
              <input type="text" id="vn" name="bl_name" value="'.$rowData['bl_name'].'" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
              <label for="bn">Site :</label>
              <input type="text" id="bn" name="bl_site" value="'.$rowData['bl_site'].'" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
              <label for="bn">Bill No :</label>
              <input type="text" id="bn" name="bl_bn" value="'.$rowData['bl_no'].'" class="form-control">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
              <label for="amt">Amount :</label>
              <input type="text" id="amt" name="bl_amt" value="'.$rowData['bi_amt'].'" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <textarea class="form-control" placeholder="Remarks/Descriptions/Notes..." name="bl_note" rows="7">'.$rowData['bl_note'].'</textarea>
            </div>
          </div>
          <input type="submit" value="Update" class="btn btn-success pull-right">
        </form>';
        }
        break;

        case 'ds':
          $stmt = $dbcon->prepare("SELECT * FROM sales_dscr WHERE dscr_sl='$id'");
          $stmt->execute();
          $rowCount = $stmt->fetchAll();
          foreach ($rowCount as $rowData) {
            echo '<form action="u/edit.php?type=dscr" method="POST">
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nm">DSCR #:</label>
                    <input type="text" class="form-control" value="'.$rowData['dscr_h'].'" name="dscr_h" id="nm" />
                  </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pur">Location & Address :</label>
                    <textarea class="form-control" name="dscr_location" id="pur" rows="5">'.$rowData['dscr_loc'].'</textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="amt">Remarks :</label>
                    <textarea class="form-control" name="dscr_rem" id="amt" rows="5">'.$rowData['dscr_rem'].'</textarea>
                  </div>
                </div>
                </div>

              <button type="submit" class="btn btn-success pull-right">Submit</button>
            </form>';
          }
          break;

  default:
    # code...
    break;
}

?>
