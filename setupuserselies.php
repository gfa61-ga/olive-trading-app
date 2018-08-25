<?php //setupusers.php
  require_once 'loginelies.php';
  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

        mysqli_set_charset($connection, "utf8");
  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE users (
    forename VARCHAR(32) NOT NULL,
    surname  VARCHAR(32) NOT NULL,
    username VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8";
  $result = $connection->query($query);
  if (!$result) die($connection->error);

  $salt1    = "qm&h*";
  $salt2    = "pg!@";

  $forename = '. Γιάννα';
  $surname  = 'Βαλή';
  $username = 'bali';
  $password = 'elies!!!';
  $token    = hash('ripemd128', "$salt1$password$salt2");

  add_user($forename, $surname, $username, $token);


  function add_user($fn, $sn, $un, $pw)
  {
    global $connection;

    $query  = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
?>