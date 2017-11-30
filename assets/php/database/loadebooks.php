<?php
/**
* 
*/
class LoadEbooks extends Dbconn {


	public function list($inicio){

		$config1 = '<a onclick="edit_ebook(';
		$config2 = ')"><i class="fa fa-cog" aria-hidden="true"></i></a>';	

		$link1 = '<a href="';
		$link2 = '" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>';

		$img1 = '<img src="';
		$img2 = '" class="img-ebook-list">';

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl7;
			$stmt = $db->conn->prepare("SELECT ebook_nome as 'nome',
											   CONCAT('".$link1."', ebook_pdf, '".$link2."') as 'link',
											   CONCAT('".$img1."', ebook_img, '".$img2."') as 'img',
											   ebook_total as 'downloads',
											   CASE 
											   		WHEN ebook_status = 1 THEN 'Ativo'
											   		ELSE 'Desativado'
											   END AS 'status',
											   CONCAT('".$config1."', ebook_id, '".$config2."') as 'config'
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
			$tbl  = $db->tbl7;
			$stmt = $db->conn->prepare("SELECT COUNT(ebook_id) AS count
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

	public function active(){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl7;
			$stmt = $db->conn->prepare("SELECT ebook_nome as 'nome',
											   ebook_link as 'link',
											   ebook_img  as 'img'
										FROM ".$tbl . "
										WHERE ebook_status = 1");
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$success = $stmt->fetch(PDO::FETCH_ASSOC);
		} else {
			$success = $err;
		}

		return $success;

	}

	
}

?>