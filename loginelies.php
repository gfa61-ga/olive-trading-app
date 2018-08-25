<?php // loginelies.php
  header('Content-Type: text/html; charset=utf-8');

  $db_hostname = "localhost";
  $db_database = "elies".$_COOKIE["cur_year"];
  $db_username = "root";
  $db_password = "delta5"; // MySql root password

foreach ($_REQUEST as $key => $val)
        {
        global ${$key};
        ${$key} = $val;
        }


   function grDate($d)
   {
      $date = new DateTime($d);
      return $date->format('d-m-Y');
   }
?>

<!DOCTYPE html>
