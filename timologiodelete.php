<?php // 
  require_once 'checklogin.php';
?>
<?php include("header.php");?>
<html>
    <title> Διαγραφή τιμολογίου </title>

<?php
     
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
      mysql_set_charset('utf8', $db);
      
    $id_timologiou = $id9;               
    
    $result7=mysql_query("select * from pelates where id_pelati=$id");
    $myrow7 = mysql_fetch_array($result7);

    echo "<h1 align=center><u>Διαγραφή τιμολογίου:</u></h1><br>"."";
    echo "<p align=center>Επώνυμο:".$myrow7["eponimo"]."<br>";
    echo "Ονομα:".$myrow7["onoma"]."<br>";
    echo "ΑΦΜ:".$myrow7["afm"]."<br>";
  
    $result11=mysql_query("select * from timologia where id_timologiou=$id_timologiou"); 
    $myrow11 = mysql_fetch_array($result11);
  
  echo "Ημερομηνία τιμολογίου:".grDate($myrow11["imerominia"])."<br>";
  echo "Αριθμός τιμολογίου:".$myrow11["aa_tim"]."<br>";
    
    $result1=mysql_query("select * from anal_timol where id_timologiou=$id_timologiou order by id_paralabis asc");     
    
    while ($myrow1 = mysql_fetch_array($result1))    //για κάθε παραλαβή που περιλαμβάνει το τιμολογιο
    {
        $id_temp=$myrow1["id_paralabis"];
        $sql9="update paralabes set eksoflithike='No' where id_paralabis=$id_temp";
        $result9=mysql_query($sql9);   //ενημέρωση παραγγελίας οτι δεν περιλαμβάνεται σε τιμολογιο
  
          
          $sql13="delete from anal_timol where id_paralabis=$id_temp";
          $result13=mysql_query($sql13);  // διαγραφή παραλαγής απο ανάλυση τιμολογίου
//          echo mysql_errno().": ".mysql_error($db);

    }
        $sql14="delete from timologia where id_timologiou=$id_timologiou";
        $result14=mysql_query($sql14);   //διαγραφη του τιμολογίου
//        echo mysql_errno().": ".mysql_error($db);

    echo "<br><br><br>Το ανωτέρω τιμολόγιο ΔΙΑΓΡΑΦΗΚΕ<br><br><br>";
       
    echo "<h2 align=center><p><a href=\"timologiashow.php?id=$id\">Επιστροφή στα τιμολογια του πελάτη</a>";
    
    ?>
    <!--<h2 align="center"><a href="par_tim.php">Επιστροφή στις παραλαβές και τιλομογια πελατών</a></h2> -->
</body>   
<?php include("footer.html");?>
</html>



