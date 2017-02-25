<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('../index.php');
}
$states_result = find_state_by_id($_GET['id']);
// No loop, only one result
$state = db_fetch_assoc($states_result);

// Set default values for all variables the page needs.
$errors = array();

if(is_post_request()) {

  // Confirm that values are present before accessing them.
  if(isset($_POST['name'])) { $state['name'] = $_POST['name']; }
  if(isset($_POST['code'])) { $state['code'] = $_POST['code']; }
  if(isset($_POST['country_id'])) { $state['country_id'] = $_POST['country_id']; }

  $result = update_state($state);
  if($result === true) {
    redirect_to('show.php?id=' . $state['id']);
  } else {
    $errors = $result;
  }
}
?>
<?php $page_title = 'Staff: Edit State ' . $state['name']; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="main-content">
  <a href="show.php?id=<?php echo h($state['id']); ?>">Back to State</a><br />

  <h1>Edit State: <?php echo h($state['name']); ?></h1>

  <?php echo display_errors($errors); ?>

  <form action="edit.php?id=<?php echo h(u($state['id'])); ?>" method="post">
    Name:<br />
    <input type="text" name="name" value="<?php echo h($state['name']); ?>" /><br />
    Code:<br />
    <input type="text" name="code" value="<?php echo h($state['code']); ?>" /><br />
    Country ID:<br />
    <input type="text" name="country_id" value="<?php echo h($state['country_id']); ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Update"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
