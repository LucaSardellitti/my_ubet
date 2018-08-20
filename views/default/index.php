<main>
 <div class="container">

  <div class="row">
  <img src="public/img/slogan.png" class="slogan col-md-offset-2" alt="le slogan du site">
  <a href="admin/redirection"><button class="admin btn btn-success col-md-offset-5">Admin ? <i class="fa fa-user" aria-hidden="true"></i></button></a>
  <button data-toggle="modal" href="#connexion" data-backdrop="static" class="connect btn btn-success">Already registered ? <i class="fa fa-sign-in" aria-hidden="true"></i></button>
	<div class="modal fade" id="connexion">
	 <div class="modal-dialog">
	  <div class="modal-content">
	   <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal">x</button>
	    <h1 class="col-md-8">Login</h1>
	    <img src="public/img/slogan.png" class="sloganConnect" alt="le slogan du site">
	   </div>
	   <div class="modal-body">
	    <form action="user/connexion" method="POST">
		   <table>
		   	 <tr>
	  			<td><label for="email2">E-mail</label></td>
	  			<td><input type="email" id="email2" name="email" placeholder="exemple@exemple.ex" required class="form-group form-control"></td>
	  		</tr>
		   	<tr>
	  			<td><label for="pwd">Password</label></td>
	  			<td><input type="password" id="mdp" name="pwd" required class="form-group form-control"></td>
	  		</tr>
		   </table>
			<button type="submit" class="btnConnect btn btn-success btn-sm">Login <i class="fa fa-sign-in" aria-hidden="true"></i></button>
		</form>
	   </div>
	   <div class="modal-footer">
	    <button class="btn btn-success" data-dismiss="modal">Close</button>
	   </div>
	  </div>
	 </div>
	</div>
	<script
  	src="https://code.jquery.com/jquery-3.2.1.min.js"
  	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  	crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
  <hr>
	<div class="formulaire">
	  <form action="user/inscription" method="POST">
	  	<table class="col-md-offset-1">
	  		<tr>
	  			<td><label for="email">E-mail*</label></td>
	  			<td><input type="email" id="email" name="email" placeholder="exemple@exemple.ex" required class="form-group form-control" onblur="javascript:checkEmail(this)"></td>
	  		</tr>
	  		<tr>
	  			<td><label for="pseudo">Pseudo*</label></td>
	  			<td><input type="text" id="pseudo" name="pseudo" placeholder="Exemple" minlength="2" required class="form-group form-control" onblur="javascript:checkPseudo(this)"></td>
	  		</tr>
	  		<tr>
	  			<td><label for="pwd">Password*</label></td>
	  			<td><input type="password" id="pwd" name="pwd" required minlength="4" class="form-group form-control" onblur="javascript:checkPwd(this)"></td>
	  		</tr>
	  		<tr>
	  			<td><label for="confirmPwd">Confirmation*</label></td>
	  			<td><input type="password" id="confirmPwd" name="confirmPwd" required minlength="4" class="form-group form-control" onblur="javascript:checkPwd(this)"></td>
	  		</tr>
	  		<!-- <tr>
	  			<td><label for="birth">Date de naissance*</label></td>
	  			<td><input type="text" id="birth" name="birth" placeholder="JJ/MM/AAAA" required class="form-group form-control"></td>
	  		</tr> -->
	  	</table>
	  	<button type="submit" class="btn btn-sm btn-success col-md-offset-9">Login ! <i class="fa fa-user-plus" aria-hidden="true"></i></button>
	  </form>
	</div>
  </div>

  <div class="row">
    <div class="col-md-offset-3 col-md-6 prevention">
	    <p>* Champs obligatoires<br/>
		Ces informations sont nécessaires à La Française des jeux pour l’ouverture de votre compte FDJ®. En conséquence, l’ouverture du compte FDJ® emporte renonciation à l’exercice du droit d’opposition prévu à l’article 38 de la loi Informatique et Libertés n°78-17 du 6 janvier 1978 modifiée. La saisie du numéro de téléphone fixe ou mobile est facultative, si toutefois vous renseignez ces champs, ces numéros pourront être utilisés pour vous adresser des messages liés à la gestion de votre compte ou, si vous l’avez explicitement autorisé, des messages à vocation notamment statistique ou commerciale. Les informations renseignées dans le formulaire d’ouverture d’un compte joueur pourront être conservées temporairement afin de permettre la finalisation de votre inscription. Si vous avez choisi de recevoir des offres et actualités de la part de nos partenaires, vos informations personnelles seront transférées aux partenaires de la Française des Jeux. L’ensemble des informations communiquées pourront être transmises à toutes autorités ou organismes compétents. Conformément à cette même loi, vous disposez d'un droit d'accès et de rectification des données vous concernant. Pour l'exercer, remplissez notre formulaire.</p>
    </div>
    <hr>
  </div>

 </div>
</main>