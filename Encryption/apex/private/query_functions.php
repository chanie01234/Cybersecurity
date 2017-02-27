<?php

  // A fake login that always logs the user in using ID 1.
  function login() {
    $my_id = 1;
    $result = find_agent_by_id($my_id);
    return db_fetch_assoc($result);
  }
  
  //
  // AGENT QUERIES
  //

  // Find all agents, ordered by codename
  function find_all_agents() {
    global $db;
    $sql = "SELECT * FROM agents ";
    $sql .= "ORDER BY codename ASC;";
    $result = db_query($db, $sql);
    return $result;
  }

  // Find agent by ID
  function find_agent_by_id($id=0) {
    global $db;
    $sql = "SELECT * FROM agents ";
    $sql .= "WHERE id='" . $id . "';";
    $result = db_query($db, $sql);
    return $result;
  }
  
  function validate_agent($agent, $errors=array()) {
    if (is_blank($agent['codename'])) {
      $errors[] = "Codename cannot be blank.";
    } elseif (!has_length($agent['codename'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Codename must be between 2 and 255 characters.";
    }

    if (is_blank($agent['public_key'])) {
      $errors[] = "Public key cannot be blank.";
    }

    if (is_blank($agent['private_key'])) {
      $errors[] = "Private key cannot be blank.";
    }

    return $errors;
  }
  
  // Add a new agent to the table
  // Either returns true or an array of errors
  function insert_agent($agent) {
    global $db;

    $errors = validate_agent($agent);
    if (!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO agents ";
    $sql .= "(codename, public_key, private_key) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $agent['codename']) . "',";
    $sql .= "'" . db_escape($db, $agent['public_key']) . "',";
    $sql .= "'" . db_escape($db, $agent['private_key']) . "'";
    $sql .= ");";
    // For INSERT statements, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL INSERT statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }
  

  //
  // MESSAGE QUERIES
  //
  
  // Find messages for a recipient, ordered by created date
  function find_messages_for($recipient_id) {
    global $db;
    $sql = "SELECT * FROM messages ";
    $sql .= "WHERE recipient_id = '" . db_escape($db, $recipient_id) . "' ";
    $sql .= "ORDER BY created_at ASC;";
    $result = db_query($db, $sql);
    return $result;
  }

  // Find message by ID
  function find_message_by_id($id=0) {
    global $db;
    $sql = "SELECT * FROM messages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "';";
    $result = db_query($db, $sql);
    return $result;
  }

  // Add a new message to the table
  // Either returns true or an array of errors
  function insert_message($message) {
    global $db;

    $created_at = date("Y-m-d H:i:s");
    $sql = "INSERT INTO messages ";
    $sql .= "(sender_id, recipient_id, cipher_text, signature, created_at) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $message['sender_id']) . "',";
    $sql .= "'" . db_escape($db, $message['recipient_id']) . "',";
    $sql .= "'" . db_escape($db, $message['cipher_text']) . "',";
    $sql .= "'" . db_escape($db, $message['signature']) . "',";
    $sql .= "'" . $created_at . "'";
    $sql .= ");";
    // For INSERT statements, $result is just true/false
    $result = db_query($db, $sql);
    if($result) {
      return true;
    } else {
      // The SQL INSERT statement failed.
      // Just show the error, not the form
      echo db_error($db);
      db_close($db);
      exit;
    }
  }

?>
