<?php require_once('../../private/initialize.php') ?>

<?php $page_title = 'Staff: Territories'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to Menu</a><br />

  <h1>Territory</h1>

  <?php
    $territory_result = find_all_territories();

    echo "<table id=\"terrritories\" style=\"width: 500px;\">";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>State ID</th>";
    echo "<th>Position</th>";
    echo "</tr>";
    while($territory = db_fetch_assoc($territory_result)) {
      echo "<tr>";
      echo "<td>" . h($territory['name']) . "</td>";
      echo "<td>" . h($territory['state_id']) . "</td>";
      echo "<td>" . h($territory['position']) . "</td>";
      echo "<td>";
      echo "<a href=\"territory.php?id=" . h(u($territory['id'])) . "\">View</a>";
      echo "</td>";
      echo "</tr>";
    } // end while $territory
    db_free_result($territory_result);
    echo "</table>"; // #territory
  ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
