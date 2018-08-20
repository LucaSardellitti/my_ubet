<?php

class UserController extends Controller{
	protected $modelUser;

	public function __construct () {
		parent::__construct();
		$this->modelUser = $this->loadModel('user');
	}

	public function index(){
		$scope['users'] = $this->modelUser->all();
		$this->render('index', 'user' ,$scope);
	}

	public function show($id){
		$scope['user'] = $this->modelUser->get($id);
		$this->render('show', 'user', $scope);
	}

	public function logoRedirection(){
		$scope['myEvents'] = $this->modelUser->displayEvents();
		// $info['infoUser'] = $this->modelUser->infoUser($email);
		$this->render('account', 'user', $scope);
	}

	public function inscription(){
		$data = $this->request;
		extract($data);

		$email = addslashes(htmlspecialchars($email));
		$pseudo = addslashes(htmlspecialchars($pseudo));
		$pwd = addslashes(htmlspecialchars($pwd));
		$confirmPwd = addslashes(htmlspecialchars($confirmPwd));
		$regexEmail = preg_match("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$#", $email);
		$srcEmail = $this->modelUser->SearchEmail($email);

		if (!empty($email) && !empty($pwd) && !empty($pseudo) && !empty($confirmPwd)) {

			$check = true;
			$errorMessage = "";

			if ($email == $regexEmail) {
				$check = false;
				$errorMessage = "Mauvais type d'email";
			}
			if (count($srcEmail) != 0) {
				$check = false;
				$errorMessage = "Email deja utilisé";
			}
			if (strlen($pseudo) < 2) {
				$check = false;
				$errorMessage = "Pseudo trop court";
			}
			if (strlen($pwd) < 4) {
				$check = false;
				$errorMessage = "Mot de passe trop court";
			}
			if (strlen($confirmPwd) < 4) {
				$check = false;
				$errorMessage = "mot de passe trop court";
			}
			if ($pwd != $confirmPwd) {
				$check = false;
				$errorMessage = "Les deux mot de passe ne sont pas identique";
			}

			if ($check == false) {
			$scope = [];
			$this->render('inscription', 'default', $scope);
			echo "<div class='errorMsg'>".$errorMessage."</div>";
			}

			if ($check) {
				$mdp_hache = sha1($confirmPwd);
				$this->modelUser->inscription($email, $pseudo, $mdp_hache);
				// $id = $this->modelUser->SearchId($email);
				$scope['myEvents'] = $this->modelUser->displayEvents();
				$info['infoUser'] = $this->modelUser->infoUser($email);
				session_start();
				// $_SESSION['id'] = $id;
				$this->render('account', 'user', $scope, $info);
				// var_dump($_SESSION['id']);
			}
		}
		else{
			$scope = [];
			$this->render('inscription', 'default', $scope);
			echo "<div class='errorMsg'>Vous n'avez pas remplis tout les champs</div>";
		}
	}

	public function connexion(){
		$data = $this->request;
		extract($data);

		$email = addslashes(htmlspecialchars($email));
		$pwd = addslashes(htmlspecialchars($pwd));
		$mdp_hache = sha1($pwd);

		if (!empty($email) && !empty($pwd)) {
			$check = true;

			$srcPerson = $this->modelUser->connexion($email, $mdp_hache);
			if (count($srcPerson) == 0) {
				$check = false;
				$scope = [];
				$this->render('connexion', 'default', $scope);
				echo "<div class='errorMsgConnect'>Mauvais identifiant ou mauvais mot de passe. Réssayer</div>";
			}

			if ($check) {
				// $id = $this->modelUser->SearchId($email);
				$scope['myEvents'] = $this->modelUser->displayEvents();
				$info['infoUser'] = $this->modelUser->infoUser($email);
				session_start();
				// $_SESSION['id'] = $id;
				$this->render('account', 'user', $scope, $info);
				// var_dump($_SESSION['id']);
			}
		}
		else{
			$scope = [];
			$this->render('connexion', 'default', $scope);
			echo "<div class='errorMsgConnect'>Mauvais identifiant ou mauvais mot de passe. Réssayer</div>";
		}
	}

	public function deconnexion(){
		session_start();
		session_destroy();
		header("Location:".WEBROOT);
	}

	public function infoUser(){
		$data = $this->request;
		extract($data);
		$email = addslashes(htmlspecialchars($email));
		$this->modelUser->infoUser($email);
		$scope['myEvents'] = $this->modelUser->displayEvents();
		$info['infoUser'] = $this->modelUser->infoUser($email);
		$this->render('account', 'user', $scope, $info); 
	}

