<main>
 <div class="container">

  <div class="row">
  <img src="public/img/slogan.png" class="slogan col-md-offset-2 img-responsive" alt="le slogan du site">
  
  <hr>
  <div class="formulaire">
   <form action="connexion" method="POST">
       <table class="col-md-offset-1">
         <tr>
          <td><label for="email">E-mail</label></td>
          <td><input type="email" id="email" name="email" placeholder="exemple@exemple.ex" required class="form-group form-control"></td>
        </tr>
        <tr>
          <td><label for="pwd">Password</label></td>
          <td><input type="password" id="mdp" name="pwd" required class="form-group form-control"></td>
        </tr>
       </table>
      <button type="submit" class="btnConnect btn btn-success btn-sm">Login <i class="fa fa-sign-in" aria-hidden="true"></i></button>
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
  <a href="<?php echo WEBROOT; ?>"><button class="btn btn-success col-md-1 col-md-push-10 back">Back <i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>

 </div>
</main>
