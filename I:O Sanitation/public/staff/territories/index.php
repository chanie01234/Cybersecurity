<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Staff: Territories'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../index.php">Back to Menu</a><br />

  <h1>Territory</h1>

  <a href="new.php">Add a Territory</a><br />
  <br />

  <?php
    $territory_result = find_all_territories();

    echo "<table id=\"territories\" style=\"width: 500px;\">";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Position</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";
    while($territory = db_fetch_assoc($territory_result)) {
      echo "<tr>";
      echo "<td>" . $territory['name'] . "</td>";
      echo "<td>" . $territory['position'] . "</td>";
      echo "<td>";
      echo "<a href=\"show.php?id=" . $territory['id'] . "\">Show</a>";
      echo "</td>";
      echo "<td>";
      echo "<a href=\"edit.php?id=" . $territory['id'] . "\">Edit</a>";
      echo "</td>";
      echo "</tr>";
    } // end while $territories
    db_free_result($territory_result);
    echo "</table>"; // #territories
  ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
