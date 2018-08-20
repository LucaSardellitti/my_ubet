<?php

class AdminController extends Controller{
	protected $modelAdmin;

	public function __construct(){
		parent::__construct();
		$this->modelAdmin = $this->loadModel('admin');
	}

	public function logoRedirection(){
		$scope['myEvents'] = $this->modelAdmin->displayEvents();
		$this->render('account', 'admin', $scope);
	}

	public function redirection(){
		$this->render('connexion');
	}

	public function connexionAdmin(){
		$data = $this->request;
		extract($data);

		$email = addslashes(htmlspecialchars($email));
		$pwd = addslashes(htmlspecialchars($pwd));
		$mdp_hache = sha1($pwd);

		if (!empty($email) && !empty($pwd)) {
			$check = true;

			$srcPerson = $this->modelAdmin->connexionAdmin($email, $mdp_hache);
			if (count($srcPerson) == 0) {
				$check = false;
				$scope = [];
				$this->render('connexion', 'default', $scope);
				echo "<div class='errorMsgConnect'>Mauvais identifiant ou mauvais mot de passe. Réssayer</div>";
			}

			if ($check) {
				$id = $this->modelAdmin->SearchId($email);
				session_start();
				$_SESSION['id'] = $id;
				$scope['myEvents'] = $this->modelAdmin->displayEvents();
				$this->render('account', 'admin', $scope);
			}
		}
		else{
			$scope = [];
			$this->render('connexion', 'default', $scope);
			echo "<div class='errorMsgConnect'>Mauvais identifiant ou mauvais mot de passe. Réssayer</div>";
		}
	}

	public function deconnexionAdmin(){
		session_start();
		session_destroy();
		header("Location:".WEBROOT);
	}

	public function addEvents(){
		$mesPosts = $this->request;
		extract($mesPosts);

		$nameEvent = addslashes(htmlspecialchars($nameEvent));
		$nameTeamsDom = addslashes(htmlspecialchars($nameTeamsDom));
		$nameTeamsExt = addslashes(htmlspecialchars($nameTeamsExt));
		$coteDom = addslashes(htmlspecialchars($coteDom));
		$coteNull = addslashes(htmlspecialchars($coteNull));
		$coteExt = addslashes(htmlspecialchars($coteExt));
		$dateM = addslashes(htmlspecialchars($months));
		$dateY = addslashes(htmlspecialchars($years));
		$dateD = addslashes(htmlspecialchars($days));

		if (!empty($nameEvent) && !empty($nameTeamsDom) && !empty($nameTeamsExt) && !empty($coteDom) && !empty($coteNull) && !empty($coteExt)) {
			
			$check = true;
			$errorMessage = "";
			$srcEvents = $this->modelAdmin->searchEvents($nameEvent);

			if (count($srcEvents)  != 0) {
				$check = false;
				$errorMessage = "Cet évènement existe déja";
			}
			if (strlen($nameEvent) < 2) {
				$check = false;
				$errorMessage = "Nom de l'évènement trop court";
			}
			if (strlen($nameTeamsDom) < 2) {
				$check = false;
				$errorMessage = "Nom de l'équipe à domicile trop court";
			}
			if (strlen($nameTeamsExt) < 2) {
				$check = false;
				$errorMessage = "Nom de l'équipe à l'exterieur trop court";
			}
			if (!is_numeric($coteDom) || !is_numeric($coteNull) || !is_numeric($coteExt)) {
				$check = false;
				$errorMessage = "Vous n'avez pas rentré de cotes";
			}

			if ($check == false) {
				$scope['myEvents'] = $this->modelAdmin->displayEvents();
				$this->render('account', 'admin', $scope);
				echo "<div class='errorMsgAddEvents'>".$errorMessage."</div>";
			}
			if ($check) {
				$dateEndEvent = $dateY.'-'.$dateM.'-'.$dateD;
				$this->modelAdmin->addEvents($nameEvent, $nameTeamsDom, $nameTeamsExt, $coteDom, $coteNull, $coteExt, $dateEndEvent);
				$scope['myEvents'] = $this->modelAdmin->displayEvents();
				$this->render('account', 'admin', $scope);
			}
		}
		else{
			$scope['myEvents'] = $this->modelAdmin->displayEvents();
			$this->render('account', 'admin', $scope);
			echo "<div class='errorMsgAddEvents'>Vous n'avez pas remplis tout les champs</div>";
		}
	}

	public function displayEvents(){
		$scope['myEvents'] = $this->modelAdmin->displayEvents();
		$this->render('account', 'admin', $scope);
	}
}


?>