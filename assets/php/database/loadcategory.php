<?php
/**
* 
*/
class LoadCategory extends Dbconn {


	public function list($inicio){

		$delete1 = '<a onclick="delete_category(';
		$delete2 = ')"><i class="fa fa-times" aria-hidden="true"></i></a>';

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT categ_name  as 'categoria',
											   CONCAT('".$delete1."', categ_id, '".$delete2."') as 'delete'
											   FROM ".$tbl." 
											   LIMIT ".$inicio.", 5");
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$success = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$success = $err;
		}

		return $success;

	}

		public function count_list(){

		try{
			$db   = new DbConn;
			$tbl  = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT COUNT(categ_id) AS count
										FROM ".$tbl);
        	$stmt->execute();
			$err  = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$result = $result["count"];
		} else {
			$result = $err;
		}

		return $result;

	}

	public function all(){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT categ_id as 'id',
											   categ_name  as 'categoria'
											   FROM ".$tbl);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$success = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$success = $err;
		}

		return $success;

	}

	
}

?>