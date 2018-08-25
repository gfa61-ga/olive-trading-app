<?php // 
  require_once 'checklogin.php';
?>
<?php include("header.php");?>
<html>
    <title> Εισαγωγή Τιμολογίων </title>

<div align=center>
<?php
    if ($submit)
{
    $dateUF=strtotime($date);
    $date1=date("Y-m-d", $dateUF);
    //if ($date1=="1970-01-01") $date1="0000-00-00";

    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
    mysql_set_charset('utf8', $db);
    $sql="insert into timologia (imerominia, id_pelati, aa_tim)
       values ('$date1','$id','$aa_tim')";
    $result=mysql_query($sql);   
//    echo mysql_errno().": ".mysql_error($db);
    
    $id_timologiou = mysql_insert_id($db);
    
    $result7=mysql_query("select * from pelates where id_pelati=$id");
    $myrow7 = mysql_fetch_array($result7);

    echo "<h1><u>Εγινε καταχώρηση του παρακάτω τιμολογίου:</u></h1>"."";
    echo "Επώνυμο:".$myrow7["eponimo"]."<br>";
    echo "Ονομα:".$myrow7["onoma"]."<br>";
    echo "ΑΦΜ:".$myrow7["afm"]."<br>";
    echo "Ημερομηνία τιμολογίου:".grDate($date1)."<br>";
    echo "Αριθμός τιμολογίου:".$aa_tim."<br><br>";
        
    $result8=mysql_query("select * from katigories order by perigrafi asc");

    while ($myrow8 = mysql_fetch_array($result8))
    {
        $temp_name="$"."posotita".$myrow8["id_katigorias"];
        $$temp_name=0;
    }
    
    $result1=mysql_query("select * from paralabes where eksoflithike='No' and id_pelati=$id order by id_paralabis asc");     
    
    while ($myrow1 = mysql_fetch_array($result1))    //για κάθε παραλαβή που δεν εξοφλήθηκε
    {
        $id_par=$myrow1["id_paralabis"];
        $temp_name="$"."eksoflithike".$myrow1["id_paralabis"];
        if (isset($_POST["eksoflithike".$myrow1["id_paralabis"]]))  $$temp_name="Yes"; else $$temp_name="No";
//        $$temp_name="Yes";
//        echo $temp_name, $$temp_name;
        $temp_state=$$temp_name;
        $sql9="update paralabes set eksoflithike='$temp_state' where id_paralabis=$id_par";
        $result9=mysql_query($sql9);   //ενημέρωση παραγγελίας αν εξοφλήθηκε ή όχι

        if (isset($_POST["eksoflithike".$myrow1["id_paralabis"]]))  //για κάθε παραλαβή που επιλέχθηκε
        {
            
            $sql0="insert into anal_timol (id_timologiou, id_paralabis)
                values ('$id_timologiou','$id_par')";
            $result10=mysql_query($sql0);
            
            $result6=mysql_query("select * from anal_paral where id_paralabis=$id_par order by id_katigorias asc");

            while ($myrow6 = mysql_fetch_array($result6))
            {
                $temp_name="$"."posotita".$myrow6["id_katigorias"];
                $temp_pos=$$temp_name;
                $$temp_name=$temp_pos+$myrow6["posotita"];
            }
        }
    }

    echo "<table border=2>";
    
    echo "<tr  align=center><td><b>Κατηγορία</b>";
    echo "<td><b>Ποσότητα</b>";
    echo "<td><b>Τιμή μονάδας</b>";
    echo "<td><b>Σύνολο</b>";
    echo "<tr>";

    $result8=mysql_query("select * from katigories order by perigrafi asc");  //για κάθε κατηγορία

    $sum=0; 
    while ($myrow8 = mysql_fetch_array($result8))
    {
        if ($myrow8["id_katigorias"]==17) continue;    // δεν προσθέτει τις πράσινες ελιες  
       /* echo "<td>".$myrow8["perigrafi"];*/
        $temp_pos= "$"."posotita".$myrow8["id_katigorias"];
       

        if ($$temp_pos>0) 
        {
            echo "<td align=center>".mb_substr($myrow8["perigrafi"], 0, 3);
            echo "<td align=right>".number_format($$temp_pos);
            echo "<td align=center>".number_format(round($myrow8["timi"],2),2);

            echo "<td align=right>".number_format(round($$temp_pos * $myrow8["timi"],2),2)."<tr>";
        }
        /*echo "<td align=right>".$$temp_pos;
        echo "<td align=right>".number_format(round($myrow8["timi"],2),2);
        
        if ($$temp_pos>0)
            echo "<td align=right>".number_format(round($$temp_pos * $myrow8["timi"],2),2)."<tr>";
        else
            echo "<tr>";*/
        
        
        $sum=$sum+round($$temp_pos*$myrow8["timi"],2);  
    }

    echo "</table>";    
    
    echo "<br>Σύνολο χωρίς ΦΠΑ: <b><u>".number_format($sum,2)."</u></b><br>";
    $fpa=round($sum*0.23,2);
   // echo "ΦΠΑ 23% :".number_format($fpa,2)."<br>";
    $tel_poso=$sum+$fpa;
   // echo "Τελικό ποσό:".number_format($tel_poso,2)."<br>";

    echo "<p><h2><a href=\"timologiashow.php?id=$id\">Επιστροφή στα τιμολογια του πελάτη</a>";
    
    ?>
    <!--<p><h2><a href="par_tim.php">Επιστροφή στις παραλαβές και τιλομογια πελατών</a>-->
    
    <?php
}

