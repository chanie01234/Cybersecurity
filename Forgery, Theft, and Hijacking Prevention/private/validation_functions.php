<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    $has_at_symbol = strpos($value, '@') !== false;
    $chars_match = preg_match('/\A[A-Za-z0-9_\-@\.]+\Z/', $value);
    return $has_at_symbol && $chars_match;
  }

  // has_valid_username_format('johnny_5')
  function has_valid_username_format($value) {
    return preg_match('/\A[A-Za-z0-9_]+\Z/', $value);
  }

  // has_valid_phone_format('(212) 555-6666')
  function has_valid_phone_format($value) {
    return preg_match('/\A[0-9\-\(\)]+\Z/', $value);
  }

  // Works for both new records and existing records, just
  // add the current ID of an existing record as the second
  // argument.
  // New: is_unique_username('rockclimber67');
  // Existing: is_unique_username('rockclimber67', 31);
  function is_unique_username($username, $current_id=null) {
    $users_result = find_users_by_username($username);
    // Loop through all results, return false if username is in use
    while($user = db_fetch_assoc($users_result)) {
      // Make sure username isn't in use by our current user.
      // Use (int) to make sure we are comparing two integers.
      if((int) $user['id'] != (int) $current_id) {
        return false; // username is being used by someone else
      }
    }
    // Returns true at the end, but only if the loop had no records
    // to loop through or if the loop never returned false.
    return true;  // username is not used by anyone
  }

?>
