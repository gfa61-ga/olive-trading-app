<?php // 
  require_once 'checklogin.php';
?>

<?php include("header.php");?>




<html>
    <title> Κατάσταση πράσινων ελιών ανα πελάτη </title>


<?php

    
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
       mysql_set_charset('utf8', $db);
    echo "<h3 align=center><u>Κατάσταση πράσινων ελιών ανα πελάτη:</u></h3><br><p align=center>";
    
    $sql="select * from pelates, paralabes, anal_paral, katigories where pelates.id_pelati=paralabes.id_pelati AND paralabes.id_paralabis=anal_paral.id_paralabis AND anal_paral.id_katigorias=17 and katigories.id_katigorias=anal_paral.id_katigorias order by eponimo, onoma, imerominia"; //επιλογη ολων των παραλαβών πράσινων ελιών

    $result=mysql_query($sql,$db);
//    echo mysql_errno().": ".mysql_error($db);
    echo "<table border=2  align=center>";
    
    echo "<tr><td><b>Ημερομηνία παραλαβής</b>";
    echo "<td><b>Επώνυμο Πελάτη</b>";
    echo "<td><b>Ονομα Πελάτη</b>";
    echo "<td><b>ΑΦΜ Πελάτη</b>";
    echo "<td><b>Κιλά πράσινων ελιών</b>";
    echo "<td><b>Ποσό χωρίς ΦΠΑ</b>";
    echo "<tr>";
   
    $total=0;
    $total_p=0;
    $total_a=0;
    $start=1;
    $totalpelati=0;
    while ($myrow = mysql_fetch_array($result))
    {
        if($myrow["posotita"]<=0) continue;
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
        	echo "</tr><tr><td colspan=8 align=right><B>Συνολικό ποσό πελάτη:".number_format($temp34,2)."</b></td></tr>";
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
        
        echo "<td align=right>".$myrow["posotita"];
        $sum=round($myrow["posotita"]*$myrow["timi"],2);


        
        echo "<td align=right>".number_format(round($sum*1.00,2),2);
 
        $total=$total+round($sum*1.00,2);
        $totalpelati=$totalpelati+round($sum*1.00,2);

        	
    }
    echo "<tr><td colspan=8 align=right><b>Συνολικό ποσό πελάτη:".number_format($totalpelati,2)."</b></td></tr>";
    echo "</table>";
    echo "</tr> <br><h4>
    <p align=center>Συνολικό ποσό πράσινων ελιών χωρίς ΦΠΑ: <b><u>".number_format($total,2)."</u></b></h4>";


    ?>
    
    <!--
    <p><h2 align=center><a href="eksiposeis.php">Επιστροφή στις εκτυπώσεις</a></h2>
    -->
</body>
<?php include("footer.html");?>
</html>
    
    
    