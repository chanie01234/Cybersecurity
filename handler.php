<html>
   <head>
      <title>CodePath University Pre-work</title>
      <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
   </head>

   <body>
     <div class="tipcalc">
         <p id="title">Super Tip Calculator<p>
         <form class="formula" action="handler.php" method="post">
           <?php
           $subtotal = $_REQUEST["sub-total"];
           $percent = $_REQUEST["percent"];
           $shared = $_REQUEST["share-tip"];
           ?>
           Sub Total: $ <input type="text" name="sub-total" id="sub-textbox" value="<?php echo $subtotal;?>"><br>
           <br>

           Gratuity:
           10% <input type="radio" name="percent" <?php if(isset($percent) && $percent=="0.10") echo "checked";?> value="0.10">
           15% <input type="radio" name="percent" <?php if(isset($percent) && $percent=="0.15") echo "checked";?> value="0.15">
           20% <input type="radio" name="percent" <?php if(isset($percent) && $percent=="0.20") echo "checked";?> value="0.20">
           <br><br>

           Share between: <input type="text" name="share-tip" id="share-textbox" value="<?php echo $shared;?>"> person(s)<br>
           <br>
           <input type="submit" name="submit-button" value="Calculate">
         </form>
     </div>
     <div class="results"><?php
       $subtotal = $_REQUEST["sub-total"];
       $percent = $_REQUEST["percent"];
       $shared = $_REQUEST["share-tip"];

       if(isset($percent) && $percent=="0.10"){
         $total = $subtotal * $percent;
         $totalamt = $total +$subtotal;
       }elseif (isset($percent) && $percent=="0.15"){
         $total = $subtotal * $percent;
         $totalamt = $total +$subtotal;
       }elseif (isset($percent) && $percent=="0.20"){
         $total = $subtotal * $percent;
         $totalamt = $total +$subtotal;
       }

       print "Tip: $" . $total . "<br>";
       $divided = $totalamt / $shared;
       print "Total: $" . $totalamt . "<br>";
       print "Total per person: $" . $divided . "<br>";
     ?></div>
   </body>
</html>
