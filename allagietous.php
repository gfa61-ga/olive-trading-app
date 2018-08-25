<?php // 
  require_once 'checklogin.php';
?>

<?php include("header.php");?>


<html>
    <title> Αλλαγή έτους </title>


<?php

if ($newyear)
{
   if ($newyear >=2015 && $newyear <=2025) {
    setcookie("cur_year",'',0,"/");
    setcookie ( "cur_year",  $newyear);
    echo "Το έτος αλλαξε σε: ".$newyear;
   /* sleep(10);*/
    header( 'Location: elies.php' );
   } else
   {
     echo "Δεν εχει ανοίξει χρήση για το έτος: ".$newyear;
   }



}
else
{
    ?>
    
    <b><u> <h1 align=center>Επιλογή έτους</h1></u></b>
    <div align="center"><br>
        
    </div>
    <form method="post" accept-charset="utf-8" action="<?php $PHP_SELF ?>">
    <div align="center">
      <table border="2" cellpacing="2">
      <tr><td>Γράψτε το έτος <br>που επιλέγετε:</td>
      <tr>
          <td><input type="text" align=center name="newyear" size="10" value=<?php echo $_COOKIE["cur_year"]; ?>></td>
      </tr>
      </table>
    </div>
    <br>
    <p align="center"> <input type="submit" value="Αλλαγή έτους" name="B1"></p>
    </form>
    
    <?php
}
    ?>
    
    <!--
    <p><h2 align=center><a href="elies.php">Επιστροφή στην Αρχική Σελίδα  </a></h2>
    -->
</body>
<?php include("footer.html");?>
</html>

