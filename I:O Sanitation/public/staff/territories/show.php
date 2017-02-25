<?php require_once('../../../private/initialize.php'); ?>

<?php
if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = $_GET['id'];
$territory_result = find_territory_by_id($id);
// No loop, only one result
$territory = db_fetch_assoc($territory_result);

$state_id = find_state_by_id($territory['state_id']);
$state = db_fetch_assoc($state_id);
?>

<?php $page_title = 'Staff: Territory of ' . $territory['name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../states/show.php?id=<?php echo u($territory['state_id']); ?>">Back to State Details</a>
  <br />

  <h1>Territory: <?php echo $territory['name']; ?></h1>

  <?php
    echo "<table id=\"territory\">";
    echo "<tr>";
    echo "<td>Name: </td>";
    echo "<td>" . $territory['name'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>State ID: </td>";
    echo "<td>" . $territory['state_id'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Position: </td>";
    echo "<td>" . $territory['position'] . "</td>";
    echo "</tr>";
    echo "</table>";

    db_free_result($territory_result);
  ?>
  <br />
  <a href="edit.php?id=<?php echo $territory['id']; ?>">Edit</a><br />

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
