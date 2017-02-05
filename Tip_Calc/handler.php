<?php
$subtotalErr = $sharedErr = $percentErr = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["sub-total"])) {
        $subtotalErr = "Please enter bill subtotal";
    }
    else{
      if (!is_numeric($subtotal)) {
          $subtotalErr = "Please enter a positive number";
      }
          $subtotal = test_input($_POST["sub-total"]);
    }

    if (empty($_POST["percent"])) {
        $percentErr = "Please choose tip percentage";
    }
    else {
        $percent = test_input($_POST["percent"]);
    }

    if (empty($_POST["share-tip"]))  {
        $sharedErr = "Please enter number of persons sharing the total";
    }
    else{
      if (!is_numeric($shared)) {
            $sharedErr = "Please enter a positive number";
      }
          $shared = test_input($_POST["share-tip"]);
    }
  }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<html>
   <head>
      <title>CodePath University Pre-work</title>
      <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
   </head>

   <body>
     <div class="tipcalc">
         <p id="title">Super Tip Calculator<p>
         <form class="formula" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           <?php
           $subtotal = $_REQUEST["sub-total"];
           $percent = $_REQUEST["percent"];
           $shared = $_REQUEST["share-tip"];
           ?>
           Sub Total: $ <input type="text" name="sub-total" id="sub-textbox" value="<?php echo $subtotal;?>">
           <span class="error">* <br><?php echo $subtotalErr;?></span>
           <br><br>

           Gratuity:
           <?php
           for ($i = 1; $i <= 3; $i++) {
           ?>
             <?php echo ($i * 5); ?>% <input type="radio" name="percent" <?php if(isset($percent) && $percent== ($i * 5)) echo "checked";?> value="<?php echo ($i * 5); ?>">
           <?php
           }
           ?>
           <span class="error">* <br> <?php echo $percentErr;?></span>
           <br><br>
           Share between: <input type="text" name="share-tip" id="share-textbox" value="<?php echo $shared;?>"> person(s)
           <span class="error">* <br> <?php echo $sharedErr;?></span>
           <br><br>
           <input type="submit" name="submit-button" value="Calculate">
         </form>

     </div>
     <div class="results"><?php
       if(isset($percent) && $percent=="5"){
         $total = $subtotal * ($percent*0.01);
         $totalamt = $total +$subtotal;
       }elseif (isset($percent) && $percent=="10"){
         $total = $subtotal * ($percent*0.01);
         $totalamt = $total +$subtotal;
       }elseif (isset($percent) && $percent=="15"){
         $total = $subtotal * ($percent*0.01);
         $totalamt = $total +$subtotal;
       }
       print "Tip: $" . $total . "<br>";
       $divided = $totalamt / $shared;
       print "Total: $" . $totalamt . "<br>";
       print "Total per person: $" . $divided . "<br>";
     ?></div>
   </body>
</html>
