<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User Level Class
*/
class Activity{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insertSession($session_id,$page){
		$query = "INSERT INTO tbl_activity(session_id,page) VALUES('$session_id','$page')";

		$this->db->insert($query);
	}











}//end of class



 ?>