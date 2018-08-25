<?php // 
  require_once 'checklogin.php';
?>
<?php include("header.php");?>
<html>
    <title> Κατάσταση παραλαβών από Πελάτη </title>
  <div align=center>
<?php
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
    
    $sql3="select * from pelates where id_pelati=$id"; //στοιχεία πελάτη
    $result3=mysql_query($sql3,$db);
    $myrow3 = mysql_fetch_array($result3);
    echo "<h1><u>Παραλαβές από πελάτη:</u></h1><h3> ".$myrow3["eponimo"].", ".$myrow3["onoma"].", ΑΦΜ:".$myrow3["afm"]."<br><br></h3>";

    $sql="select * from paralabes where id_pelati=$id order by imerominia asc"; //επιλογη παραλαβών απο πελάτη
    $result=mysql_query($sql,$db);
    echo "<table border=2>";
    
    echo "<tr align=center><td><b>Ημερομηνία";
        $sql1="select * from katigories order by perigrafi asc"; //επιλογη κατηγοριών ελιών για επικεφαλίδες
        $result1=mysql_query($sql1,$db);
        while ($myrow1 = mysql_fetch_array($result1))
        {
 //           echo "<td><h4>".substr($myrow1["perigrafi"],0,4)."</h4><h6>".substr($myrow1["perigrafi"],4,11)."</h6>";
              if ($myrow1["id_katigorias"]==17)
                  echo "<td><h5>".mb_substr($myrow1["perigrafi"],0,8)."</h5>";
              else
                  echo "<td><h5>".mb_substr($myrow1["perigrafi"],0,4)."</h5>";
        }
    
     echo "<td><h6><b>Συνολικα κιλα (πλην πράσινων)</b></h6>";
             echo "<td><h6><b>Συνολικο ποσο (πλην πράσινων)</b></h6>";
         echo "<td><h6><b>Τιμολο- γήθηκε</b></h6>";
            echo "<td><h6><b>Επεξεργασια</b></h6>";

    echo "<tr>";
  
    while ($myrow = mysql_fetch_array($result))
    {
        echo "<tr align=center><td>".grDate($myrow["imerominia"]);
        $id_par=$myrow["id_paralabis"];      
        $sql2="select * from katigories left join anal_paral on katigories.id_katigorias=anal_paral.id_katigorias and anal_paral.id_paralabis=$id_par order by katigories.perigrafi asc"; //αναλυση παραλαβής
        $result2=mysql_query($sql2,$db);
  //          echo mysql_errno().": ".mysql_error($db);
        $athp=0;
         $atht=0;
        while ($myrow2 = mysql_fetch_array($result2))
       {
           echo "<td align=right>".$myrow2["posotita"]; 
           if ($myrow2["id_katigorias"]==17) continue;
           $athp=$athp+$myrow2["posotita"];
           $atht=$atht+$myrow2["posotita"]*$myrow2["timi"];
       }
         echo "<td align=right>".$athp; 
                  echo "<td align=right>".number_format($atht,2); 
        echo "<td>";
        if($myrow["eksoflithike"]=="No")
            {
                echo "Οχι";
                echo "<td><a href=\"paralabesaddedit.php?id=$id&id9=".$myrow["id_paralabis"]."\">Επεξεργασία</a>";
            }
        else echo "Ναι";
        echo "<tr>";
    } 
    
    echo "</table>";
    
    echo "<p><h2><a href=\"par_tim.php?searchstring=".$myrow3["eponimo"]."&searchtype=eponimo\">Επιστροφή στον Πελάτη</a>";
?>    
    <!--<p><h2><a href="par_tim.php">Επιστροφή σε Παραλαβές και τιμολόγια πελατών</a> -->
</div>
</body>
<?php include("footer.html");?>
</html>
    
    