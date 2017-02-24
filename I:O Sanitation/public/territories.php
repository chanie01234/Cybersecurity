<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Territories'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <h1>Territories</h1>

  <?php
  $country_result = find_all_countries();

  echo "<ul id=\"countries\">";
  // Loop through country results
  while($country = db_fetch_assoc($country_result)) {
    echo "<li>";
    // Output state name
    echo h($country['name']);
    echo " (" . h($country['code']) . ")";

    $state_result = find_states_for_country_id($country['id']);

    echo "<ul id=\"states\">";
    // Loop through state results
    while($state = db_fetch_assoc($state_result)) {
      echo "<li>";
      // Output state name
      echo h($state['name']);
      echo " (" . h($state['code']) . ")";

      $territory_result = find_territories_for_state_id($state['id']);

      echo "<ul id=\"territories\">";
      // Loop through territory results
      while($territory = db_fetch_assoc($territory_result)) {
        echo "<li>";
        // Output territory name (if different from state)
        if($territory['name'] != $state['name']) {
          echo h($territory['name']) . "<br />";
        }

        $salespeople_result = find_salespeople_for_territory_id($territory['id']);

        while($person = db_fetch_assoc($salespeople_result)) {
          echo "<span class=\"salesperson\">";
          $url = 'salesperson.php?id=' . u($person['id']);
          echo "<a href=\"" . h($url) . "\">";
          echo h($person['first_name']) . " " . h($person['last_name']);
          echo "</a>";
          echo "</span>";
          echo "<br />";
        } // end while $person
        db_free_result($salespeople_result);

        echo "</li>";
      } // end while $territory
      db_free_result($territory_result);

      echo "</ul>"; // #territories
      echo "</li>";

    } // end while $states
    db_free_result($state_result);
    echo "</ul>"; // #states
    echo "</li>";

  } // end while $countries
  db_free_result($country_result);
  echo "</ul>"; // #countries
  ?>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
