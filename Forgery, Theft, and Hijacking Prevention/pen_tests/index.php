<!doctype html>
<html lang="en">
  <head>
    <title>XSS Test</title>
    <meta charset="utf-8">
  </head>
  <body>
    <div id="main-content">
      <h1>Test Menu</h1>
      <p style="width: 500px;">
        These are not complete tests of the site code. They are tests of three known vulnerable spots in the code. If these tests fail, you know you have at least one vulnerability. If theses tests pass, it does not mean there are no vulnerabilities elsewhere.
      </p>
      <ul>
        <li><a href="xss.php">Cross-Site Scripting Test</a></li>
        <li><a href="csrf.php">Cross-Site Request Forgery Test</a></li>
        <li><a href="sqli.php">SQL Injection Test</a></li>
      </ul>
    </div>
  </body>
</html>
