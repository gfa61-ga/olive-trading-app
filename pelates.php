<?php // 
  require_once 'checklogin.php';
?>

<?php include("header.php");?>
<html>
<head>
<style>
#tim   {color:black}
#mitim   {color:red}
</style>

    <title> Πελάτες </title>
</head>


<div align=center>
<?php
if ($searchstring=="*")
{
    ?>
    <h1><u> Αποτελέσματα αναζήτησης πελατών </u></h1>
    <?php
//    $sql="select * from pelates order by id_pelati asc";    
    $sql="select * from pelates order by eponimo, onoma";
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
    $result=mysql_query($sql,$db);
    echo "<table border=2>";
    echo "<tr align=center><td><b>Επώνυμο</b><td><b>Ονομα</b><td><b>Διεύθυνση</b><td><b>ΑΦΜ</b><td><b>Τηλέφωνα</b><td><b>Τραπεζικός Λογαριασμός</b><td><b>Είδος Τιμολογίου</b><td><b>Επιλογή για επεξεργασία</b></tr>";
    while ($myrow = mysql_fetch_array($result))
    {
//        echo "<tr align=center><td align=left>".$myrow["id_pelati"]." ".$myrow["eponimo"]."<td align=left>".$myrow["onoma"]."<td>".$myrow["diefthinsi"]."<td>".$myrow["afm"]."<td>".$myrow["tilefona"]."<td>".$myrow["traplog"]."<td>".$myrow["eidtim"];
        echo "<tr align=center><td align=left>".$myrow["eponimo"]."<td align=left>".$myrow["onoma"]."<td>".$myrow["diefthinsi"]."<td>".$myrow["afm"]."<td>".$myrow["tilefona"]."<td>".$myrow["traplog"]."<td>".$myrow["eidtim"];
        echo "<td><a href=\"pelatesaddedit.php?id=".$myrow["id_pelati"]."\">Επεξεργασία</a>";
    }
    echo "</table>";}
elseif ($searchstring)
{
    ?>
    <h1><u> Αποτελέσματα αναζήτησης πελατών </u></h1>
    <?php
    
    $sql="select * from pelates where $searchtype like '$searchstring%' order by eponimo, onoma";
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
    $result=mysql_query($sql,$db);
    echo "<table border=2>";
    echo "<tr align=center><td><b>Επώνυμο</b><td><b>Ονομα</b><td><b>Διεύθυνση</b><td><b>ΑΦΜ</b><td><b>Τηλέφωνα</b><td><b>Τραπεζικός Λογαριασμός</b><td><b>Είδος Τιμολογίου</b><td><b>Επιλογή για επεξεργασία</b></tr>";
    while ($myrow = mysql_fetch_array($result))
    {
        echo "<tr align=center><td align=left>".$myrow["eponimo"]."<td align=left>".$myrow["onoma"]."<td>".$myrow["diefthinsi"]."<td>".$myrow["afm"]."<td>".$myrow["tilefona"]."<td>".$myrow["traplog"]."<td>".$myrow["eidtim"];
        echo "<td><a href=\"pelatesaddedit.php?id=".$myrow["id_pelati"]."\">Επεξεργασία</a>";
    }
    echo "</table>";
}
else
{
    ?>
    
    <h1><u> Πελάτες </u></h1>
    <br>
    <form method="post" accept-charset="utf-8" action="<?php $PHP_SELF ?>">
    <table border="2" cellpacing="2">
    <tr><td>Γράψτε ενα η περισσοτερα αρχικα γράμματα επωνύμου Πελάτη<span id=mitim>*</span>, <br>ή * γιά εμφάνιση όλων των Πελατών:</td>
    <td>Αναζήτηση με:</td></tr>
    <tr>
        <td><input type="text" name="searchstring" size="28" value="*"></td>
        <td><select size="1" name="searchtype">
        <option selected value="eponimo">Επώνυμο</option>
        <option value="afm">ΑΦΜ</option>
        </select>
        </td>
    </tr>
    </table>
    <br>
    <span id=mitim>*</span>Π.χ. εάν γράψετε το γράμμα Α, θα εμφανισθούν οι πελάτες που το επώνυμο τους αρχίζει απο Α.
    <br><br>
    <p> <input type="submit" value="Εμφάνιση Πελατών" name="B1"><input type="reset" value="Καθαρισμός"></p>
    </form>
    
    <?php
}
?>

    <p><h2><a href="pelatesaddedit.php">Προσθήκη Πελάτη</a>
    <!--<p><a href="elies.php">Επιστροφή σε Αρχική Σελίδα</a> -->
</div>
</body>
<?php include("footer.html");?>
</html>
    
