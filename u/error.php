<?php

$err = $_GET['err'];
switch ($err) {
  case 'wrong_login':
    echo '<div class="alert alert-default bg-danger-600" role="alert"><button type="button"
    class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><strong>Cannot Log In!</strong> Please enter the correct Username & password.</div>';
    break;

  default:
    # code...
    break;
}
?> 
