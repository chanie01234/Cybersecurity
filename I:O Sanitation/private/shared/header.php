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
  </head>
  <body>
