<html>
   <head>
      <title>CodePath University Pre-work</title>
      <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
   </head>

   <body>
     <div class="tipcalc">
         <p id="title">Super Tip Calculator<p>
         <form class="formula" action="index.php" method="post">
           Sub Total: $ <input type="text" name="sub-total" id="sub-textbox" value="0.00"><br>
           <br>

           Gratuity:
           10% <input type="radio" name="percent"  value="0.10">
           15% <input type="radio" name="percent"  value="0.15">
           20% <input type="radio" name="percent"  value="0.20">
           <br><br>

           Share between: <input type="text" name="share-tip" id="share-textbox" value="1"> person(s)<br>
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
