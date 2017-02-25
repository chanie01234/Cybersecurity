<?php

  // Will perform all actions necessary to log in the user
  // Also protects user from session fixation.
  function log_in_user($user) {
    // TODO Store user's ID in session
    // TODO Store last login time in session
    return true;
  }

  // A one-step function to destroy the current session
  function destroy_current_session() {
    // TODO destroy the session file completely
  }

  // Performs all actions necessary to log out a user
  function log_out_user() {
    unset($_SESSION['user_id']);
    destroy_current_session();
    return true;
  }

  // Determines if the request should be considered a "recent"
  // request by comparing it to the user's last login time.
  function last_login_is_recent() {
    // TODO add code to determine if last login is recent
    return true;
  }

  // Checks to see if the user-agent string of the current request
  // matches the user-agent string used when the user last logged in.
  function user_agent_matches_session() {
    // TODO add code to determine if user agent matches session
    return true;
  }

  // Inspects the session to see if it should be considered valid.
  function session_is_valid() {
    if(!last_login_is_recent()) { return false; }
    // if(!user_agent_matches_session()) { return false; }
    return true;
  }

  // is_logged_in() contains all the logic for determining if a
  // request should be considered a "logged in" request or not.
  // It is the core of require_login() but it can also be called
  // on its own in other contexts (e.g. display one link if a user
  // is logged in and display another link if they are not)
  function is_logged_in() {
    // Having a user_id in the session serves a dual-purpose:
    // - Its presence indicates the user is logged in.
    // - Its value tells which user for looking up their record.
    if(!isset($_SESSION['user_id'])) { return false; }
    if(!session_is_valid()) { return false; }
    return true;
  }

  // Call require_login() at the top of any page which needs to
  // require a valid login before granting acccess to the page.
  function require_login() {
    if(!is_logged_in()) {
      destroy_current_session();
      redirect_to(url_for('/staff/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }

?>
