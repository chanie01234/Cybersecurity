<?php

  require_once('../private/initialize.php');

  $plain_text = '';
  $public_key = '';
  $encrypted_text = '';
  $cipher_text = '';
  $private_key = '';
  $decrypted_text = '';

  if(isset($_POST['submit'])) {
  
    if(isset($_POST['public_key'])) {
    
      // This is an encode request
      $plain_text = isset($_POST['plain_text']) ? $_POST['plain_text'] : nil;
      $public_key = isset($_POST['public_key']) ? $_POST['public_key'] : nil;
      $encrypted_text = pkey_encrypt($plain_text, $public_key);
      $cipher_text = $encrypted_text;
    
    } else {
    
      // This is a decode request
      $cipher_text = isset($_POST['cipher_text']) ? $_POST['cipher_text'] : nil;
      $private_key = isset($_POST['private_key']) ? $_POST['private_key'] : nil;
      $decrypted_text = pkey_decrypt($cipher_text, $private_key);
    
    }
  }

?>

<!doctype html>

<html lang="en">
  <head>
    <title>Asymmetric Encryption: Encrypt/Decrypt</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="stylesheet" media="all" href="includes/styles.css" />
  </head>
  <body>
    
    <a href="index.php">Main menu</a>
    <br/>

    <h1>Asymmetric Encryption</h1>
    
    <div id="encoder">
      <h2>Encrypt</h2>

      <p>Plain text may not exceed 245 characters.</p>

      <form action="" method="post">
        <div>
          <label for="plain_text">Plain text</label>
          <textarea name="plain_text" maxlength="245"><?php echo h($plain_text); ?></textarea>
        </div>
        <div>
          <label for="public_key">Public Key</label>
          <textarea name="public_key"><?php echo h($public_key); ?></textarea>
        </div>
        <div>
          <input type="submit" name="submit" value="Encrypt">
        </div>
      </form>
    
      <div class="result"><?php echo h($encrypted_text); ?></div>
      <div style="clear:both;"></div>
    </div>
    
    <hr />
    
    <div id="decoder">
      <h2>Decrypt</h2>

      <form action="" method="post">
        <div>
          <label for="cipher_text">Cipher text</label>
          <textarea name="cipher_text"><?php echo h($cipher_text); ?></textarea>
        </div>
        <div>
          <label for="private_key">Private Key</label>
          <textarea name="private_key"><?php echo h($private_key); ?></textarea>
        </div>
        <div>
          <input type="submit" name="submit" value="Decrypt">
        </div>
      </form>

      <div class="result"><?php echo h($decrypted_text); ?></div>
      <div style="clear:both;"></div>
    </div>
    
  </body>
</html>
