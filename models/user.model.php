<?php
class UserModel extends Model{
	protected $table = 'user';

	public function get($id){
		$sql = "SELECT * FROM ".$this->table." WHERE id=:id";
		$query = self::$_pdo->prepare($sql);
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}

	public function all(){
		$sql = "SELECT * FROM ".$this->table." WHERE 1";
		$query = self::$_pdo->prepare($sql);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function SearchEmail($email){
		$srcEmail = "SELECT email FROM ".$this->table." WHERE email = '".$email."'";
		$resSrcEmail = self::$_pdo->prepare($srcEmail);
		$resSrcEmail->execute();
		return $resSrcEmail->fetchAll(PDO::FETCH_OBJ);
	}

	public function SearchId($email){
		$srcId = "SELECT id FROM ".$this->table." WHERE email = '".$email."'";
		$resSrcId = self::$_pdo->prepare($srcId);
		$resSrcId->execute();
		return $resSrcId->fetchAll(PDO::FETCH_OBJ);
	}

	public function inscription($email, $pseudo, $mdp_hache){
		$sql = "INSERT INTO ".$this->table."(login, pwd, email, date_inscription, statut, tokens, gains) VALUES ('".$pseudo."', '".$mdp_hache."', '".$email."', NOW(), 0, 100, 0)";
		$req = self::$_pdo->prepare($sql);
		$req->execute();
  return $req->fetchAll(PDO::FETCH_OBJ);
 }

 public function connexion($email, $mdp_hache){
  $sql = "SELECT * FROM ".$this->table." WHERE email = '".$email."' AND pwd = '".$mdp_hache."' AND statut = 0";
  $req = self::$_pdo->prepare($sql);
  $req->execute();
  return $req->fetchAll(PDO::FETCH_OBJ);
 }

 public function infoUser($email){
  $sql = "SELECT * FROM ".$this->table." WHERE email = '".$email."'";
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

 public function checkTokens($email){
  $sql = "SELECT tokens FROM ".$this->table." WHERE email = '".$email."'";
  $req = self::$_pdo->prepare($sql);
  $req->execute();
  foreach ($req as $result) {
   $myTokens = $result['tokens'];
  }
  return $myTokens;
 }

 public function buyTokens($email, $nbrTokens){
  $query = "SELECT * FROM ".$this->table." WHERE email = '".$email."'";
  $res = self::$_pdo->prepare($query);
  $res->execute();
  foreach ($res as $result) {
   $currentTokens = $result['tokens'] ;
  }

  $newTokens = $currentTokens + $nbrTokens;

  $sql = "UPDATE ".$this->table." SET tokens = ".$newTokens." WHERE email = '".$email."'";
  $req = self::$_pdo->prepare($sql);
  $req->execute();
  return $req->fetchAll(PDO::FETCH_OBJ);
 }

 public function betTokens($email, $betTokens){
  $query = "SELECT * FROM ".$this->table." WHERE email = '".$email."'";
  $res = self::$_pdo->prepare($query);
  $res->execute();
  foreach ($res as $result) {
   $currentTokens = $result['tokens'] ;
  }

  $newTokens = $currentTokens - $betTokens;

  $sql = "UPDATE ".$this->table." SET tokens = ".$newTokens." WHERE email = '".$email."'";
  $req = self::$_pdo->prepare($sql);
  $req->execute();
  return $req->fetchAll(PDO::FETCH_OBJ);
 }

 public function sellTokens($email, $sellTokens){
  $query = "SELECT * FROM ".$this->table." WHERE email = '".$email."'";
  $res = self::$_pdo->prepare($query);
  $res->execute();
  foreach ($res as $result) {
   $currentTokens = $result['tokens'] ;
   $currentMoney = $result['gains'];
  }
  $newTokens = $currentTokens - $sellTokens;
  $newMoney = $currentMoney + ($sellTokens * 0.9);

  $sql = "UPDATE ".$this->table." SET tokens = ".$newTokens.",  gains = ".$newMoney." WHERE email = '".$email."'";
  $req = self::$_pdo->prepare($sql);
  $req->execute();
  return $req->fetchAll(PDO::FETCH_OBJ);
 }

}