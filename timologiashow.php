<?php // 
  require_once 'checklogin.php';
?>
<?php include("header.php");?>
<html>
    <title> Κατάσταση τιμολογίων για Πελάτη </title>
   
<div align="center">
  <?php
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
       mysql_set_charset('utf8', $db);
       
    $sql3="select * from pelates where id_pelati=$id"; //στοιχεία πελάτη
    $result3=mysql_query($sql3,$db);
    $myrow3 = mysql_fetch_array($result3);
    echo "<h1><u>Τιμολόγια για πελάτη:</u></h1> ".$myrow3["eponimo"].", ".$myrow3["onoma"].", ΑΦΜ:".$myrow3["afm"]."<br><br>";
    $eponimo=$myrow3["eponimo"]; // μάλλον δεν χρειάζεται αυτή η σειρα
    $eidostimol=$myrow3["eidtim"];
    $afm=$myrow3["afm"];

    $sql="select * from timologia where id_pelati=$id order by imerominia asc"; //επιλογη τιμολογίων απο πελάτη
    $result=mysql_query($sql,$db);
    echo "<table border=2>";
    
    echo "<tr><td><b>Ημερομηνία</b>";
    echo "<td><b>Αριθμός τιμολογίου</b>";
    echo "<td><b>Ειδος Τιμολογίου</b>";
    echo "<td><b>Ποσό χωρίς ΦΠΑ</b>";
    echo "<td colspan=2 align=center><b>Επιλογές</b>";
    echo "<tr>";
  
    $total=0;
    while ($myrow = mysql_fetch_array($result))
    {
        $sum=0;
        echo "<tr><td>".grDate($myrow["imerominia"]);
        echo "<td align=center>".$myrow["aa_tim"];
        echo "<td>".$eidostimol;
        $id_tim=$myrow["id_timologiou"];      
        $sql2="select * from anal_timol where id_timologiou=$id_tim"; //αναλυση τιμολογίου
        $result2=mysql_query($sql2,$db);
                
        while ($myrow2 = mysql_fetch_array($result2))
       
       {
            $id_par=$myrow2["id_paralabis"];
            $sql3="select * from anal_paral where id_paralabis=$id_par"; //αναλυση παραλαβής που περιλαμβάνεται στο τιμολογιο
            $result3=mysql_query($sql3,$db);
                   
            while ($myrow3 = mysql_fetch_array($result3)) {           
                            
                $id_kat=$myrow3["id_katigorias"];
                $posotita=$myrow3["posotita"];
                $sql4="select * from katigories where id_katigorias=$id_kat "; //εύρεση τιμής κιλού για κατηγορία
                $result4=mysql_query($sql4,$db);
                $myrow4 = mysql_fetch_array($result4);

               if ($id_kat!=17) $sum=$sum+1.00*$posotita*$myrow4["timi"];   // δεν προσθέτει τις πράσινες ελιες 
            }
       }
        
        echo "<td align=right>".number_format($sum,2);
        echo "<td><a href=\"timologioshow.php?id=$id&id9=".$myrow["id_timologiou"]."\">Εμφάνιση</a>";
        echo "<td><a href=\"timologiodelete.php?id=$id&id9=".$myrow["id_timologiou"]."\">Διαγραφή</a><tr>";
        $total=$total+$sum;
    }
    
    echo "</table><br>";
    echo "<h4><p align=center>Συνολικό ποσό τιμολογίων: <b><u>".number_format($total,2)."</u></b></h4>";
    
    echo "</h1><h2 align=center><p><a href=\"par_tim.php?searchstring=".$eponimo."&searchtype=eponimo\">Επιστροφή στον Πελάτη</a>";
?>    

<!--<h2 align="center"><a href="par_tim.php">Επιστροφή σε Παραλαβές και τιμολόγια πελατών</a></h2>-->
</div>
</body>
<?php include("footer.html");?>
</html>
    