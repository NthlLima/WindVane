<?php
/**
* 
*/
class DeleteValues extends Dbconn {


	public function category($id){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl3;
			$stmt = $db->conn->prepare("DELETE FROM ".$tbl." WHERE categ_id = :id");
			$stmt->bindParam(':id',$id);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = $e->getMessage();
		}

		if ($err == '') {
			$success = 'true';
		} else {
			$success = $err;
		}

		return $success;
	}

	public function post($id){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$stmt = $db->conn->prepare("DELETE FROM ".$tbl." WHERE post_id = :id");
			$stmt->bindParam(':id',$id);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = $e->getMessage();
		}

		if ($err == '') {
			$success = 'true';
		} else {
			$success = $err;
		}

		return $success;
	}

	public function user($id){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl1;
			$stmt = $db->conn->prepare("UPDATE ".$tbl." 
										SET user_status = 2
										WHERE user_id = :id");
			$stmt->bindParam(':id',$id);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = $e->getMessage();
		}

		if ($err == '') {
			$success = 'true';
		} else {
			$success = $err;
		}

		return $success;
	}
}