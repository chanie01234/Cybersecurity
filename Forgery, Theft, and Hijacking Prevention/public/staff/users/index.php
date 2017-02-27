<?php
require_once('../../../private/initialize.php');
require_login();
?>

<?php $page_title = 'Staff: Users'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="main-content">

  <h1>Users</h1>

  <a href="new.php">Add a User</a><br />
  <br />

  <?php
    $users_result = find_all_users();

    echo "<table id=\"users\" style=\"width: 500px;\">";
    echo "<tr>";
    echo "<th>First name</th>";
    echo "<th>Last name</th>";
    echo "<th>Username</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";
    while($user = db_fetch_assoc($users_result)) {
      echo "<tr>";
      echo "<td>" . h($user['first_name']) . "</td>";
      echo "<td>" . h($user['last_name']) . "</td>";
      echo "<td>" . h($user['username']) . "</td>";
      echo "<td>";
      echo "<a href=\"show.php?id=" . h(u($user['id'])) . "\">Show</a>";
      echo "</td>";
      echo "<td>";
      echo "<a href=\"edit.php?id=" . h(u($user['id'])) . "\">Edit</a>";
      echo "</td>";
      echo "</tr>";
    } // end while $user
    db_free_result($users_result);
    echo "</table>"; // #$users
  ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
