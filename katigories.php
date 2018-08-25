<?php // 
  require_once 'checklogin.php';
?>
<?php include("header.php");?>
<html>
    <title> Κατηγορίες Ελιών </title>
<h2 align=center>   <u> Κατηγορίες Ελιών</u></h2> <br>
<?php
    $sql="select * from katigories order by perigrafi asc";
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
    $result=mysql_query($sql,$db);
    echo "<table align=center border=2>";
    echo "<tr><td><b>Κωδικός</b><td><b>Περιγραφή Ελιάς</b><td><b>Τιμή ανα κιλό</b><td><b>Επιλογή για επεξεργασία</b></tr>";
    while ($myrow = mysql_fetch_array($result))
    {
        echo "<tr align=center><td>".$myrow["id_katigorias"]."<td>".$myrow["perigrafi"]."<td>".number_format($myrow["timi"],2);
        echo "<td><a href=\"katigoriesaddedit.php?id=".$myrow["id_katigorias"]."\">Επεξεργασία</a>";
    }
    echo "</table>";
    
?>

    <h2 align="center"><a href="katigoriesaddedit.php">Προσθήκη Κατηγορίας Ελιών</a>
    <!--
    </h2><h2 align="center"><a href="elies.php">Επιστροφή σε Αρχική Σελίδα</a>
     -->
</h2>
<?php include("footer.html");?>
</html>