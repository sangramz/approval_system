<?php

if ($_SESSION['access'] == 1) {

  include 'user_templates/approvers/ceo/ceo-header.php';

} elseif ($_SESSION['access'] == 2) {

  include 'accounts/acc-header.php';

} elseif ($_SESSION['access'] == 3) {

  include 'sales/sales-header.php';

} elseif ($_SESSION['access'] == 4) {

  include 'hr/hr-header.php';

} elseif ($_SESSION['access'] == 5) {

  include 'commerce/comm-header.php';

} elseif ($_SESSION['access'] == 6) {

  include 'approvers/hod/hod-header.php';

} elseif ($_SESSION['access'] == 7) {

  include 'approvers/dir/dir-header.php';

}


?>
