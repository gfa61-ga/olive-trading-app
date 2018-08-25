<?php // 
  require_once 'checklogin.php';
?>
<?php include("header.php");?>
<html>
    <title> Εισαγωγή / Επεξεργασία κατηγοριας Ελιών </title>
<body bgcolor=#88FBCA>

<?php
if ($submit)
{
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
    mysql_set_charset('utf8', $db);
       
    $sql="insert into katigories (perigrafi, timi)
       values ('$perigrafi','$timi')";
    $result=mysql_query($sql);
    //echo mysql_errno().": ".mysql_error($db);
    echo "<div align=center> <h1>Η προσθήκη κατηγορίας ολοκληρώθηκε.</h1>\n";
    ?>
    
    <p><a href="katigories.php">Επιστροφή στις κατηγορίες</a>
    
    <?php
    
}
else if ($update)
{
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
    mysql_set_charset('utf8', $db);
        
    $sql= "update katigories set perigrafi='$perigrafi',timi='$timi' where id_katigorias=$id";
    $result=mysql_query($sql);
    //echo mysql_errno().": ".mysql_error($db);
    echo "<div align=center> <h1>Οι αλλαγές καταχωρήθηκαν.</h1>\n";
    ?>
    
    <p><h2><a href="katigories.php">Επιστροφή στις κατηγορίες</a>
    
    <?php
}
else if ($id)
{
    $db=mysql_connect($db_hostname, $db_username, $db_password );
    mysql_select_db($db_database, $db);
        mysql_set_charset('utf8', $db);

    $result=mysql_query("select * from katigories where id_katigorias=$id",$db);               
    $myrow=mysql_fetch_array($result);
    ?>
    <h1 align=center> <u>Επεξεργασία κατηγοριας Ελιών</u></h1><div align=center> 
<br>
    <form method="post" accept-charset="utf-8" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input type="hidden" name="id" value="<?php echo $myrow["id_katigorias"]?>">
    Περιγραφή Ελιάς:<input type="Text" name="perigrafi" size="24" value="<?php echo $myrow["perigrafi"]?>"><br>
    Τιμή ανα κιλό:<input type="number" step="0.01" name="timi" value="<?php echo $myrow["timi"]?>"><br>
    <br>
    <input type="Submit" name="update" value="Καταχώρηση αλλαγών"></form>
    <p><h2><a href="katigories.php">Επιστροφή στις κατηγορίες</a>
    <?php
}
else
{
    ?>
    <h1 align=center> <u>Εισαγωγή κατηγοριας Ελιών</u></h1><div align=center> 
<br>
    <form method="post" accept-charset="utf-8" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Περιγραφή Ελιάς:<input type="Text" size="24" name="perigrafi"><br>
    Τιμή ανα κιλό:<input type="number" step="0.01" name="timi"><br>   
   <br>
   <input type="submit" name="submit" value="Καταχώρηση της νέας κατηγορίας"></form>
   <p><h2><a href="katigories.php">Επιστροφή στις κατηγορίες</a>
    <?php
}
?>
</div>
</body>
<?php include("footer.html");?>
</html>