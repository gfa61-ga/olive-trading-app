<?php // 
  require_once 'checklogin.php';
?>
<?php include("header.php");?>
<html>
    <title> Εισαγωγή / Επεξεργασία Πελατών </title>
<body bgcolor=#88FBCA>
<div align=center>
<?php
if ($submit)
{
   
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
          mysql_set_charset('utf8', $db);
    $sql="insert into pelates (eponimo, onoma, diefthinsi, afm, tilefona, traplog, eidtim)
       values ('$eponimo','$onoma','$diefthinsi','$afm','$tilefona', '$traplog', '$eidtim')";
    $result=mysql_query($sql);
    //echo mysql_errno().": ".mysql_error($db);
    echo "<h1>Η προσθήκη πελάτη ολοκληρώθηκε.\n</h1>";
    ?>
    
    <p><h2><a href="pelates.php">Επιστροφή στους πελάτες</a>
    
    <?php
    
}
else if ($update)
{
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
        
    $sql= "update pelates set eponimo='$eponimo',onoma='$onoma',diefthinsi='$diefthinsi',afm='$afm',tilefona='$tilefona', traplog='$traplog' , eidtim='$eidtim' where id_pelati=$id";
    $result=mysql_query($sql);
    //echo mysql_errno().": ".mysql_error($db);
    echo "<h1>Οι αλλαγές καταχωρήθηκαν.\n</h1>";
    ?>
    
    <p><h2><a href="pelates.php">Επιστροφή στους πελάτες</a>
    
    <?php
}
else if ($id)
{
    ?>
    <h1><u> Επεξεργασία στοιχείων πελάτη </u></h1> <br>
    <?php
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);
    $result=mysql_query("select * from pelates where id_pelati=$id",$db);               
    $myrow=mysql_fetch_array($result);
    ?>
    
    <form method="post" accept-charset="utf-8" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="hidden" name="id" value="<?php echo $myrow["id_pelati"]?>">
    <pre style="font-size:20px; background-color:#C1C39E">
                                Επώνυμο:<input type="Text" name="eponimo" size="35" value="<?php echo $myrow["eponimo"]?>"><br>
                                  Ονομα:<input type="Text" name="onoma" size="35" value="<?php echo $myrow["onoma"]?>"><br>
                              Διέυθυνση:<input type="Text" name="diefthinsi" size="35" value="<?php echo $myrow["diefthinsi"]?>"><br>                                                                                                        
             ΑΦΜ:<input type="Text" name="afm" size="12" value="<?php echo $myrow["afm"]?>"><br>
                               Τηλέφωνα:<input type="Text" name="tilefona" size="35" value="<?php echo $myrow["tilefona"]?>"><br>
            Τραπεζικός Λογαριασμός:<input type="Text" name="traplog" size="30" value="<?php echo $myrow["traplog"]?>"><br>                                                                                                
 Είδος Τιμολογίου (ΑΓΟΡΑΣ/ΠΩΛΗΣΗΣ):<input type="Text" name="eidtim" size="30" value="<?php echo $myrow["eidtim"]?>">
    </pre><br>
    <input type="Submit" name="update" value="Καταχώρηση αλλαγών"></form>
    <p><h2><a href="pelates.php">Επιστροφή στους πελάτες</a>
    <?php
}
else
{
    ?>
    <h1><u> Εισαγωγή νέου πελάτη </u></h1><br>
    <form method="post" accept-charset="utf-8" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <pre style="font-size:20px; background-color:#C1C39E">
                                Επώνυμο:<input type="Text" size="35" name="eponimo"><br>
                                  Ονομα:<input type="Text" size="35" name="onoma"><br>
                              Διεύθυνση:<input type="Text" size="35" name="diefthinsi"><br>
             ΑΦΜ:<input type="Text" size="12" name="afm"><br>
                               Τηλέφωνα:<input type="Text" size="35" name="tilefona"><br>
            Τραπεζικός Λογαριασμός:<input type="Text" size="30" name="traplog"><br>
 Είδος Τιμολογίου (ΑΓΟΡΑΣ/ΠΩΛΗΣΗΣ):<input type="Text" size="30" name="eidtim">
    </pre>
    <br>
    <input type="submit" name="submit" value="Καταχώρηση του νέου πελάτη"></form>
    <p><h2> <a href="pelates.php">Επιστροφή στους πελάτες</a>
    <?php
}
?>
</div>
</body>
<?php include("footer.html");?>
</html>