<?php

  require_once('../../private/initialize.php');

  $codename = '';
  $public_key = '';
  $private_key = '';

  if(isset($_POST['submit'])) {

    $codename = $_POST['codename'] ? $_POST['codename'] : '';
    $public_key = $_POST['public_key'] ? $_POST['public_key'] : '';
    $private_key = $_POST['private_key'] ? $_POST['private_key'] : '';
    
    $agent = [
      'codename' => $codename,
      'public_key' => $public_key,
      'private_key' => $private_key
    ];
    
    $result = insert_agent($agent);
    if($result === true) {
      redirect_to('index.php');
    } else {
      $errors = $result;
    }
  
  }

?>

<!doctype html>

<html lang="en">
  <head>
    <title>New Agent</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="stylesheet" media="all" href="<?php echo DOC_ROOT . '/includes/styles.css'; ?>" />
  </head>
  <body>
    
    <a href="<?php echo url_for('/agents/index.php') ?>">Back to List</a>
    <br/>

    <h1>New Agent</h1>
    
    <div>
      
      <form action="" method="post">
        <div>
          <label for="codename">Codename</label>
          <input type="text" name="codename" value="<?php echo h($codename); ?>" />
        </div>
        <div>
          <label for="public_key">Public Key</label>
          <textarea name="public_key"><?php echo h($public_key); ?></textarea>
        </div>
        <div>
          <label for="private_key">Private Key</label>
          <textarea name="private_key"><?php echo h($private_key); ?></textarea>
        </div>
        <div>
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>
    
    </div>
    
  </body>
</html>
