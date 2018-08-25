<?php // 
     require_once 'checklogin.php';
?>


<html>
    <title> Εκτυπώσεις </title>

<h1 align=center> <u>Εκτυπώσεις</u></h1><br>

<body bgcolor=#88FBCA>
<p><h2>
<pre style="font-size:25px">
<div align="center">    <a href="timologiaanaimera.php">1. Εμφάνιση όλων των τιμολογίων ανά ημερομηνία</a>
<p align="center">  <a href="timologiaanapelati.php">2. Εμφάνιση όλων των τιμολογίων ανα πελάτη</a>  
</div>
<p align="center">           <a href="sinolaparalabwn.php">3. Εμφάνιση όλων των παραλαβών ανα κατηγορία ελιάς</a>    
<p align="center"><a href="sinolapreliwn.php">4. Εμφάνιση πρασινων ελιών ανα πελάτη</a>     

</pre>
<?php
 if ($un_temp!="")
   echo "<br><br><p align=center><a href=elies.php>Επιστροφή στην Αρχική Σελίδα</a>";
?>
</body>

</html>