	public function displayEvents(){
		$scope['myEvents'] = $this->modelUser->displayEvents();
		$this->render('account', 'user', $scope);
	}

	public function buyTokens(){
		require_once('./config.php');
		$email = $_POST['email'];
		$nbrTokens = $_POST['tokens'];
  		$token  = $_POST['stripeToken'];
  		$customer = \Stripe\Customer::create(array(      'email' => 'customer@example.com',      'source'  => $token  ));
  		$charge = \Stripe\Charge::create(array(      'customer' => $customer->id,      'amount'   => $nbrTokens.'00',      'currency' => 'usd'  ));
  		$scope['myEvents'] = $this->modelUser->displayEvents();
  		$this->modelUser->buyTokens($email, $nbrTokens);
  		$info['infoUser'] = $this->modelUser->infoUser($email);
  		$this->render('account', 'user', $scope, $info);
  		echo '<h1 class="successfully">Successfully charged '.$nbrTokens.' tokens!</h1>'; 
	}

	public function betTokens(){
		$email = $_POST['email'];
		$data = $this->request;
		extract($data);
		$betTokens = addslashes(htmlspecialchars($betTokens));
		$currentTokens = $this->modelUser->checkTokens($email);

		if (!empty($betTokens)) {
			$check = true;
			$errorMessage = "";

			if (!is_numeric($betTokens)) {
				$check = false;
				$errorMessage = "Vous n'avez pas rentré de nombre";
			}
			if ($betTokens == 0) {
				$$check = false;
				$errorMessage = "Impossible de miser 0 jeton !";
			}
			if ($betTokens > $currentTokens) {
				$check = false;
				$errorMessage = "Vous n'avez pas assez de jetons";
			}

			if ($check == false) {
				$scope['myEvents'] = $this->modelUser->displayEvents();
				$info['infoUser'] = $this->modelUser->infoUser($email);
				$this->render('account', 'user', $scope, $info);
				echo "<div class='errorMsg'>".$errorMessage."</div>";
			}
			if ($check) {
				$scope['myEvents'] = $this->modelUser->displayEvents();
				$this->modelUser->betTokens($email, $betTokens);
				$info['infoUser'] = $this->modelUser->infoUser($email);
  				$this->render('account', 'user', $scope, $info);
			}
		}
		else{
			$scope['myEvents'] = $this->modelUser->displayEvents();
			// $this->modelUser->betTokens($email, $betTokens);
			$info['infoUser'] = $this->modelUser->infoUser($email);
			$this->render('account', 'user', $scope, $info);
			echo "<div class='errorMsg'>Vous n'avez pas rentré de mise</div>";
		}
	}

	public function sellTokens(){
		$email = $_POST['email'];
		$data = $this->request;
		extract($data);
		$sellTokens = addslashes(htmlspecialchars($sellTokens));
		$currentTokens = $this->modelUser->checkTokens($email);

		if (!empty($sellTokens)) {
			$check = true;
			$errorMessage = "";

			if (!is_numeric($sellTokens)) {
				$check = false;
				$errorMessage = "Vous n'avez pas rentré de nombre";
			}
			if ($sellTokens == 0) {
				$$check = false;
				$errorMessage = "Impossible de vendre 0 jeton !";
			}
			if ($sellTokens > $currentTokens) {
				$check = false;
				$errorMessage = "Impossible de vendre plus de jetons que vous en avez";
			}

			if ($check == false) {
				$scope['myEvents'] = $this->modelUser->displayEvents();
				$info['infoUser'] = $this->modelUser->infoUser($email);
				$this->render('account', 'user', $scope, $info);
				echo "<div class='errorMsg'>".$errorMessage."</div>";
			}
			if ($check) {
				$scope['myEvents'] = $this->modelUser->displayEvents();
				$this->modelUser->sellTokens($email, $sellTokens);
				$info['infoUser'] = $this->modelUser->infoUser($email);
  				$this->render('account', 'user', $scope, $info);
			}
		}
		else{
			$scope['myEvents'] = $this->modelUser->displayEvents();
			// $this->modelUser->betTokens($email, $betTokens);
			$info['infoUser'] = $this->modelUser->infoUser($email);
			$this->render('account', 'user', $scope, $info);
			echo "<div class='errorMsg'>Vous n'avez pas rentré de jetons à vendre</div>";
		}
	}
}