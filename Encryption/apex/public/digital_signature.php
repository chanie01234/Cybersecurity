<?php

  require_once('../private/initialize.php');

  $message = '';
  $private_key = '';
  $result_signature = '';
  $signature = '';
  $public_key = '';
  $result_text = '';

  if(isset($_POST['submit'])) {
  
    if(isset($_POST['private_key'])) {
    
      // This is a create signature request
      $message = isset($_POST['message']) ? $_POST['message'] : nil;
      $private_key = isset($_POST['private_key']) ? $_POST['private_key'] : nil;
      $result_signature = create_signature($message, $private_key);
      $signature = $result_signature;
    
    } else {
    
      // This is a verify signature request
      $message = isset($_POST['message']) ? $_POST['message'] : nil;
      $signature = isset($_POST['signature']) ? $_POST['signature'] : nil;
      $public_key = isset($_POST['public_key']) ? $_POST['public_key'] : nil;
      $result = verify_signature($message, $signature, $public_key);
      $result_text = $result === 1 ? 'Valid' : 'Not valid';
    }
  }

?>

<!doctype html>

<html lang="en">
  <head>
    <title>Asymmetric Encryption: Create/Verify Signature</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="stylesheet" media="all" href="includes/styles.css" />
  </head>
  <body>
    
    <a href="index.php">Main menu</a>
    <br/>

    <h1>Asymmetric Encryption</h1>
    
    <div id="encoder">
      <h2>Create Signature</h2>

      <form action="" method="post">
        <div>
          <label for="message">Message</label>
          <textarea name="message"><?php echo h($message); ?></textarea>
        </div>
        <div>
          <label for="private_key">Private Key</label>
          <textarea name="private_key"><?php echo h($private_key); ?></textarea>
        </div>
        <div>
          <input type="submit" name="submit" value="Sign">
        </div>
      </form>
    
      <div class="result"><?php echo h($result_signature); ?></div>
      <div style="clear:both;"></div>
    </div>
    
    <hr />
    
    <div id="decoder">
      <h2>Verify Signature</h2>

      <form action="" method="post">
        <div>
          <label for="message">Message</label>
          <textarea name="message"><?php echo h($message); ?></textarea>
        </div>
        <div>
          <label for="signature">Signature</label>
          <textarea name="signature"><?php echo h($signature); ?></textarea>
        </div>
        <div>
          <label for="public_key">Public Key</label>
          <textarea name="public_key"><?php echo h($public_key); ?></textarea>
        </div>
        <div>
          <input type="submit" name="submit" value="Verify">
        </div>
      </form>

      <div class="result"><?php echo h($result_text); ?></div>
      <div style="clear:both;"></div>
    </div>
    
  </body>
</html>
