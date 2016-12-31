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
           10%<input type="radio" name="gender" id="tip" value="0.10">
           15%<input type="radio" name="gender" id="tip" value="0.15">
           20%<input type="radio" name="gender" id="tip" value="0.20">
           <br><br>


           Share between: <input type="text" name="sub-total" id="share-textbox" value="1"> person(s)<br>
           <br>
           <input type="submit" value="Calculate">
         </form>
     </div>
   </body>
</html>
