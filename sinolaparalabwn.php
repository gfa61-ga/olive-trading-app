<?php // 
  require_once 'checklogin.php';
?>

    <?php include("header.php");?>

    

<html>
    <title> Συνόλων παραλαβών μέχρι σήμερα </title>


<?php
     
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);

    echo "<h3 align=center><u>Σύνολο παραλαβών μέχρι σήμερα:</u></h3>"."<br>";

   $result8=mysql_query("select * from katigories order by perigrafi asc");

    while ($myrow8 = mysql_fetch_array($result8))
    {
        $temp_name="$"."posotita".$myrow8["id_katigorias"];
        $$temp_name=0;
    }
    
    $result1=mysql_query("select * from paralabes  order by id_paralabis asc");     
    
    while ($myrow1 = mysql_fetch_array($result1))    //για κάθε παραλαβή που περιλαμβάνει το τιμολογιο
    {
        $id_par=$myrow1["id_paralabis"];
        $temp_name="$"."paralabi".$myrow1["id_paralabis"];

        $result6=mysql_query("select * from anal_paral where id_paralabis=$id_par order by id_katigorias asc");

            while ($myrow6 = mysql_fetch_array($result6))
            {
                $temp_name="$"."posotita".$myrow6["id_katigorias"];
                $temp_pos=$$temp_name;
                $$temp_name=$temp_pos+$myrow6["posotita"];
            }
    }

    echo "<table border=2 align=center>";
    
    echo "<tr><td><b>Περιγραφή</b>";
    echo "<td><b>Ποσότητα</b>";
    echo "<td><b>Τιμή μονάδας</b>";
    echo "<td><b>Σύνολα</b>";
    echo "<tr>";

    $result8=mysql_query("select * from katigories order by perigrafi asc");  //για κάθε κατηγορία
 
    $sumEliwn=0; 
    $sum=0; 
    while ($myrow8 = mysql_fetch_array($result8))
    {
        echo "<td>".$myrow8["perigrafi"];
        $temp_pos= "$"."posotita".$myrow8["id_katigorias"];
        $sumEliwn=$sumEliwn+$$temp_pos;
        echo "<td align=right>".number_format($$temp_pos,0);
        echo "<td align=right>".number_format(round($myrow8["timi"],2),2);

        if ($$temp_pos>0)
            echo "<td align=right>".number_format(round($$temp_pos * $myrow8["timi"],2),2)."<tr>";
        else
            echo "<tr>";
        
        $sum=$sum+round($$temp_pos*$myrow8["timi"],2);        
    }

    echo "</table> <br><h4>";    
    echo "<p align=center>Σύνολικα κιλά ελιών..............: <b><u>".number_format($sumEliwn,0)."</u></b><br>";
    echo "<p align=center>-------------------------------------------------";
    echo "<p align=center>Σύνολική αξία χωρίς ΦΠΑ: <b><u>".number_format($sum,2)."</u></b></h4><br>";
    $fpa=round($sum*0.23,2);
//    echo "ΦΠΑ 23% :".number_format($fpa,2)."<br>";
    $tel_poso=$sum+$fpa;
//    echo "Τελικό ποσό:".number_format($tel_poso,2)."<br><br><br>";
    
    ?>
    <!--
    <h2 align="center"><a href="eksiposeis.php">Επιστροφή στις εκτυπώσεις</a></h2>
    -->
</body>
<?php include("footer.html");?>
</html>
