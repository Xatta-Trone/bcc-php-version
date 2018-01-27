<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User Level Class
*/
class UserLevel{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addLevel($data){
		$name  = $this->fm->validation($data['levelname']);
		$power = $this->fm->validation($data['power']);

		$name = mysqli_real_escape_string($this->db->link,$name);
		$power = mysqli_real_escape_string($this->db->link,$power);


		if (empty($name)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Name Field is required.</div>';
			return $msg;
		}elseif (empty($power)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Power Field is required.</div>';
			return $msg;
		}else{
			$query = "INSERT INTO tbl_userlevel(name,power) VALUES('$name','$power')";
			$levelInsert = $this->db->insert($query);

			if ($levelInsert) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Level Added Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Level Not added</div>';
			return $msg;
			}
		}

	}

	public function levelList(){
		$query  = "SELECT * FROM tbl_userlevel ORDER BY id DESC";

		return $this->db->select($query);
	}

	public function deleteLevelById($id){
		$query = "DELETE FROM tbl_userlevel WHERE id='$id'";

		$deleteConfirm = $this->db->delete($query);

		if ($deleteConfirm) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Level Deleted Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Level Not Deleetd</div>';
			return $msg;
			}
	}

	public function getLevelById($id){
		$query = "SELECT * FROM tbl_userlevel WHERE id='$id'";

		return $this->db->select($query);

	}


	public function updateLevelById($data,$id){
		$name  = $this->fm->validation($data['levelname']);
		$power = $this->fm->validation($data['power']);

		$name = mysqli_real_escape_string($this->db->link,$name);
		$power = mysqli_real_escape_string($this->db->link,$power);

		if (empty($name)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Name Field is required.</div>';
			return $msg;
		}elseif (empty($power)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Power Field is required.</div>';
			return $msg;
		}else{
			$query = "UPDATE tbl_userlevel SET 
					name  = '$name',
					power = '$power'
					WHERE id = '$id'";

			$update_result = $this->db->update($query);

			if ($update_result) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Level Updated Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Level Not Updated</div>';
			return $msg;
			}
		}


	}


























}//end of class



 ?>