<?php require_once('../../private/initialize.php') ?>

<?php
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  $state_result = find_state_by_id($id);
  // No loop, only one result
  $state = db_fetch_assoc($state_result);
?>

<?php $page_title = 'Staff: State of ' . $state['name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="states.php">Back to States List</a><br />

  <h1>State: <?php echo $state['name']; ?></h1>

  <?php
    echo "<table id=\"state\">";
    echo "<tr>";
    echo "<td>Name: </td>";
    echo "<td>" . h($state['name']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Code: </td>";
    echo "<td>" . h($state['code']) . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Country ID: </td>";
    echo "<td>" . h($state['country_id']) . "</td>";
    echo "</tr>";
    echo "</table>";

    $territory_result = find_territories_for_state_id($state['id']);

    echo "<ul id=\"territories\">";
    while($territory = db_fetch_assoc($territory_result)) {
      echo "<li>";
      echo "<a href=\"territory.php?id=" . h(u($territory['id'])) . "&state_id=" . h(u($state['id'])) . "\">";
      echo h($territory['name']);
      echo "</a>";
      echo "</li>";
    } // end while $territory
    db_free_result($territory_result);
    echo "</ul>"; // #territories

    db_free_result($state_result);
  ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
