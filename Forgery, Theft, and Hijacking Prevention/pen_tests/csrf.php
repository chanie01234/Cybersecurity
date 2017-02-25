<?php
require_once('../private/initialize.php');

function create_fake_login() {
  // if user is not logged in, create a fake login for them.
  // important because students may not have enabled log in yet.
  if(!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 99999;
  }
  $_SESSION['last_login'] = time();
}
function delete_fake_login() {
  // Unset any login set by us
  if($_SESSION['user_id'] == 99999) {
    unset($_SESSION['user_id']);
  }
}

$tested = isset($_GET['tested']) ? true : false;

if($tested) {
  $state_result = find_state_by_id(1);
  $state = db_fetch_assoc($state_result);
  if($state['code'] == 'LA') {
    $state['code'] = 'AL';
    update_state($state);
    $msg = "CSRF succeeded.";
    delete_fake_login();
  } else {
    $msg = "CSRF has not succeeded.";
  }
} else {
  create_fake_login();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>CSRF Test</title>
    <meta charset="utf-8">
  </head>
  <body>
    <a href="index.php">Test Menu</a><br />
    <br />

    <p>Click here to test your site for CSRF vulnerability.</p>
    <form action="../public/staff/states/edit.php?id=1" method="post" target="results">
      <input type="hidden" name="code" value="LA" />
      <input type="submit" name="submit" value="Test CSRF"  />
    </form>
    <iframe name="results" style="display: none;" onload="if(updated === true) { window.location =
  'csrf.php?tested=1'} ;"></iframe>
    <br />
    <br />
    <div id="state-code-test">
      <?php echo $msg; ?>
    </div>
    <script>updated = true;</script>
  </body>
</html>
