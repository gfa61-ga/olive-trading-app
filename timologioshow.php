<?php // 
  require_once 'checklogin.php';
?>

<?php include("header.php");?>




<html>
    <title> Εμφάνιση τιμολογίου </title>
<u><h1 align="center">Εμφάνιση τιμολογίου</h1><h4></u>
<p align="center">  <?php
      
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
    mysql_set_charset('utf8', $db);

    $id_timologiou = $id9;
    
    $result7=mysql_query("select * from pelates where id_pelati=$id");
    $myrow7 = mysql_fetch_array($result7);

    echo "Επώνυμο:".$myrow7["eponimo"].", ";
    echo "Ονομα:".$myrow7["onoma"].", ";
    echo "ΑΦΜ:".$myrow7["afm"]."<br><br>";
    echo "Ειδος τιμολογιου:".$myrow7["eidtim"].", ";
    $result11=mysql_query("select * from timologia where id_timologiou=$id_timologiou"); 
    $myrow11 = mysql_fetch_array($result11);
    
    echo "Ημερομηνία τιμολογίου:".grDate($myrow11["imerominia"]).", ";
    echo "Αριθμός τιμολογίου:".$myrow11["aa_tim"]."<br><br>";
      
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
    echo "</table>";    
    

  //  $fpa=$sum*0.23;
//    echo "ΦΠΑ 23% :".number_format(round($fpa,2),2)."<br>";
  //  $tel_poso=$sum+round($fpa,2);
//    echo "Τελικό ποσό:".number_format($tel_poso,2)."<br>";
        
    if ($ekt=="Yes") 
    {
        echo "<h2 align=center><p><a href=\"timologiaanapelati.php\">Επιστροφή στην εμφανιση ολων των τιμολογιων ανα πελατη</a>";  
        /*echo "<h2 align=center><p><a href=\"eksiposeis.php\">Επιστροφή στις εκτυπωσεις</a>";   */   
    }
    else if($ekt=="Yesanim") {
        echo "<h2 align=center><p><a href=\"timologiaanaimera.php?searchstring=$searchstring\">Επιστροφή στην εμφανιση ολων των τιμολογιων ανα ημερομηνια</a>";
        /* echo "<h2 align=center><p><a href=\"eksiposeis.php\">Επιστροφή στις εκτυπωσεις</a>";  */    
    }
    else {
         echo "<h2 align=center><p><a href=\"timologiashow.php?id=$id\">Επιστροφή στα τιμολογια του πελάτη</a>";

    
         /*echo "</p><h2 align=center><a href=\"par_tim.php\">Επιστροφή στις παραλαβές και τιλομογια πελατών</a></h2>"; */
    }

 ?>
</body>    
<?php include("footer.html");?>
</html>

