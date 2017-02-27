<?php
  require_once('../private/initialize.php');
?>
<!doctype html>

<html lang="en">
  <head>
    <title>APEX Message Central</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <link rel="stylesheet" media="all" href="includes/styles.css" />
  </head>
  <body>

    <h1>APEX Message Central</h1>
    
    <h2>Encryption Tools</h2>
    <ul>
      <li><a href="symmetric_encryption.php">Symmetric Encrypt/Decrypt</a></li>
      <li><a href="generate_keys.php">Generate Public-Private Keys</a></li>
      <li><a href="asymmetric_encryption.php">Asymmetric Encrypt/Decrypt</a></li>
      <li><a href="digital_signature.php">Create/Verify Signature</a></li>
    </ul>
    
    <hr />
    
    <h2>Agent Messages</h2>
    <ul>
      <li><a href="agents/index.php">Agent Directory</a></li>
    </ul>
    
  </body>
</html>
