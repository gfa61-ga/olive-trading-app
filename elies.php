<?php // 
  require_once 'checklogin.php';
?>

<?php include("header.php");?>

    <title> Εφαρμογή πελατών ελαιοτριβείου</title>
<style type="text/css">

#tim   {color:black}
#mitim   {color:red}

<!--
body {
	background-image: url("olives2.jpg");
}
-->
</style>

<h1 class="navbar-brand" align="center"><u>Εφαρμογή πελατών ελαιοτριβείου έτους <?php echo $_COOKIE["cur_year"]; ?> </u></h1>

<?php
  $datenow = new DateTime(); 
  $cur_year_tmp=$datenow->format('Y');
  $cur_month_tmp=$datenow->format('m');
 if (!(((int)$_COOKIE["cur_year"]==(int)$cur_year_tmp and $cur_month_tmp>=6)) and !((int)$_COOKIE["cur_year"]==(int)$cur_year_tmp-1 and $cur_month_tmp<=6))
{
echo  <<<_END
<h2><br><span id=mitim><br> <br>ΠΡΟΣΟΧΗ...!!!<br> <br>
Βρίσκεστε σε έτος διαφορετικό απο το τωρινό...!!!
<br>
</span></h2>
_END;
}
?>
<!--
<?php
/*
 if ($un_temp!="tsak")
{
echo  <<<_END
 

</u></h1>
<p align="center">&nbsp;</p>
<h2 align="center"><a href="katigories.php">Κατηγορίες Ελιών</a>    </h2>
<h2 align="center"><a href="pelates.php">Πελάτες</a></h2>
<h2 align="center"><a href="par_tim.php">Παραλαβές και Τιμολόγια Πελατών</a>

_END;

}
*/
?>


</h2><h2 align="center"><a href="eksiposeis.php">Εκτυπώσεις</a>


</h2>
<h2 align="center"><a href="allagietous.php">Αλλαγή έτους</a></h2>
-->
<?php include("footer.html");?>
</html>