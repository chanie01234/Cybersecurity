<html>
   <head>
      <title>CodePath University Pre-work</title>
      <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
   </head>

   <body>
     <div class="tipcalc">
         <p id="title">Super Tip Calculator<p>
         <form class="formula" action="handler.php" method="post">
           Sub Total: $ <input type="text" name="sub-total" id="sub-textbox" value="0.00"><br>
           <br>
           Gratuity:
           <?php
           for ($i = 1; $i <= 3; $i++) {
           ?>
             <?php echo ($i * 5); ?>% <input type="radio" name="percent" value="<?php echo ($i * 5 * 0.01); ?>">
           <?php
           }
           ?>
           <br><br>
           Share between: <input type="text" name="share-tip" id="share-textbox" value="1"> person(s)<br>
           <br>
           <input type="submit" name="submit-button" value="Calculate">
         </form>
     </div>
   </body>
</html>
