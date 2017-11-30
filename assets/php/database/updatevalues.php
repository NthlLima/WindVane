<?php
/**
* 
*/
class UpdateValues extends Dbconn {

	public function post($autor, $titulo, $categoria, $link, $data, $date_update, $destaque, $postagem, $keywords, $submit, $id){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$stmt = $db->conn->prepare("UPDATE ".$tbl." SET post_title = :title,
															post_link = :link,
															post_author = :author,
															post_date = :date,
															post_modified = :modified,
															post_content = :content,
															post_category = :category,
															post_keywords = :keywords,
															post_featured = :featured,
															post_status = :status
										WHERE post_id = :id");
			$stmt->bindParam(':title',$titulo);
			$stmt->bindParam(':link',$link);
			$stmt->bindParam(':author',$autor);
			$stmt->bindParam(':date',$data);
			$stmt->bindParam(':modified',$data);
			$stmt->bindParam(':content',$postagem);
			$stmt->bindParam(':category',$categoria);
			$stmt->bindParam(':keywords',$keywords);
			$stmt->bindParam(':featured',$destaque);
			$stmt->bindParam(':status',$submit);
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

	public function user($id, $func){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl1;
			$stmt = $db->conn->prepare("UPDATE ".$tbl." 
										SET user_type = :func
										WHERE user_id = :id");
			$stmt->bindParam(':func',$func);
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


?>