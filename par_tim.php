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

    <title> Αναζήτηση πελάτη για παραλαβή ή τιμολόγιο </title>
</head>

<div align=center>

<?php
if ($searchstring=="*")
{
     echo "   <h1><u>Αποτελέσματα αναζήτησης</u></h1>";
    $sql="select * from pelates order by eponimo, onoma";
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
   $result=mysql_query($sql,$db);
    echo "<table border=2>";
    echo "<tr align=center><td><span id=mitim>*</span><b>Επώνυμο</b><td><b>Ονομα</b><td><b>ΑΦΜ</b><td colspan=4 align=center><b>Επιλογές</b></tr>";
    while ($myrow = mysql_fetch_array($result))
    {
        
        $id_pelati=$myrow["id_pelati"];

        $sql2="select * from pelates, paralabes where paralabes.id_pelati=pelates.id_pelati and pelates.id_pelati=$id_pelati order by id_paralabis";
        $result2=mysql_query($sql2,$db);
        $mi_tim_par=0;
        while ($myrow2 = mysql_fetch_array($result2)) {
         
                $id_par=$myrow2["id_paralabis"];
                $sql3="select * from anal_paral where id_paralabis=$id_par"; //αναλυση παραλαβής που περιλαμβάνεται στο τιμολογιο
                $result3=mysql_query($sql3,$db);           
                $sum=0;
                while ($myrow3 = mysql_fetch_array($result3)) {           
                    
                    $id_kat=$myrow3["id_katigorias"];
                    $posotita=$myrow3["posotita"];
                    $sql4="select * from katigories where id_katigorias=$id_kat "; //εύρεση τιμής κιλού για κατηγορία
                    $result4=mysql_query($sql4,$db);
                    $myrow4 = mysql_fetch_array($result4);

                    if ($id_kat!=17) $sum=$sum+1.00*$posotita*$myrow4["timi"];  // δεν προσθέτει τις πράσινες ελιες (κατηγορία 17) 
                } 

                if($myrow2["eksoflithike"]=="No" and !round($sum,2)<=0)
                    $mi_tim_par++;

        }
        if ($mi_tim_par>0)
           $style="mitim";
        else 
           $style="tim";
        echo "<tr><td id=".$style.">".$myrow["eponimo"]."<td>".$myrow["onoma"]."<td>".$myrow["afm"];

        echo "<td><a href=\"paralabesshow.php?id=".$myrow["id_pelati"]."\">Παραλαβές</a>";
        echo "<td><a href=\"paralabesaddedit.php?id=".$myrow["id_pelati"]."\">Νέα Παραλαβή</a>";
        echo "<td><a href=\"timologiashow.php?id=".$myrow["id_pelati"]."\">Τιμολόγια</a>";
        echo "<td><a href=\"timologiaaddedit.php?id=".$myrow["id_pelati"]."\">Νέο τιμολόγιο</a>";
    }
    echo "</table>";
    echo "<br><span id=mitim>*</span>Οταν το επώνυμο είναι κόκκινο, ο πελατης έχει μη τιμολογημένες παραλαβές.";
    /*echo "<h2><p><a href=par_tim.php>Επιστροφή σε Παραλαβές και Τιμολόγια Πελατών</a>"; */
    }
elseif ($searchstring)
{
         echo "   <h1><u>Αποτελέσματα αναζήτησης</u></h1>";
    $sql="select * from pelates where $searchtype like '$searchstring%' order by eponimo, onoma";
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
    $result=mysql_query($sql,$db);
    echo "<table border=2>";
    echo "<tr align=center><td><span id=mitim>*</span><b>Επώνυμο</b><td><b>Ονομα</b><td><b>ΑΦΜ</b><td colspan=4  align=center><b>Επιλογές</b></tr>";
    while ($myrow = mysql_fetch_array($result))
    {
       
        $id_pelati=$myrow["id_pelati"];

        $sql2="select * from pelates, paralabes where paralabes.id_pelati=pelates.id_pelati and pelates.id_pelati=$id_pelati order by id_paralabis";
        $result2=mysql_query($sql2,$db);
        $mi_tim_par=0;
        while ($myrow2 = mysql_fetch_array($result2)) {
               $id_par=$myrow2["id_paralabis"];
                $sql3="select * from anal_paral where id_paralabis=$id_par"; //αναλυση παραλαβής που περιλαμβάνεται στο τιμολογιο
                $result3=mysql_query($sql3,$db);           
                $sum=0;
                while ($myrow3 = mysql_fetch_array($result3)) {           
                    
                    $id_kat=$myrow3["id_katigorias"];
                    $posotita=$myrow3["posotita"];
                    $sql4="select * from katigories where id_katigorias=$id_kat "; //εύρεση τιμής κιλού για κατηγορία
                    $result4=mysql_query($sql4,$db);
                    $myrow4 = mysql_fetch_array($result4);

                    if ($id_kat!=17) $sum=$sum+1.00*$posotita*$myrow4["timi"];  // δεν προσθέτει τις πράσινες ελιες (κατηγορία 17) 
                } 

                if($myrow2["eksoflithike"]=="No" and !round($sum,2)<=0)
                    $mi_tim_par++;
       }
        if ($mi_tim_par>0)
           $style="mitim";
        else 
           $style="tim";
        echo "<tr><td id=".$style.">".$myrow["eponimo"]."<td>".$myrow["onoma"]."<td>".$myrow["afm"];

        echo "<td><a href=\"paralabesshow.php?id=".$myrow["id_pelati"]."\">Παραλαβές</a>";
        echo "<td><a href=\"paralabesaddedit.php?id=".$myrow["id_pelati"]."\">Νέα Παραλαβή</a>";
        echo "<td><a href=\"timologiashow.php?id=".$myrow["id_pelati"]."\">Τιμολόγια</a>";
        echo "<td><a href=\"timologiaaddedit.php?id=".$myrow["id_pelati"]."\">Νέο τιμολόγιο</a>";  
//        echo $mi_tim_par;
          }
    echo "</table>";
    echo "<br><span id=mitim>*</span>Οταν το επώνυμο είναι κόκκινο, ο πελατης έχει μη τιμολογημένες παραλαβές.";
    /*echo "<h2><p><a href=par_tim.php>Επιστροφή σε Παραλαβές και Τιμολόγια Πελατών</a>"; */
}
else
{
    ?>
    
    <h1><u>Αναζήτηση πελάτη για παραλαβή ή τιμολόγιο</u></h1>
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
    <p> <input type="submit" value="Εμφάνιση Παραλαβών και Τιμολογίων Πελατών" name="B1"><input type="reset" value="Καθαρισμός"></p>
    </form>
    <!-- <p><h2><a href="elies.php">Αρχική σελίδα</a>
    -->
    <?php
}
?>
</div>
</body>
<?php include("footer.html");?>
</html>
    
