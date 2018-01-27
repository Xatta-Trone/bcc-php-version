<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User Level Class
*/
class Area{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addArea($data){
		$areaname  = $this->fm->validation($data['areaname']);

		$areaname = mysqli_real_escape_string($this->db->link,$areaname);


		if (empty($areaname)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Name Field is required.</div>';
			return $msg;
		}else{
			$query = "INSERT INTO tbl_area(areaname) VALUES('$areaname')";
			$levelInsert = $this->db->insert($query);

			if ($levelInsert) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Area Added Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Area Not added</div>';
			return $msg;
			}
		}

	}

	public function areaList($order = "DESC"){
		$query  = "SELECT * FROM tbl_area ORDER BY id $order";

		return $this->db->select($query);
	}

	public function deleteAreaById($id){
		$query = "DELETE FROM tbl_area WHERE id='$id'";

		$deleteConfirm = $this->db->delete($query);

		if ($deleteConfirm) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Area Deleted Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Area Not Deleetd</div>';
			return $msg;
			}
	}

	public function getAreaById($id){
		$query = "SELECT * FROM tbl_area WHERE id='$id'";

		return $this->db->select($query);

	}


	public function updateAreaById($data,$id){
		$name  = $this->fm->validation($data['areaname']);

		$name = mysqli_real_escape_string($this->db->link,$name);

		if (empty($name)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Area Field is required.</div>';
			return $msg;
		}else{
			$query = "UPDATE tbl_area SET 
					areaname  = '$name'
					WHERE id = '$id'";

			$update_result = $this->db->update($query);

			if ($update_result) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Area Updated Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Area Not Updated</div>';
			return $msg;
			}
		}


	}


























}//end of class



 ?>