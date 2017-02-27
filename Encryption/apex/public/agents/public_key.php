<?php

  require_once('../../private/initialize.php');

  if(!isset($_GET['id'])) {
    redirect_to('index.php');
  }

  $id = $_GET['id'];
  $agent_result = find_agent_by_id($id);
  // No loop, only one result
  $agent = db_fetch_assoc($agent_result);

?>

<!doctype html>

<html lang="en">
  <head>
    <title>Public Key</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="stylesheet" media="all" href="<?php echo DOC_ROOT . '/includes/styles.css'; ?>" />
  </head>
  <body>
    
    <a href="<?php echo url_for('/agents/index.php'); ?>">Back to List</a>
    <br/>

    <h1>Public Key for <?php echo h($agent['codename']); ?></h1>
    
    <div>
      <p><pre><?php echo h($agent['public_key']); ?></pre></p>
    </div>
    
  </body>
</html>
