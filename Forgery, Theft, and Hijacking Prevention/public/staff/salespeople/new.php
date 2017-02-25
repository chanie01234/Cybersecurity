<?php
require_once('../../../private/initialize.php');

// Set default values for all variables the page needs.
$errors = array();
$salesperson = array(
  'first_name' => '',
  'last_name' => '',
  'phone' => '',
  'email' => ''
);

if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['first_name'])) { $salesperson['first_name'] = $_POST['first_name']; }
  if(isset($_POST['last_name'])) { $salesperson['last_name'] = $_POST['last_name']; }
  if(isset($_POST['phone'])) { $salesperson['phone'] = $_POST['phone']; }
  if(isset($_POST['email'])) { $salesperson['email'] = $_POST['email']; }

  $result = insert_salesperson($salesperson);
  if($result === true) {
    $new_id = db_insert_id($db);
    redirect_to('show.php?id=' . $new_id);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: New Salesperson'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to Salespeople List</a><br />

  <h1>New Salesperson</h1>

  <?php echo display_errors($errors); ?>

  <form action="new.php" method="post">
    First name:<br />
    <input type="text" name="first_name" value="<?php echo h($salesperson['first_name']); ?>" /><br />
    Last name:<br />
    <input type="text" name="last_name" value="<?php echo h($salesperson['last_name']); ?>" /><br />
    Phone:<br />
    <input type="text" name="phone" value="<?php echo h($salesperson['phone']); ?>" /><br />
    Email:<br />
    <input type="text" name="email" value="<?php echo h($salesperson['email']); ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Create"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
