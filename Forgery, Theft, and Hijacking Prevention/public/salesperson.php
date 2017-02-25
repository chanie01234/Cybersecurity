<?php
  require_once('../private/initialize.php');

  if(!isset($_GET['id'])) {
    // Redirect if no ID provided
    redirect_to('territories.php');
  }

  // Find salesperson using id in query string
  $id = $_GET['id'];
  $salespeople_result = find_salesperson_by_id($id);

  $row_count = db_num_rows($salespeople_result);
  if($row_count > 0) {
    // No loop needed, there will be only one result
    $person = db_fetch_assoc($salespeople_result);
    db_free_result($salespeople_result);
  } else {
    // Redirect if not found
    redirect_to('territories.php');
  }
?>
<?php $page_title = 'Salesperson'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php include(SHARED_PATH . '/public_menu.php'); ?>
<div id="main-content">

  <div id="salesperson>">
    <h1>Salesperson</h1>

    <div class="details">
      <?php
        echo h($person['first_name']) . " " . h($person['last_name']);
        echo "<br />";
        echo h($person['phone']);
        echo "<br />";
        echo h($person['email']);
        echo "<br />";
      ?>
    </div>
    <br />

    <div id="territories">
      <h2>Territories</h2>

      <?php
        $territories_result = find_territories_by_salesperson_id($id);
        echo "<ul id=\"territories\">";
        while($territory = db_fetch_assoc($territories_result)) {
          echo "<li>" . h($territory['name']) . "</li>";
        }
        db_free_result($territories_result);
        echo "</ul>";

      ?>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
