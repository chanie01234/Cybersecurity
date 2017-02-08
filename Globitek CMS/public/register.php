<?php
  require_once('../private/initialize.php');

  // Set default values for all variables the page needs.
  $firstNameErr = $lastNameErr = $emailAddressErr = $userNameErr = "";
  $first_name = $last_name = $user_name = $email = "";
  $errors = [];

  // Confirm that POST values are present before accessing them.
  $first_name = isset($_POST['FirstName']) ? $_POST['FirstName'] : '';
  $last_name = isset($_POST['LastName']) ? $_POST['LastName'] : '';
  $user_name = isset($_POST['Username']) ? $_POST['Username'] : '';
  $email = isset($_POST['Email']) ? $_POST['Email'] : '';

  // if this is a POST request, process the form
  // Perform Validations
  // Hint: Write these in private/validation_functions.php <---I'D RATHER NOT!!
  if (is_post_request()) {
    if (empty($_POST["FirstName"])) {
        $errors[] = $firstNameErr = "Please enter your first name";
    }
    else{
      if (!preg_match("/^[a-zA-Z ]{2,255}+$/",$first_name)) {
          $errors[] = $firstNameErr = "First name should consist of letters and whitespeace only";
      }
          $first_name = $_POST["FirstName"];
    }

    if (empty($_POST["LastName"]))  {
        $errors[] = $lastNameErr = "Please enter your last name";
    }
    else{
      if (!preg_match("/^[a-zA-Z ]{2,255}+$/",$last_name)) {
          $errors[] = $lastNameErr = "Last name should consist of letters and whitespeace only";
      }
          $last_name = $_POST["LastName"];
    }

    if (empty($_POST["Username"]))  {
        $errors[] = $userNameErr = "Please enter your username";
    }
    else{
      if (preg_match("/^[0-9a-zA-Z_]{8,20}+$/", $user_name)) {
            $errors[] = $userNameErr = "Username is taken or invalid. Enter another username. Your username must be more than 8 characters";
      }
          $user_name = $_POST["Username"];
    }

    if (empty($_POST["Email"]))  {
        $errors[] = $emailAddressErr = "Please enter your email address";
    }
    else{
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = $emailAddressErr = "Not a valid email address. Please check the format";
      }
          $email = $_POST["Email"];
    }

    // if there were no errors, submit data to database
    if(empty($errors)) {
      // ensure first and last name have escape characters for quotations
      $first_db = db_escape($db, $first_name);
      //$last_db = db_escape($db, $last_name);
      $date = date("Y-m-d H:i:s");
      // Write SQL INSERT statement
      $sql = "INSERT INTO users (first_name, last_name, email, username, created_at) ";
      $sql .= "VALUES ('{$first_db}', '{$last_name}', '{$email}', '{$user_name}', '{$date}');";

      // For INSERT statments, $result is just true/false
      $result = db_query($db, $sql);
      if($result) {
        db_close($db);

      // TODO redirect user to success page
      redirect_to("registration_success.php");

      } else {
        // The SQL INSERT statement failed.
        // Just show the error, not the form
        echo db_error($db);
        db_close($db);
        exit;
      }
    }
  }
?>

<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<html>
   <head>
      <title>Globitek CMS</title>
      <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
   </head>

   <body>
     <div id="main-content">
       <p id="title">Be Globitek! Join us!</p>
       <p class = "error">* required field</p>

       <?php echo display_errors($errors);?>

       <form class="registration" method="POST">
         First name: <br>
         <input type="text" name="FirstName" value="<?php echo h($first_name); ?>"><span class="error">*</span><br><br>
         Last name: <br>
         <input type="text" name="LastName" value="<?php echo h($last_name); ?>"><span class="error">*</span><br><br>
         Username: <br>
         <input type="text" name="Username" value="<?php echo h($user_name); ?>"><span class="error">*</span><br><br>
         Email: <br>
         <input type="text" name="Email" value="<?php echo h($email); ?>"><span class="error">*</span><br><br>
         <input type="submit" name="submit-button" value="Submit">
       </form>
     </div>
   </body>
</html>

<?php include(SHARED_PATH . '/footer.php'); ?>
