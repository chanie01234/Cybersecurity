<?php
require_once('../../../private/initialize.php');
require_login();
?>

<?php
if(!isset($_GET['id'])) {
  redirect_to('../index.php');
}
$id = $_GET['id'];
$state_result = find_state_by_id($id);
// No loop, only one result
$state = db_fetch_assoc($state_result);

$country_id = $state['country_id'];
$country_result = find_country_by_id($country_id);
$country = db_fetch_assoc($country_result);
?>

<?php $page_title = 'Staff: State of ' . $state['name']; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="main-content">
  <a href="../countries/show.php?id=<?php echo h($state['country_id']); ?>">Back to Country: <?php echo h($country['name']); ?></a><br />

  <h1>State: <?php echo h($state['name']); ?></h1>

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
    echo "<td>Country: </td>";
    echo "<td>" . h($country['name']) . "</td>";
    echo "</tr>";
    echo "</table>";
?>
    <br />
    <a href="edit.php?id=<?php echo h(u($state['id'])); ?>">Edit</a><br />
    <hr />

    <h2>Territories</h2>
    <br />
    <a href="../territories/new.php?id=<?php echo h(u($state['id'])); ?>">Add a Territory</a><br />

<?php
    $territory_result = find_territories_for_state_id($state['id']);

    echo "<ul id=\"territories\">";
    while($territory = db_fetch_assoc($territory_result)) {
      echo "<li>";
      echo "<a href=\"../territories/show.php?id=" . h(u($territory['id'])) . "\">";
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
