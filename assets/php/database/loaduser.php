<?php
/**
* 
*/
class LoadUser extends Dbconn {

	public function lista($inicio){

		$config1 = '<a onclick="edit_user(';
		$config2 = ')" data-name="';
		$config3 = '" data-func="';
		$config4 = '" id="';
		$config5 = '"><i class="fa fa-cog" aria-hidden="true"></i></a>';

		try{
			$db   = new DbConn;
			$tbl  = $db->tbl1;
			$tbl2 = $db->tbl2;
			$tbl3 = $db->tbl4;
			$stmt = $db->conn->prepare("SELECT user.user_name as nome, 
											   user.user_id   as id, 
											   user.user_email as email, 
											   type.type_name as funcao, 
											   COUNT(post.post_id) as posts,
											   CASE
											   		WHEN user.user_type = 1 THEN ' '
											   		ELSE CONCAT('".$config1."' , user.user_id, '".$config2."', user.user_name , '".$config3."', user.user_type, '".$config4."', user.user_id, '".$config5."')
											   END as config
										FROM ((".$tbl." AS user
										INNER JOIN ".$tbl2." AS type ON type.type_id 	 = user.user_type)
										LEFT JOIN ".$tbl3."  AS post ON post.post_author = user.user_id)
										WHERE user.user_status = 1
										GROUP BY user.user_id
										LIMIT ".$inicio.", 10");
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


	public function count_list(){

		try{
			$db   = new DbConn;
			$tbl  = $db->tbl1;
			$stmt = $db->conn->prepare("SELECT COUNT(user_id) as count
										FROM ".$tbl." ");
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
}

?>