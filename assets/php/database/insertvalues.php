<?php
/**
* 
*/
class InsertValues extends Dbconn {

	public function timeline($modified, $description, $date, $type, $user){

		try{
			$db   = new DbConn;
			$tbl  = $db->tbl5;
			$stmt = $db->conn->prepare("INSERT INTO ".$tbl." (timeline_modified, timeline_description, timeline_date, timeline_type, timeline_user) 
										VALUES (:modified, :description, :date, :type, :user)");
			$stmt->bindParam(':modified',$modified);
			$stmt->bindParam(':description',$description);
			$stmt->bindParam(':date',$date);
			$stmt->bindParam(':type',$type);
			$stmt->bindParam(':user',$user);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = $e->getMessage();
		}

		if ($err == '') {
			$success = true;
		} else {
			$success = $err;
		}

		return $success;

	}

	public function category($name){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl3;
			$stmt = $db->conn->prepare("INSERT INTO ".$tbl." (categ_name) VALUES (:name)");
			$stmt->bindParam(':name',$name);
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

	public function post($autor, $titulo, $categoria, $link, $data, $destaque, $postagem, $keywords, $submit){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$stmt = $db->conn->prepare("INSERT INTO ".$tbl." (post_title, post_link,post_author, post_date, post_modified, post_content, post_category, post_keywords, post_featured, post_status) 
													  VALUES (:title, :link, :author, :date, :modified, :content, :category, :keywords, :featured, :status)");
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

	public function user($username, $email, $password, $funcao, $img){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl1;
			$stmt = $db->conn->prepare("INSERT INTO ".$tbl." (user_email, user_pass, user_name, user_img, user_type) VALUES (:email, :pass, :name, :img, :funcao)");
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':pass',$password);
			$stmt->bindParam(':name',$username);
			$stmt->bindParam(':img', $img);
			$stmt->bindParam(':funcao',$funcao);
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


	public function newsletter($nome, $email){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl6;
			$stmt = $db->conn->prepare("INSERT INTO ".$tbl." (newsletter_nome, newsletter_email) VALUES (:nome, :email)");
			$stmt->bindParam(':nome',$nome);
			$stmt->bindParam(':email',$email);
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

	public function ebook($pdf, $img, $name, $namePDF){

		try{
			
			$db   = new DbConn;
			$stmt = $db->conn->prepare('call active_ebook ("'.$name.'", "'.$pdf.'", "'.$img.'", "'.$namePDF.'")');
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


	public function download($ebook){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl8;
			$stmt = $db->conn->prepare('UPDATE '.$tbl.' SET ebook_total = ebook_total + 1 WHERE ebook_link = :ebook');
			$stmt->bindParam(':ebook',$ebook);			
			$stmt->execute();

		} catch (PDOException $e) {
			$err = $e->getMessage();
		}

	}


}