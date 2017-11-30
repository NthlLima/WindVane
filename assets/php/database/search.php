<?php
/**
* 
*/
class Search extends Dbconn {

	public function category($url){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT categ_id as id FROM ".$tbl."
										WHERE categ_name = :url");
			$stmt->bindParam(':url',$url);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($result != false) {
				$success = $result["id"];
			} else{
				$success = $result;
			}

		} else {
			$success = $err;
		}

		return $success;

	}
	
}

?>