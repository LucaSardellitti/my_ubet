<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="public/css/styleUser.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>B.E.T</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="public/js/script.js" ></script>
  <link REL="SHORTCUT ICON" href="public/img/logo.png">
</head>
<body>
  <header>
    <div class="messagePrevention">
      <p>JOUER COMPORTE DES RISQUES : ENDETTEMENT, ISOLEMENT, DEPENDENCE.<br/>
      POUR ETRE AIDER, APPELEZ LE 09-74-75-13-13<span>(APPEL NON SURTAXE)</span></p>
    </div>
    <nav>
         <img src="public/img/logo.png" class="col-md-offset-2" alt="Logo Ubet">
      <a href="deconnexion" class="col-md-offset-8">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </nav>
  </header>
	<?php 
		echo $content_for_layout;
	?>
  <footer class="col-md-12">
    <img src="public/img/sponsors.png" alt="les sponsors" class="sponsorsUser img-responsive col-md-6 col-md-offset-3">
  </footer>
</body>
</html>