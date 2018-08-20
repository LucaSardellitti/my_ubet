<?php

class AdminModel extends Model{
	protected $table = 'user';

	public function SearchId($email){
		$srcId = "SELECT id FROM ".$this->table." WHERE email = '".$email."'";
		$resSrcId = self::$_pdo->prepare($srcId);
		$resSrcId->execute();
		return $resSrcId->fetchAll(PDO::FETCH_OBJ);
	}

	public function connexionAdmin($email, $mdp_hache){
		$sql = "SELECT * FROM ".$this->table." WHERE email = '".$email."' AND pwd = '".$mdp_hache."' AND statut = 1";
		$req = self::$_pdo->prepare($sql);
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function searchEvents($nameEvent){
		$sql = "SELECT name_event FROM events WHERE name_event = '".$nameEvent."'";
		$req = self::$_pdo->prepare($sql);
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function addEvents($nameEvent, $nameTeamsDom, $nameTeamsExt, $coteDom, $coteNull, $coteExt, $dateEndEvent){
		$sql = "INSERT INTO events(name_event, teamDom, teamExt, coteDom, coteNull, coteExt, date_end_event) VALUES ('".$nameEvent."', '".$nameTeamsDom."', '".$nameTeamsExt."', '".$coteDom."', '".$coteNull."', '".$coteExt."', '".$dateEndEvent."')";
		$req = self::$_pdo->prepare($sql);
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function displayEvents(){
		$sql = "SELECT * FROM events";
		$req = self::$_pdo->prepare($sql);
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
}



?>