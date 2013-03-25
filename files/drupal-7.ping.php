<?php
// Register our shutdown function so that no other shutdown functions run before this one.
// This shutdown function calls exit(), immediately short-circuiting any other shutdown functions,
// such as those registered by the devel.module for statistics.
register_shutdown_function('status_shutdown');
function status_shutdown() {
  exit();
}

define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_DATABASE);

// Build up our list of errors.
$errors = array();

// Check that the main database is active.
if (!(bool) db_query_range('SELECT 1 FROM {users} WHERE uid = 1', 0, 1)->fetchField()) {
  $errors[] = 'Master database not responding.';
}

// Check that the slave database is active.
if (!(bool) db_query_range('SELECT 1 FROM {users} WHERE uid = 1', 0, 1, array(), array('target' => 'slave'))->fetchField()) {
  $errors[] = 'Slave database not responding.';
}

// Print all errors.
if ($errors) {
  $errors[] = 'Errors on this server will cause it to be removed from the load balancer.';
  header('HTTP/1.1 500 Internal Server Error');
  print implode("<br />\n", $errors);
}
else {
  // Split up this message, to prevent the remote chance of monitoring software
  // reading the source code if mod_php fails and then matching the string.
  print 'CONGRATULATIONS' . ' 200';
}

// Exit immediately, note the shutdown function registered at the top of the file.
exit();

