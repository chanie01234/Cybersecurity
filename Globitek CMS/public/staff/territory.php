<?php require_once('../../private/initialize.php') ?>

<?php
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  $state_id = isset($_GET['state_id']) ? $_GET['state_id'] : null;

  $territory_result = find_territory_by_id($id);
  // No loop, only one result
  $territory = db_fetch_assoc($territory_result);
?>

<?php $page_title = 'Staff: Territory of ' . $territory['name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <?php
    // This displays different links depending on whether This
    // page was reached from the territories page or a state page
    if($state_id) {
      echo "<a href=\"state.php?id=" . h(u($state_id)) . "\">Back to State</a>";
    } else {
      echo "<a href=\"territories.php\">Back to Territories List</a>";
    }
  ?>
  <br />

  <h1>Territory: <?php echo $territory['name']; ?></h1>

  <?php
    echo "<table id=\"territory\">";
    echo "<tr>";
    echo "<td>Name: </td>";
    echo "<td>" . h($territory['name']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>State ID: </td>";
    echo "<td>" . h($territory['state_id']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Position: </td>";
    echo "<td>" . h($territory['position']) . "</td>";
    echo "</tr>";
    echo "</table>";

    db_free_result($territory_result);
  ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
