<?php //
  $datenow = new DateTime();
  $cur_year_tmp=$datenow->format('Y');
  $cur_month_tmp=$datenow->format('m');

  if ($cur_month_tmp>6 )
    $cur_year=$cur_year_tmp;
  else
    $cur_year=(int)$cur_year_tmp-1;

if ($cur_year <2015)
    $cur_year=2015;
if ( $cur_year >2025)
    $cur_year=2025;



  setcookie ( "cur_year",  $cur_year);
  $_COOKIE["cur_year"]=$cur_year;
  require_once 'loginelies.php';


  $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
        mysqli_set_charset($connection, "utf8");
  if ($connection->connect_error) die($connection->connect_error);

  if (isset($_SERVER['PHP_AUTH_USER']) &&
      isset($_SERVER['PHP_AUTH_PW']))
  {
    $un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
    $pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);

    $query  = "SELECT * FROM users WHERE username='$un_temp'";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    elseif ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);

    $result->close();

        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$pw_temp$salt2");

        if ($token == $row[3])
{
  include("header.php");
     echo "<br>Γεια σου $row[0]..<br>";

echo  <<<_END
<html>
    <title> Εφαρμογή πελατών ελαιοτριβείου </title>
<style type="text/css">
<!--
body {
  background-image: url("olives2.jpg");
}
-->
</style><u></u>
<h1 class="navbar-brand" align="center"><u>Εφαρμογή πελατών ελαιοτριβείου

_END;

echo "έτους " . $_COOKIE["cur_year"];

/*
if ($un_temp!="tsak")
{
echo  <<<_END


</u></h1>
<p align="center">&nbsp;</p>
<h2 align="center"><a href="katigories.php">Κατηγορίες Ελιών</a>    </h2>
<h2 align="center"><a href="pelates.php">Πελάτες</a></h2>
<h2 align="center"><a href="par_tim.php">Παραλαβές και Τιμολόγια Πελατών</a>

_END;

}
echo  <<<_END

</h2><h2 align="center"><a href="eksiposeis.php">Εκτυπώσεις</a>


</h2>
<h2 align="center"><a href="allagietous.php">Αλλαγή έτους</a></h2>
</html>
_END;
*/
}
        else {
die("Λάθος στοιχεία");
}
    }
    else {
die("Λάθος στοιχεία");
}
  }
  else
  {
    header('WWW-Authenticate: Basic realm="Elies_App"');
    header('HTTP/1.0 401 Unauthorized');
    die ("Πρέπει να γράψετε όνομα χρήστη και κωδικό πρόσβασης..");
  }

  $connection->close();

  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }
  include("footer.html");
?>
