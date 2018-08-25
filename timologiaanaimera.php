<?php // 
  require_once 'checklogin.php';
?>
<?php include("header.php");?>





<html>
    <title> Κατάσταση τιμολογίων ανα ημερομηνία </title>


<?php
    if ($searchstring=="*")
{
    
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
    
    echo "<h3  align=center><u>Κατάσταση τιμολογίων μέχρι σήμερα ταξινομημένων με αύξουσα ημερομηνία:</u></h3><br><p align=center>";
    
//  $sql="select * from timologia order by imerominia, id_pelati"; 
    $sql="select * from timologia, pelates where pelates.id_pelati=timologia.id_pelati order by imerominia, eponimo, onoma"; //επιλογη όλων των τιμολογίων
    $result=mysql_query($sql,$db);
    echo "<table border=2 align=center>";
    
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
    while ($myrow = mysql_fetch_array($result))
    {
        $sum=0;
        echo "<tr><td>".grDate($myrow["imerominia"]);
        $id=$myrow["id_pelati"];
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
         echo "<td><a href=\"timologioshow.php?id=$id&ekt=Yesanim&id9=".$myrow["id_timologiou"]."&searchstring=$searchstring"."\">Εμφάνιση</a>";

    }
    
    echo "</table>";
    echo "<br><h4>
    <p align=center>Τιμολόγια ΑΓΟΡΑΣ χωρίς ΦΠΑ.............: <b><u>".number_format($total_a,2)."</u></b>
    <p align=center>Τιμολόγια ΠΩΛΗΣΗΣ χωρίς ΦΠΑ.........: <b><u>".number_format($total_p,2)."</u></b>
    <p align=center>-----------------------------------------------------------------
    <p align=center>Συνολικό ποσό τιμολογίων χωρίς ΦΠΑ.: <b><u>".number_format($total,2)."</u></b></h4>";
}
elseif ($searchstring)
{
    $dateUF=strtotime($searchstring);
    $date1=date("Y-m-d", $dateUF);
    if ($date1=="1970-01-01") $date1="0000-00-00";
    
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
    echo "<h3 align=center><u>Κατάσταση τιμολογίων στις ".grDate($date1).":</u></h3><br><p align=center>";
    
//  $sql="select * from timologia where imerominia like '$date1'  order by id_pelati"; 
    $sql="select * from timologia, pelates where imerominia like '$date1' and pelates.id_pelati=timologia.id_pelati order by eponimo, onoma";   //επιλογη των τιμολογίων της ημέρας $searchstring
    $result=mysql_query($sql,$db);

    $total=0;
    $total_p=0;
    $total_a=0; 

while ($myrow = mysql_fetch_array($result))
    {
echo "<hr><p align=center>";
$id=$myrow["id_pelati"];

$id9=$myrow["id_timologiou"];


//    echo mysql_errno().": ".mysql_error($db);
/*    echo "<table border=2 align=center>";
    
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
    while ($myrow = mysql_fetch_array($result))
    {
        $sum=0;
        echo "<tr><td>".grDate($myrow["imerominia"]);
        $id=$myrow["id_pelati"];
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
         
               if ($id_kat!=17) $sum=$sum+round($posotita*$myrow4["timi"],2); // δεν προσθέτει τις πράσινες ελιες 
            }
       }
        
        echo "<td align=right>".round($sum*1.00,2);

            if ($eidtim=="ΠΩΛΗΣΗΣ")
                $total_p=$total_p+round($sum*1.00,2);
            else if ($eidtim=="ΑΓΟΡΑΣ")
                $total_a=$total_a+round($sum*1.00,2);

        $total=$total+round($sum*1.00,2);

        echo "<td><a href=\"timologioshow.php?id=$id&ekt=Yesanim&id9=".$myrow["id_timologiou"]."&searchstring=$searchstring"."\">Εμφάνιση</a>";

    }
    
    echo "</table>";
    echo "
    <p align=center>Τιμολόγια ΑΓΟΡΑΣ χωρίς ΦΠΑ: <b><u>".$total_a."</u></b>
    <p align=center>Τιμολόγια ΠΩΛΗΣΗΣ χωρίς ΦΠΑ: <b><u>".$total_p."</u></b>
    <p align=center>Συνολικό ποσό τιμολογίων χωρίς ΦΠΑ: <b><u>".$total."</u></b>";
*/
      
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
    mysql_set_charset('utf8', $db);

    $id_timologiou = $id9;
    
    $result7=mysql_query("select * from pelates where id_pelati=$id");
    $myrow7 = mysql_fetch_array($result7);

    echo "Επώνυμο:<b> ".$myrow7["eponimo"]."</b>, ";
    echo "Ονομα:<b> ".$myrow7["onoma"]."</b>, ";
    echo "ΑΦΜ: ".$myrow7["afm"]."<br><br>";
    $eidtim=$myrow7["eidtim"];
    echo "Ειδος τιμολογιου: ".$myrow7["eidtim"].", ";
    $result11=mysql_query("select * from timologia where id_timologiou=$id_timologiou"); 
    $myrow11 = mysql_fetch_array($result11);
    
    echo "Ημερομηνία τιμολογίου:<b> ".grDate($myrow11["imerominia"])."</b>, ";
    echo "Αριθμός τιμολογίου: ".$myrow11["aa_tim"]."<br>";
      
    $result8=mysql_query("select * from katigories order by perigrafi asc");

    while ($myrow8 = mysql_fetch_array($result8))
    {
        $temp_name="$"."posotita".$myrow8["id_katigorias"];
        $$temp_name=0;
    }
    
    $result1=mysql_query("select * from anal_timol where id_timologiou=$id_timologiou order by id_paralabis asc");     
    
    while ($myrow1 = mysql_fetch_array($result1))    //για κάθε παραλαβή που περιλαμβάνει το τιμολογιο
    {
        $id_par=$myrow1["id_paralabis"];
        $temp_name="$"."eksoflithike".$myrow1["id_paralabis"];
                                    
            $result6=mysql_query("select * from anal_paral where id_paralabis=$id_par order by id_katigorias asc");

            while ($myrow6 = mysql_fetch_array($result6))
            {
                $temp_name="$"."posotita".$myrow6["id_katigorias"];
                $temp_pos=$$temp_name;
                $$temp_name=$temp_pos+$myrow6["posotita"];
            }
    }

    echo "<table border=2 align=center>";
    
    echo "<tr align=center><td><b>Κατηγορια</b>";
    echo "<td><b>Κιλα</b>";
    echo "<td><b>Τιμή κιλου</b>";
    echo "<td><b>Σύνολο</b>";
    echo "<tr>";

    $result8=mysql_query("select * from katigories order by perigrafi asc");  //για κάθε κατηγορία

    $sum=0; 
    $kila=0;
    while ($myrow8 = mysql_fetch_array($result8))
    {
        if ($myrow8["id_katigorias"]==17) continue;    // δεν προσθέτει τις πράσινες ελιες  
        
        $temp_pos= "$"."posotita".$myrow8["id_katigorias"];

        if ($$temp_pos>0) 
        {
            echo "<td align=center>".mb_substr($myrow8["perigrafi"], 0, 3);
            echo "<td align=right>".number_format($$temp_pos);
            echo "<td align=center>".number_format(round($myrow8["timi"],2),2);

            echo "<td align=right>".number_format(round($$temp_pos * $myrow8["timi"],2),2)."<tr>";
        }
        $sum=$sum+round($$temp_pos*$myrow8["timi"],2);       
        $kila=$kila+ $$temp_pos;
    }
    echo "<td align=right>Σύνολα:";
    echo "<td align=right><b><u>".number_format($kila,0)."</u></b>";
    echo "<td align=right colspan=2><b><u>".number_format($sum,2)."</u></b>";
    echo "</table><br>";  

    if ($eidtim=="ΠΩΛΗΣΗΣ")
                $total_p=$total_p+round($sum*1.00,2);
            else if ($eidtim=="ΑΓΟΡΑΣ")
                $total_a=$total_a+round($sum*1.00,2);
   $total=$total+round($sum*1.00,2);
  
        
    

}
  echo "<hr><p align=center>";  
  echo "<br><h4>
    <p align=center>Τιμολόγια ΑΓΟΡΑΣ χωρίς ΦΠΑ.............: <b><u>".number_format($total_a,2)."</u></b>
    <p align=center>Τιμολόγια ΠΩΛΗΣΗΣ χωρίς ΦΠΑ.........: <b><u>".number_format($total_p,2)."</u></b>
    <p align=center>-----------------------------------------------------------------
    <p align=center>Συνολικό ποσό τιμολογίων χωρίς ΦΠΑ.: <b><u>".number_format($total,2)."</u></b></h4>";
}
else
{
    ?>
    
    <b><u> <h2 align=center>Επιλογή ημερομηνίας τιμολογίων: </h2></u></b>
    <div align="center"><br>
        
    </div>
    <form method="post" accept-charset="utf-8" action="<?php $PHP_SELF ?>">
    <div align="center">
      <table border="2" cellpacing="2">
      <tr><td>Γράψτε ημερομηνία τιμολογίων, <br>ή * γιά εμφάνιση των τιμολογίων όλων των ημερών:</td>
      <!--<td>Αναζήτηση με:</td>--></tr>
      <tr>
          <td><input type="text" name="searchstring" size="12" value="*"></td>
          <!--<td><select size="1" name="searchtype">
          <option selected value="imerominia">Ημερομηνία</option>
          </select>
          </td>-->
      </tr>
      </table>
    </div>
    <br>
    <p align="center"> <input type="submit" value="Εμφάνιση Τιμολογίων" name="B1"><input type="reset" value="Καθαρισμός"></p>
    </form>
    
    <?php
}
    ?>
    
    <!--
    <p><h2 align=center><a href="eksiposeis.php">Επιστροφή στις εκτυπώσεις</a></h2>
    -->
</body>
<?php include("footer.html");?>
</html>
    
    
    