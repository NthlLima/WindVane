<?php
/**
* 
*/
class LoadPost extends Dbconn {


	public function featured($start, $limit){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$stmt = $db->conn->prepare("SELECT post_title as 'title',
											   post_date  as 'data',
											   post_content as 'content',
											   post_category as 'category',
											   post_link as 'link'
											   FROM ".$tbl." 
											   WHERE post_featured = 1 AND post_status = 1
											   ORDER BY post_id DESC , post_date DESC
											   LIMIT ".$start.", ".$limit);
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

	public function latest($start, $limit){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$stmt = $db->conn->prepare("SELECT post_title as 'title',
											   post_date  as 'data',
											   post_content as 'content',
											   post_category as 'category',
											   post_link as 'link'
											   FROM ".$tbl." 
											   WHERE post_status = 1
											   ORDER BY post_id DESC , post_date DESC
											   LIMIT ".$start.", ".$limit);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$success = $stmt->fetchAll(PDO::FETCH_ASSOC);;
		} else {
			$success = $err;
		}

		return $success;

	}


	public function post($url){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$tbl2 = $db->tbl1;
			$tbl3 = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT p.post_id as 'id',
											   p.post_title as 'title',
											   p.post_date  as 'data',
											   p.post_content as 'content',
											   p.post_link as 'link',
											   u.user_name as 'author',
											   u.user_img as 'author_img',
											   c.categ_name as 'category'
											   FROM ((".$tbl." as p
											   INNER JOIN ".$tbl2." as u ON u.user_id = p.post_author)
											   INNER JOIN ".$tbl3." as c ON c.categ_id = p.post_category)
											   WHERE p.post_link = :link AND post_status = 1");
			$stmt->bindParam(':link',$url);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$success = $stmt->fetch(PDO::FETCH_ASSOC);;
		} else {
			$success = $err;
		}

		return $success;

	}


	public function category_featured($categ){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$tbl2 = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT p.post_title as 'title',
											   p.post_date  as 'data',
											   p.post_content as 'content',
											   p.post_link as 'link'
											   FROM ".$tbl." as p
											   INNER JOIN ".$tbl2." as c ON c.categ_id = p.post_category
											   WHERE p.post_featured = 1 AND p.post_status = 1 AND c.categ_id = :categ
											   ORDER BY p.post_id DESC , p.post_date DESC
											   LIMIT 10");
			$stmt->bindParam(':categ',$categ);
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

	public function category_latest($categ){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$tbl2 = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT p.post_title as 'title',
											   p.post_date  as 'data',
											   p.post_content as 'content',
											   p.post_link as 'link'
											   FROM ".$tbl." as p
											   INNER JOIN ".$tbl2." as c ON c.categ_id = p.post_category
											   WHERE post_status = 1 AND c.categ_id = :categ
											   ORDER BY post_id DESC , post_date DESC
											   LIMIT 5");
			$stmt->bindParam(':categ',$categ);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$success = $stmt->fetchAll(PDO::FETCH_ASSOC);;
		} else {
			$success = $err;
		}

		return $success;

	}

	
	public function category_latest_date($dateB, $dateE, $categ){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$tbl2 = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT p.post_title as 'title',
											   p.post_date  as 'data',
											   p.post_content as 'content',
											   p.post_link as 'link'
											   FROM ".$tbl." as p
											   INNER JOIN ".$tbl2." as c ON c.categ_id = p.post_category
											   WHERE post_status = 1 AND c.categ_id = :categ 
											   AND p.post_date BETWEEN '".$dateB."' AND '".$dateE."'
											   ORDER BY post_id DESC , post_date DESC
											   LIMIT 5");
			$stmt->bindParam(':categ',$categ);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$success = $stmt->fetchAll(PDO::FETCH_ASSOC);;
		} else {
			$success = $err;
		}

		return $success;

	}

	public function list($inicio){

		$link1 = '<a href="/';
		$link2 = '" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>';
		$edit1 = '<a href="/dashboard/postagens/?editar_postagem=';
		$edit2 = '"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
		$delete1 = '<a onclick="delete_post(';
		$delete2 = ')"><i class="fa fa-times" aria-hidden="true"></i></a>';

		try{
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$tbl2 = $db->tbl1;
			$tbl3 = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT p.post_title as title,
											   c.categ_name as category,
											   u.user_name as author,
											   p.post_date as data,
											   p.post_author as pauthor,
											   CONCAT('".$edit1."' , p.post_id , '".$edit2."') as edit,
											   CONCAT('".$delete1."' , p.post_id , '".$delete2."') as 'delete',
											   CONCAT('".$link1."' , p.post_link , '".$link2."') as link
										FROM ((".$tbl." as p
										INNER JOIN ".$tbl2." as u ON u.user_id = p.post_author)
										INNER JOIN ".$tbl3." as c ON c.categ_id = p.post_category)
										ORDER BY p.post_date DESC, p.post_id DESC
										LIMIT ".$inicio.", 10");
        	$stmt->execute();
			$err  = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }

		if ($err == '') {
			$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$i = 0;


			foreach ($posts as $post) {
				if (($_SESSION['wv.tipo'] == 1) || ($_SESSION['wv.tipo'] == 2) || ($_SESSION['wv.tipo'] == 3) || ($_SESSION['wv.user'] == $post["pauthor"])) {
					$post["edit"] = $post["edit"];
					$post["delete"] = $post["delete"];
				} else{
					$post["edit"] = ' ';
					$post["delete"] = ' ';
				}
				$posts[$i] = $post;
				$i++;
			}

			$result = $posts;

		} else {
			$result = $err;
		}

		return $result;

	}
	public function count_list(){

		try{
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$tbl2 = $db->tbl1;
			$tbl3 = $db->tbl3;
			$stmt = $db->conn->prepare("SELECT COUNT(post_id) AS count
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

	public function edit($id){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$stmt = $db->conn->prepare("SELECT post_id as 'id',
											   post_title as 'title',
											   post_date  as 'data',
											   post_content as 'content',
											   post_link as 'link',
											   post_category as 'category',
											   post_keywords as 'keywords',
											   post_featured as 'featured'
											   FROM ".$tbl."
											   WHERE post_id = :id");
			$stmt->bindParam(':id',$id);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			$df = new DateTime($result["data"]);
			$data = $df->format('d/m/Y');
			$result["data"] = $data;

			$success = $result;


		} else {
			$success = $err;
		}

		return $success;
	}


	public function id($link, $data, $autor, $submit){

		try{
			
			$db   = new DbConn;
			$tbl  = $db->tbl4;
			$stmt = $db->conn->prepare("SELECT post_id as id FROM ".$tbl." 
										WHERE post_link = :link AND 
										post_author = :author AND 
										post_date = :date AND 
										post_status = :status
										");
			$stmt->bindParam(':link',$link);
			$stmt->bindParam(':author',$autor);
			$stmt->bindParam(':date',$data);
			$stmt->bindParam(':status',$submit);
			$stmt->execute();
			$err = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$return = $stmt->fetch(PDO::FETCH_ASSOC);
			$success = $return["id"];

		} else {
			$success = $err;
		}

		return $success;

	}

	
}

?>