else   // εισαγωγή νέου τιμολογίου
{
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
     mysql_set_charset('utf8', $db);
    $sql3="select * from pelates where id_pelati=$id"; //στοιχεία πελάτη
    $result3=mysql_query($sql3,$db);
    $myrow3 = mysql_fetch_array($result3);
    echo "<h1><u>Εισαγωγή Νέου τιμολογίου για πελάτη:</u></h1><br> <h4>".$myrow3["eponimo"].", ".$myrow3["onoma"].", ΑΦΜ:".$myrow3["afm"];

    ?>                                
    <form method="post" accept-charset="utf-8" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <br>Ημερομηνία τιμολογίου:<input type="date" name="date"><br>
    Αριθμός τιμολογίου:<input type="Text" size="24" name="aa_tim"><br><br>
    <u><h3>Επιλέξτε ποιές μη τιμολογημένες παραλαβές περιλαμβάνει το νέο τιμολόγιο:</h3><h4></u>

    <table border=2>
    <?php

    echo "<td><b>Ημερομηνία</b>";
    echo "<td><b>Ποσό χωρίς ΦΠΑ (δεν συμπεριλαμβάνονται οι πράσινες ελιές)</b>";
    echo "<td><b>Επιλογή</b>";
    echo "<tr>";

    $result=mysql_query("select * from paralabes where eksoflithike='No' and id_pelati=$id order by id_paralabis asc");               
    while ($myrow = mysql_fetch_array($result))    //για κάθε μη τιμολογημένη παραλαβή απο πελάτη
    {
        
 
            $id_par=$myrow["id_paralabis"];
            $sql3="select * from anal_paral where id_paralabis=$id_par"; //αναλυση παραλαβής που περιλαμβάνεται στο τιμολογιο
            $result3=mysql_query($sql3,$db);
           
            $sum=0;
            while ($myrow3 = mysql_fetch_array($result3)) {           
                
                $id_kat=$myrow3["id_katigorias"];
                $posotita=$myrow3["posotita"];
                $sql4="select * from katigories where id_katigorias=$id_kat "; //εύρεση τιμής κιλού για κατηγορία
                $result4=mysql_query($sql4,$db);
                $myrow4 = mysql_fetch_array($result4);

                if ($id_kat!=17) $sum=$sum+1.00*$posotita*$myrow4["timi"];  // δεν προσθέτει τις πράσινες ελιες 
            }
        if (round($sum,2)<=0) continue;    
        echo "<td>".grDate($myrow["imerominia"]); 
        echo "<td  align=right>".number_format(round($sum,2),2)."<td align=center>";
        $temp_name="eksoflithike".$myrow["id_paralabis"];
        
        ?>
        <input type="checkbox" name=<?php echo $temp_name;  ?> value="Yes" <?php if ($myrow["eksoflithike"]=="Yes") echo $temp_name."='checked'";  ?> /><br><tr>
        <?php
    }
//    echo $temp_name;
    echo "</table>";
  
    if ( mysql_num_rows($result)>0) {
    ?>   
    <br> 
    <input type="submit" name="submit" value="Καταχώρηση του νέου τιμολογίου"></form>
    <?php
    }
    else {
    ?>
    </form>
    <br><br> <font color="red"><b>Δεν μπορει να γίνει καταχώρηση νεου τιμολογίου, <br> επειδη δεν υπάρχουν μη τιμολογημένες παραλαβές. <b></font><br><br>
    <?php
    }
    echo "<p><h2><a href=\"timologiashow.php?id=$id\">Επιστροφή στα τιμολογια του πελάτη</a>";
}
?>
</div>
</body>
<?php include("footer.html");?>
</html>



