<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.
  $errors = array();
  $first_name = '';
  $last_name = '';
  $email = '';
  $username = '';

  // if this is a POST request, process the form
  if(is_post_request()) {

    // Confirm that values are present before accessing them.
    if(isset($_POST['first_name'])) { $first_name = $_POST['first_name']; }
    if(isset($_POST['last_name'])) { $last_name = $_POST['last_name']; }
    if(isset($_POST['email'])) { $email = $_POST['email']; }
    if(isset($_POST['username'])) { $username = $_POST['username']; }

    // Validations
    if (is_blank($first_name)) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($first_name, array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    if (is_blank($last_name)) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($last_name, array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if (is_blank($email)) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_valid_email_format($email)) {
      $errors[] = "Email must be a valid format.";
    }

    if (is_blank($username)) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($username, array('min' => 8, 'max' => 255))) {
      $errors[] = "Username must be be at least 8 characters.";
    }

    // If there were no errors, submit data to database
    if (empty($errors)) {
      $created_at = date("Y-m-d H:i:s");
      $sql = "INSERT INTO users ";
      $sql .= "(first_name, last_name, email, username,created_at) ";
      $sql .= "VALUES (";
      // Note that there is no SQL sanitization used here yet.
      // That will be a topic for later in the week.
      $sql .= "'" . $first_name . "',";
      $sql .= "'" . $last_name . "',";
      $sql .= "'" . $email . "',";
      $sql .= "'" . $username . "',";
      $sql .= "'" . $created_at . "'";
      $sql .= ")";

      // For INSERT statments, $result is just true/false
      $result = db_query($db, $sql);
      if($result) {
        db_free_result($result);
        db_close($db);
        redirect_to('registration_success.php');
      } else {
        // The SQL INSERT statement failed.
        // Just show the error, not the form
        echo db_error($db);
        db_free_result($result);
        db_close($db);
        exit;
      }
    }
  }

?>
<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Register</h1>
  <p>Register to become a Globitek Partner.</p>

  <?php echo display_errors($errors); ?>

  <form action="register.php" method="post">
    First name:<br />
    <input type="text" name="first_name" value="<?php echo h($first_name); ?>" /><br />
    Last name:<br />
    <input type="text" name="last_name" value="<?php echo h($last_name); ?>" /><br />
    Email:<br />
    <input type="text" name="email" value="<?php echo h($email); ?>" /><br />
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
