<?php
class DbConn
{
    public $conn;
    public function __construct()
    {
        require( ASSETSPATH . '/php/database/dbconf.php' );
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name  = $db_name;
        $this->tbl_prefix   = $tbl_prefix;
        $this->tbl1 = $tbl1;
        $this->tbl2 = $tbl2;
        $this->tbl3 = $tbl3;
        $this->tbl4 = $tbl4;
        $this->tbl5 = $tbl5;
        $this->tbl6 = $tbl6;
        $this->tbl7 = $tbl7;
        $this->tbl8 = $tbl8;

        try {
			$this->conn = new PDO('mysql:host=' . $host . ';dbname=' . $db_name . ';charset=utf8', $username, $password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (\Exception $e) {
			die('Database connection error');
		}
    }
}
