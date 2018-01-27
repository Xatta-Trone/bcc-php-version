<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User Position Class
*/
class Position{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addPosition($data){
		$name  = $this->fm->validation($data['positionname']);
		$name = mysqli_real_escape_string($this->db->link,$name);


		if (empty($name)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>position Field is required.</div>';
			return $msg;
		}else{
			$query = "INSERT INTO tbl_position(positionname) VALUES('$name')";
			$PositionInsert = $this->db->insert($query);

			if ($PositionInsert) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Position Added Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Position Not added</div>';
			return $msg;
			}
		}

	}

	public function PositionList(){
		$query  = "SELECT * FROM tbl_position ORDER BY id DESC";

		return $this->db->select($query);
	}

	public function deletePositionById($id){
		$query = "DELETE FROM tbl_position WHERE id='$id'";

		$deleteConfirm = $this->db->delete($query);

		if ($deleteConfirm) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Position Deleted Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Position Not Deleetd</div>';
			return $msg;
			}
	}

	public function getPositionById($id){
		$query = "SELECT * FROM tbl_position WHERE id='$id'";

		return $this->db->select($query);

	}


	public function updatePositionById($data,$id){
		$name  = $this->fm->validation($data['positionname']);

		$name = mysqli_real_escape_string($this->db->link,$name);

		if (empty($name)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Name Field is required.</div>';
			return $msg;
		}else{
			$query = "UPDATE tbl_position SET 
					positionname  = '$name'
					WHERE id = '$id'";

			$update_result = $this->db->update($query);

			if ($update_result) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Position Updated Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Position Not Updated</div>';
			return $msg;
			}
		}


	}


























}//end of class



 ?>