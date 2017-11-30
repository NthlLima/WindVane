<?php
/**
* 
*/
class LoadSocialMedia extends Dbconn {


	public function list($inicio){

		$config1 = '<a onclick="edit_social_media(';
		$config2 = ')"><i class="fa fa-cog" aria-hidden="true"></i></a>';	

		$link1 = '<a href="';
		$link2 = '" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>';


		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl8;
			$stmt = $db->conn->prepare("SELECT media_nome as 'nome',
											   media_link as 'url',
											   count_fan  as 'count',
											   type_fan   as 'type',
											   CONCAT('".$link1."', media_link, '".$link2."') as 'link',
											   CONCAT('".$config1."', media_id, '".$config2."') as 'config'
											   FROM ".$tbl." 
											   LIMIT ".$inicio.", 10");
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
			$tbl  = $db->tbl8;
			$stmt = $db->conn->prepare("SELECT COUNT(media_id) AS count
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
			$tbl  = $db->tbl8;
			$stmt = $db->conn->prepare("SELECT media_link as 'url',
											   count_fan  as 'count',
											   type_fan   as 'type'
											   FROM ".$tbl);
        	$stmt->execute();
			$err  = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		} else {
			$result = $err;
		}

		return $result;

	}

	
}

?>