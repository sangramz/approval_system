<?php

echo countpend('mr', 'hod');
echo ountpend('vp', 'ceo');
function countpend($tab, $approver) {
  require_once 'db.php';
  switch ($tab) {
    case 'mr':
        if ($approver == 'ceo') {
          $approv = 'ceo_approv';
          $tab_name = 'mr';
        } elseif ($approver == 'hod') {
          $approv = 'hod_approv';
          $tab_name = 'mr';
        } elseif ($approver == 'dir') {
          $approv = 'direct_approv';
          $tab_name = 'mr';
        }
      break;

    case 'vp':
        if ($approver == 'ceo') {
          $approv = 'vp_ceo_approv';
          $tab_name = 'accounts_vp';
        } elseif ($approver == 'hod') {
          $approv = 'vp_hod_approv';
          $tab_name = 'accounts_vp';
        } elseif ($approver == 'dir') {
          $approv = 'vp_director_approv';
          $tab_name = 'accounts_vp';
        }
      break;

    case 'bl':
        if ($approver == 'ceo') {
          $approv = 'bl_ceo_approv';
          $tab_name = 'accounts_bl';
        } elseif ($approver == 'hod') {
          $approv = 'bl_hod_approv';
          $tab_name = 'accounts_bl';
        } elseif ($approver == 'dir') {
          $approv = 'bl_director_approv';
          $tab_name = 'accounts_bl';
        }
      break;


    case 'dscr':
        if ($approver == 'ceo') {
          $approv = 'dscr_ceo_approv';
          $tab_name = 'sales_dscr';
        } elseif ($approver == 'hod') {
          $approv = 'dscr_hod_approv';
          $tab_name = 'sales_dscr';
        } elseif ($approver == 'dir') {
          $approv = 'dscr_director_approv';
          $tab_name = 'sales_dscr';
        }
      break;

    case 'site':
        if ($approver == 'ceo') {
          $approv = 'site_ceo_approv';
          $tab_name = 'sales_site';
        } elseif ($approver == 'hod') {
          $approv = 'site_hod_approv';
          $tab_name = 'sales_site';
        } elseif ($approver == 'dir') {
          $approv = 'site_director_approv';
          $tab_name = 'sales_site';
        }
      break;

    case 'transport':
        if ($approver == 'ceo') {
          $approv = 'transport_ceo_approv';
          $tab_name = 'sales_transport';
        } elseif ($approver == 'hod') {
          $approv = 'transport_hod_approv';
          $tab_name = 'sales_transport';
        } elseif ($approver == 'dir') {
          $approv = 'transport_director_approv';
          $tab_name = 'sales_transport';
        }
      break;

    case 'rec':
        if ($approver == 'ceo') {
          $approv = 'rec_ceo_approv';
          $tab_name = 'hr_rec';
        } elseif ($approver == 'hod') {
          $approv = 'rec_hod_approv';
          $tab_name = 'hr_rec';
        } elseif ($approver == 'dir') {
          $approv = 'rec_director_approv';
          $tab_name = 'hr_rec';
        }
      break;

    case 'lev':
        if ($approver == 'ceo') {
          $approv = 'lev_ceo_approv';
          $tab_name = 'hr_lev';
        } elseif ($approver == 'hod') {
          $approv = 'lev_hod_approv';
          $tab_name = 'hr_lev';
        } elseif ($approver == 'dir') {
          $approv = 'lev_director_approv';
          $tab_name = 'hr_lev';
        }
      break;

    case 'ven':
        if ($approver == 'ceo') {
          $approv = 'ven_ceo_approv';
          $tab_name = 'ven_reg';
        } elseif ($approver == 'hod') {
          $approv = 'ven_hod_approv';
          $tab_name = 'ven_reg';
        } elseif ($approver == 'dir') {
          $approv = 'ven_director_approv';
          $tab_name = 'ven_reg';
        }
      break;

    case 'po':
        if ($approver == 'ceo') {
          $approv = 'po_ceo_approv';
          $tab_name = 'comm_po';
        } elseif ($approver == 'hod') {
          $approv = 'po_hod_approv';
          $tab_name = 'comm_po';
        } elseif ($approver == 'dir') {
          $approv = 'po_director_approv';
          $tab_name = 'comm_po';
        }
      break;

    case 'log':
        if ($approver == 'ceo') {
          $approv = 'trans_ceo_approv';
          $tab_name = 'logistics';
        } elseif ($approver == 'hod') {
          $approv = 'trans_hod_approv';
          $tab_name = 'logistics';
        } elseif ($approver == 'dir') {
          $approv = 'trans_director_approv';
          $tab_name = 'logistics';
        }
      break;

    case 'quo':
        if ($approver == 'ceo') {
          $approv = 'quotation_ceo_approv';
          $tab_name = 'quotation';
        } elseif ($approver == 'hod') {
          $approv = 'quotation_hod_approv';
          $tab_name = 'quotation';
        } elseif ($approver == 'dir') {
          $approv = 'quotation_director_approv';
          $tab_name = 'quotation';
        }
      break;

    default:
      echo "nope";
      break;
  }
  $stmt = $dbcon->prepare("SELECT COUNT($approv) FROM $tab_name WHERE $approv='0'");
  $nrows = $stmt->execute();
  if ($nrows > 0) {
    return $nrows;
  }

}
?>
