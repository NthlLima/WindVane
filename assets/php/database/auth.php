<?php
/**
* 
*/
class Auth extends Dbconn {


	public function login($email, $senha){

		try{
			$db   = new DbConn;
			$tbl  = $db->tbl1;
			$tbl2 = $db->tbl2;
			$stmt = $db->conn->prepare("SELECT  user.user_id as id,
												user.user_name   as nome,
												user.user_email  as email,
												user.user_img    as perfil,
												user.user_pass   as senha,
												user.user_status as status,
												user.user_type   as tipo,
												type.type_name   as funcao
										FROM ".$tbl." as user
										INNER JOIN ".$tbl2." AS type ON type.type_id = user.user_type 
										WHERE user.user_email = :email AND user.user_status = 1");
			$stmt->bindParam(':email', $email);
        	$stmt->execute();
			$err  = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if (password_verify($senha, $result['senha'])) { 
                session_start();
                $_SESSION['wv.user']   = $result["id"];
                $_SESSION['wv.nome']   = $result["nome"];
                $_SESSION['wv.email']  = $result["email"];
                $_SESSION['wv.perfil'] = $result["perfil"];
                $_SESSION['wv.funcao'] = $result["funcao"];
                $_SESSION['wv.tipo']   = $result["tipo"];

                $response = 'true';

                return $response;

            } else if(password_verify($senha, $result['senha'])){
				$response = 'Usuário Desativado';
            	return $response;
            } else if(!password_verify($senha, $result['senha']) && $result["senha"] != false){
				$response = 'A senha fornecida para o e-mail <b>'.$email.'</b> está incorreta.';
            	return $response;
            } else {
				$response = 'Usuário ou Senha incorreto';
             	return $response;
            }
		} else{
			$response = $err;
            return $response;
		}
	}


	public function update($user, $name, $email, $img)
	{
		
		try{
			$db   = new DbConn;
			$tbl  = $db->tbl1;
			$stmt = $db->conn->prepare("UPDATE ".$tbl." 
										SET user_name  = :name, 
											user_email = :email, 
											user_img   = :img  
										WHERE user_id = :id
										");
			$stmt->bindParam(':name',$name);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':img', $img);
			$stmt->bindParam(':id', $user);
			$stmt->execute();
			$err = '';
			
		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$success = 'true';
			$_SESSION['wv.nome']   = $name;
            $_SESSION['wv.email']  = $email;
            $_SESSION['wv.perfil'] = $img;
		} else {
			$success = $err;
		}
		
		return $success;
	}

	public function auth_password($user, $oldpass)
	{

		try{
			$db   = new DbConn;
			$tbl  = $db->tbl1;
			$stmt = $db->conn->prepare("SELECT  user_pass as senha
										FROM ".$tbl." 
										WHERE user_id = :id");
			$stmt->bindParam(':id', $user);
        	$stmt->execute();
			$err  = '';

		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			if (password_verify($oldpass, $result['senha'])) { 
                $response = 'true';
                return $response;

            } else {
				$response = 'Senha Antiga incompátivel';
             	return $response;
            }

		} else{
			$response = $err;
            return $response;
		}
	}

	public function password($user, $password)
	{
		
		try{
			$db   = new DbConn;
			$tbl  = $db->tbl1;
			$stmt = $db->conn->prepare("UPDATE ".$tbl." 
										SET user_pass  = :password
										WHERE user_id = :id
										");
			$stmt->bindParam(':password',$password);
			$stmt->bindParam(':id', $user);
			$stmt->execute();
			$err = '';
			
		} catch (PDOException $e) {
			$err = "Error: " . $e->getMessage();
		}

		if ($err == '') {
			$success = 'true';
		} else {
			$success = $err;
		}
		
		return $success;
	}
}