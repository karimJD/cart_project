<?php 
include 'dbconnect.class.php';
class cart {
	private $cnx;

	public function __construct()
	{
		$db = new dbconnect();
		$con = $db->connect();
		$this->cnx = $con;
	}

	public function addCart($cid,$pid,$qty,$status) {
		$req = $this->cnx->prepare("INSERT INTO cart (cid,pid,qty,status) VALUES (:cid , :pid , :qty ,:status) ");
		$req->bindParam(':cid',$cid);
		$req->bindParam(':pid',$pid);
		$req->bindParam(':qty',$qty);
		$req->bindParam(':status',$status);
		$req->execute();

	}
	public function removeCart($id) {
		$req = $this->cnx->prepare("DELETE FROM cart WHERE id =:id");
		$req->bindParam(':id',$id);
		$req->execute();
	}
	public function updateCart($id,$cid,$pid,$qty,$status) {

		$req = $this->cnx->prepare("UPDATE cart set cid=:cid , pid=:pid , qty=:qty , status=:status WHERE id=:id");
		$req->bindParam(':cid',$cid);
		$req->bindParam(':pid',$pid);
		$req->bindParam(':qty',$qty);
		$req->bindParam(':status',$status);
		$req->bindParam(':id',$id);
		$req->execute();
	}
	public function loadOneCart($id) {
		$req = $this->cnx->prepare("SELECT * FROM cart join produit on cart.pid = produit.pid join client ON cart.cid = client.cid WHERE id=:id");
		$req->bindParam(':id',$id);
		$req->execute();
		return $req;
	}
	public function loadAllCart() {
		$req = $this->cnx->prepare("SELECT * FROM cart join produit on cart.pid = produit.pid join client ON cart.cid = client.cid ");
		$req->execute();
		return $req;
	}

	public function loadClientCart($cid) {
		$req = $this->cnx->prepare("SELECT * FROM cart join produit on cart.pid = produit.pid join client ON cart.cid = client.cid WHERE cid=:cid");
		$req->bindParam(':cid',$cid);
		$req->execute();
		return $req;
	}
}

 ?>