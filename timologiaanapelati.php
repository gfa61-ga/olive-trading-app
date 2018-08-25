<?php // 
  require_once 'checklogin.php';
?>

<?php include("header.php");?>



<html>
    <title> Κατάσταση τιμολογίων ανα πελάτη </title>

<?php

    
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
       mysql_set_charset('utf8', $db);
    echo "<h3 align=center><u>Κατάσταση τιμολογίων ανα πελάτη:</u></h3><br><p align=center>";
    
    $sql="select * from pelates, timologia where pelates.id_pelati=timologia.id_pelati order by eponimo, onoma, imerominia"; //επιλογη ολων των τιμολογίων
    $result=mysql_query($sql,$db);
//    echo mysql_errno().": ".mysql_error($db);
    echo "<table border=2  align=center>";
    
    echo "<tr><td><b>Ημερομηνία</b>";
    echo "<td><b>Επώνυμο Πελάτη</b>";
    echo "<td><b>Ονομα Πελάτη</b>";
    echo "<td><b>ΑΦΜ Πελάτη</b>";
    echo "<td><b>Αριθμός τιμολογίου</b>";
    echo "<td><b>Είδος τιμολογίου</b>";
    echo "<td><b>Ποσό χωρίς ΦΠΑ</b>";
    echo "<td><b>Επιλογές</b>";
    echo "<tr>";
   
    $total=0;
    $total_p=0;
    $total_a=0;
    $start=1;
    $totalpelati=0;
    while ($myrow = mysql_fetch_array($result))
    {
        $sum=0;
        
        $id=$myrow["id_pelati"];
        if ($start ==1) {
        	$start=0;
        	$idold=$id;
        }
        if ($idold != $id)
        {
        	$idold=$id;
        	$temp34=$totalpelati;
        	echo "</tr><tr><td colspan=8 align=right><B>Σύνολο τιμολογίων πελάτη:".number_format($temp34,2)."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td></tr>";
        	$totalpelati=0;;
        }
       // $date = new DateTime($myrow["imerominia"]); 
        echo "<tr><td>".grDate($myrow["imerominia"]);
        $sql3="select * from pelates where id_pelati=$id"; //στοιχεία πελάτη
        $result3=mysql_query($sql3,$db);
        $myrow3 = mysql_fetch_array($result3);
        echo "<td>".$myrow3["eponimo"];
        echo "<td>".$myrow3["onoma"];
        echo "<td>".$myrow3["afm"];
        
        echo "<td>".$myrow["aa_tim"];
        echo "<td>".$myrow3["eidtim"];
        $eidtim=$myrow3["eidtim"];
        $id_tim=$myrow["id_timologiou"];      
        $sql2="select * from anal_timol where id_timologiou=$id_tim"; //αναλυση τιμολογίου
        $result2=mysql_query($sql2,$db);
                
        while ($myrow2 = mysql_fetch_array($result2))
       
       {
            $id_par=$myrow2["id_paralabis"];
            $sql3="select * from anal_paral where id_paralabis=$id_par"; //αναλυση παραλαβής που περιλαμβάνεται στο τιμολογιο
            $result3=mysql_query($sql3,$db);
           
            while ($myrow3 = mysql_fetch_array($result3))
            {               
                $id_kat=$myrow3["id_katigorias"];
                $posotita=$myrow3["posotita"];
                $sql4="select * from katigories where id_katigorias=$id_kat "; //εύρεση τιμής κιλού για κατηγορία
                $result4=mysql_query($sql4,$db);
                $myrow4 = mysql_fetch_array($result4);
         
                 if ($id_kat!=17) $sum=$sum+round($posotita*$myrow4["timi"],2);   // δεν προσθέτει τις πράσινες ελιες 
            }
     }
        
        echo "<td align=right>".number_format($sum*1.00,2);

            if ($eidtim=="ΠΩΛΗΣΗΣ")
                $total_p=$total_p+round($sum*1.00,2);
            else if ($eidtim=="ΑΓΟΡΑΣ")
                $total_a=$total_a+round($sum*1.00,2);
  
        $total=$total+round($sum*1.00,2);
        $totalpelati=$totalpelati+round($sum*1.00,2);
        echo "<td><a href=\"timologioshow.php?id=$id&ekt=Yes&id9=".$myrow["id_timologiou"]."\">Εμφάνιση</a>";

        	
    }
    echo "<tr><td colspan=8 align=right><b>Σύνολο τιμολογίων πελάτη:".number_format($totalpelati,2)."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td></tr>";
    echo "</table>";
    echo "</tr><br>
<h4>
    <p align=center>Τιμολόγια ΑΓΟΡΑΣ χωρίς ΦΠΑ.............: <b><u>".number_format($total_a,2)."</u></b>
    <p align=center>Τιμολόγια ΠΩΛΗΣΗΣ χωρίς ΦΠΑ.........: <b><u>".number_format($total_p,2)."</u></b>
    <p align=center>-----------------------------------------------------------------
    <p align=center>Συνολικό ποσό τιμολογίων χωρίς ΦΠΑ.: <b><u>".number_format($total,2)."</u></b></h4>";


    ?>
    <!--
    <p><h2 align=center><a href="eksiposeis.php">Επιστροφή στις εκτυπώσεις</a></h2>
     -->
</body>
<?php include("footer.html");?>
</html>
    
    
    