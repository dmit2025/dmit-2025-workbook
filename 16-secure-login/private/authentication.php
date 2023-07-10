<?php

// AUTHENTICATION FUNCTIONS //
function log_out()
{
  unset($_SESSION['username']);
  unset($_SESSION['last_login']);
  unset($_SESSION['login_expires']);

  // We could also use the following:
  $_SESSION = array();

  // That should take care of everything alone, but I am paranoid and don't trust my own code.
  session_destroy();

  header("location: index.php");
  exit();
}

// Returns true if the last login time plus the allowed time is still greater than the current time
function last_login_is_recent()
{
  // 60 seconds times 60 minutes times 24 hours is 1 day.
  $max_elapsed = 60 * 60 * 24; 
  // Is this SESSION value set? If not, they're not logged in.
  if (!isset($_SESSION['last_login'])) {
    return false;
  }
  // If it is set, check to see if the time of the last login plus the maximum time allowed is greater than the current time.
  return ($_SESSION['last_login'] + $max_elapsed) >= time();
}

// Returns true if login expiration time is still greater than the current time; another function that does the exact same thing as above. However, it's a little more friendly because it logs the user out at midnight, not exactly 24 hours from when they last logged in (which could be any time of day).
function login_is_still_valid()
{
  if (!isset($_SESSION['login_expires'])) {
    return false;
  }
  return $_SESSION['login_expires'] >= time();
}

// If the user doesn't have a user_id value set or if they logged in over 24 hours ago, log them out.
function login_expiry() {
  if (!isset($_SESSION['user_id']) || login_is_still_valid() == FALSE) {
    log_out();
    // If we want to be really friendly, we should return some sort of message that tells the user that they've been logged out, or redirect them to a logout page.
  }
}

?>