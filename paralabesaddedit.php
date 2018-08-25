<?php // 
  require_once 'checklogin.php';
?>
<?php include("header.php");?>
<html>
    <title> Εισαγωγή / Επεξεργασία Παραλαβών </title>

<div align=center>
<?php
    if ($submit)
{
   
    $dateUF=strtotime($date);
    $date1=date("Y-m-d", $dateUF);
    if ($date1=="1970-01-01") $date1="0000-00-00";
      
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
       
    $sql_1="insert into paralabes (imerominia, id_pelati, eksoflithike)
       values ('$date1','$id','No')";
    
//for ($test=1;$test<2000;$test++)
//{
//echo "_"+$test;
    $result=mysql_query($sql_1);   
//    echo mysql_errno().": ".mysql_error($db);
    
    $id_paralabis = mysql_insert_id($db);
 
   $result1=mysql_query("select * from katigories order by perigrafi asc");               
    
    while ($myrow = mysql_fetch_array($result1))    //για κάθε κατηγορία ελιών
    {
        $name="kat".$myrow["id_katigorias"];
        $temp_poso=$$name;
        if ($temp_poso==0) continue;
        $id_katigorias=$myrow["id_katigorias"];
//        echo $id_paralabis, $id_katigorias, $temp_poso;
        $sql="insert into anal_paral (id_paralabis, id_katigorias, posotita)
            values ('$id_paralabis','$id_katigorias','$temp_poso')";
        $result=mysql_query($sql);
//            echo mysql_errno().": ".mysql_error($db);
    }
//}    
    $sql3="select * from pelates where id_pelati=$id"; //στοιχεία πελάτη
    $result3=mysql_query($sql3,$db);
    $myrow3 = mysql_fetch_array($result3);
   
    echo "<h1>Η προσθήκη της παραλαβής ολοκληρώθηκε.\n";
    echo "<p><h2><a href=\"paralabesshow.php?id=$id\">Επιστροφή στις παραλαβές του πελάτη</a>";
    
    ?>
    <!--<p><a href="par_tim.php">Επιστροφή στις παραλαβές και τιλομογια πελατών</a> -->
    
    <?php
}
else if ($update)
{
    $dateUF=strtotime($date);
    $date1=date("Y-m-d", $dateUF);
    if ($date1=="1970-01-01") $date1="0000-00-00";
      
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
          mysql_set_charset('utf8', $db);
    $sql="update paralabes set imerominia='$date1' where id_paralabis=$id9";
       
    $result=mysql_query($sql);   
//    echo mysql_errno().": ".mysql_error($db);
    
    $id_paralabis = $id9;

    $sql_paral="select * from katigories left join anal_paral on katigories.id_katigorias=anal_paral.id_katigorias and anal_paral.id_paralabis=$id9 order by katigories.perigrafi asc"; //αναλυση παραλαβής
    $result1=mysql_query($sql_paral);
        
//    $result1=mysql_query("select * from katigories order by id_katigorias asc");               
    
    while ($myrow = mysql_fetch_array($result1))    //για κάθε κατηγορία ελιών
    {
        $name="kat".$myrow[0]; // $myrow[0] είναι η id_katigorias
        $temp_poso=$$name;
 //       echo "pos:" .$myrow["posotita"] . "  temppos:" . $temp_poso . "<br>";

        if ($temp_poso==0 and is_null($myrow["posotita"])) continue;
            $id_katigorias=$myrow[0]; // $myrow[0] είναι η id_katigorias
//          echo $id_paralabis, $id_katigorias, $temp_poso;

        if (is_null($myrow["posotita"])) {
            $sql="insert into anal_paral (id_paralabis, id_katigorias, posotita)
            values ('$id_paralabis','$id_katigorias','$temp_poso')";
            $result=mysql_query($sql);
 //           echo "******************";
//         echo mysql_errno().": ".mysql_error($db);

        } else 
        {
            $sql="update anal_paral set posotita='$temp_poso' where id_paralabis=$id_paralabis and id_katigorias=$id_katigorias";
            $result=mysql_query($sql);
//          echo mysql_errno().": ".mysql_error($db);
        }
    }
    
    $sql3="select * from pelates where id_pelati=$id"; //στοιχεία πελάτη
    $result3=mysql_query($sql3,$db);
    $myrow3 = mysql_fetch_array($result3);
    
    echo "<h1>Οι αλλαγές καταχωρήθηκαν.\n";
    echo "<h2><p><a href=\"paralabesshow.php?id=$id\">Επιστροφή στις παραλαβές του πελάτη</a>";
    
    ?>
    <!--<p><a href="par_tim.php">Επιστροφή στις παραλαβές και τιλομογια πελατών</a> -->
    
    <?php
}
else if ($id9)  // επεξεργασία παραλαβής $id9 του πελάτη $id
{
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
      mysql_set_charset('utf8', $db);
    $sql3="select * from pelates where id_pelati=$id"; //στοιχεία πελάτη
    $result3=mysql_query($sql3,$db);
    $myrow3 = mysql_fetch_array($result3);
    echo "<h1><u>Επεξεργασία Παραλαβής από πελάτη:</u></h1><br><h4> ".$myrow3["eponimo"].", ".$myrow3["onoma"].", ΑΦΜ:".$myrow3["afm"]."<br><br>";
      
    $sql4="select * from paralabes where id_paralabis=$id9";
    $result4=mysql_query($sql4,$db);
    $myrow4 = mysql_fetch_array($result4);
    


if ($myrow4["imerominia"]=="0000-00-00") 
$date1=grDate(""); 
else 
$date1=grDate($myrow4["imerominia"]);


  //echo ($date1);
 // echo ($myrow4["imerominia"]);
    ?>        
    
    <form method="post" accept-charset="utf-8" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input type="hidden" name="id9" value="<?php echo $id9?>">
                                                                                
    Ημερομηνία παραλαβής:<input type="text" name="date" size="13" value="<?php echo $date1?>" style='text-align:center'><br>
    <?php
//    $db=mysql_connect("mysql16.000webhost.com", "a1989697_gfa", "webhost!!!");
//    mysql_select_db("a1989697_gfa",$db);
    
    $sql_paral="select * from katigories left join anal_paral on katigories.id_katigorias=anal_paral.id_katigorias and anal_paral.id_paralabis=$id9 order by katigories.perigrafi asc"; //αναλυση παραλαβής
    $result5=mysql_query($sql_paral);
 
//    $result5=mysql_query("select * from anal_paral where id_paralabis=$id9 order by id_katigorias asc");               
    
    while ($myrow5 = mysql_fetch_array($result5))    //για κάθε κατηγορία ελιών της παραγγελίας $id9
    {
        $temp_kat=$myrow5["id_katigorias"];
        $temp_name="kat".$myrow5[0];  // $myrow[0] είναι η id_katigorias
        $temp_posot=$myrow5["posotita"];
        
     //   $sql6="select * from katigories where id_katigorias=$temp_kat";
     //   $result6=mysql_query($sql6);  
     //   $myrow6 = mysql_fetch_array($result6);
        
        echo $myrow5["perigrafi"].":<input type=number step=0.01 name=".$temp_name." style='text-align:right' value=".$temp_posot."><br>";
    }
    ?>
    <br>
    <input type="submit" name="update" value="Καταχώρηση των Αλλαγών"></form>
    <?php
    echo "<p><h2><a href=\"paralabesshow.php?id=$id\">Επιστροφή στις παραλαβές του πελάτη</a>";
}
else   // εισαγωγή νέας παραλαβής
{
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
      mysql_set_charset('utf8', $db);
    $sql3="select * from pelates where id_pelati=$id"; //στοιχεία πελάτη
    $result3=mysql_query($sql3,$db);
    $myrow3 = mysql_fetch_array($result3);
    echo "<h1><u>Εισαγωγή Νέας Παραλαβής από πελάτη:</u></h1><br><h4> ".$myrow3["eponimo"].", ".$myrow3["onoma"].", ΑΦΜ:".$myrow3["afm"]."<br><br>";
    
    ?>                                
    <form method="post" accept-charset="utf-8" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="hidden" name="id" value="<?php echo $id?>">
    Ημερομηνία παραλαβής:<input type="date" style='text-align:center' size="13" name="date"><br>
    <?php
//    $db=mysql_connect("mysql16.000webhost.com", "a1989697_gfa", "webhost!!!");
//    mysql_select_db("a1989697_gfa",$db);
    $result=mysql_query("select * from katigories order by perigrafi asc");               
      
    while ($myrow = mysql_fetch_array($result))    //για κάθε κατηγορία ελιών
    {
        $temp_name="kat".$myrow["id_katigorias"];
        echo $myrow["perigrafi"].":<input style='text-align:right' type=number step=0.01 name=".$temp_name."><br>";
    }
    ?>
    <br>
    <input type="submit" name="submit" value="Καταχώρηση της νέας περαλαβής"></form>
    <?php
    echo "<p><h2><a href=\"paralabesshow.php?id=$id\">Επιστροφή στις παραλαβές του πελάτη</a>";
}
?>
</div>
</body>
<?php include("footer.html");?>
</html>
