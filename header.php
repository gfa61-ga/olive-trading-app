<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <!-- <title>Sticky Footer Navbar Template for Bootstrap</title>  -->

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
<!--
body {
    background-color: #B2B588; /* #E0E1CF; #E5E5E5; #B2B588; #BAB86C;*/
}
td {padding: 2px}
-->
</style>




  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ετος: <?php echo $_COOKIE["cur_year"]; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="elies.php">Αρχική Σελίδα</a></li>

<?php
 if ($un_temp!="tsak")
{
echo  <<<_END
 

<li><a href="katigories.php">Κατηγορίες</a></li>
<li><a href="pelates.php">Πελάτες</a></li>
<li><a href="par_tim.php">Παραλαβές/Τιμολόγια</a></li>

_END;

}
?>


           

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Εκτυπώσεις <span class="caret"></span></a>
              <ul class="dropdown-menu">

                <li class="dropdown-header">Τιμολογια</li>
                <li><a href="timologiaanaimera.php">ανά ημερομηνία</a></li>
                <li><a href="timologiaanapelati.php">ανα πελάτη</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Παραλαβές</li>
                <li><a href="sinolaparalabwn.php">ανα κατηγορία ελιάς</a></li>
                <li><a href="sinolapreliwn.php">πρασινων ελιών ανα πελάτη</a></li>
                <li role="separator" class="divider"></li>
              </ul>
            </li>  
            <li><a href="allagietous.php">Αλλαγή έτους</a></li>        
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    <!-- Begin page content -->
    <div class="container">
      <br><br>
    <!-- <br><br><br><br><br> -->


