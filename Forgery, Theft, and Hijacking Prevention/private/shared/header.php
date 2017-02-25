<?php
if(!isset($page_title)) {
  $page_title = '';
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title><?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <meta name="description" content="<?php echo h($page_title); ?>">
    <style>
      html, body {
        margin: 0; padding: 0;
        height: 100%; width: 100%;
      }
      #menu {
        width: 100%;
        height: 3em;
        margin: 0;
        padding: 0;
        background-color: #333333;
      }
      #menu ul {
        list-style: none;
      }
      #menu ul li {
        float: left;
        margin-top: 1em;
        margin-right: 3em;
      }
      #menu ul li a {
        color: #FFFFFF;
        text-decoration: none;
      }
      #main-content {
        padding: 0 2em;
      }
    </style>
  </head>
  <body>
