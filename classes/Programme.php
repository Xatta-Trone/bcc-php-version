<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User Level Class
*/
class Programme{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addProgramme($data){
		$programmename  = $this->fm->validation($data['programmename']);
		$programmedescription  = $this->fm->validation($data['programmedescription']);

		$programmename = mysqli_real_escape_string($this->db->link,$programmename);
		$programmedescription = mysqli_real_escape_string($this->db->link,$programmedescription);


		if (empty($programmename)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Name Field is required.</div>';
			return $msg;
		}else{
			$query = "INSERT INTO tbl_programme(programmename,programmedescription) VALUES('$programmename','$programmedescription')";
			$levelInsert = $this->db->insert($query);

			if ($levelInsert) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Programme Added Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Programme Not added</div>';
			return $msg;
			}
		}

	}

	public function ProgrammeList(){
		$query  = "SELECT * FROM tbl_programme ORDER BY id DESC";

		return $this->db->select($query);
	}

	public function deleteProgrammeById($id){
		$query = "DELETE FROM tbl_programme WHERE id='$id'";

		$deleteConfirm = $this->db->delete($query);

		if ($deleteConfirm) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Programme Deleted Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Programme Not Deleetd</div>';
			return $msg;
			}
	}

	public function getProgrammeById($id){
		$query = "SELECT * FROM tbl_programme WHERE id='$id'";

		return $this->db->select($query);

	}



	public function updateProgrammeById($data,$id){
		$name  = $this->fm->validation($data['programmename']);
		$programmedescription  = $this->fm->validation($data['programmedescription']);

		$name = mysqli_real_escape_string($this->db->link,$name);

		if (empty($name)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Programme Field is required.</div>';
			return $msg;
		}else{
			$query = "UPDATE tbl_programme SET 
					programmename  = '$name',
					programmedescription = '$programmedescription'
					WHERE id = '$id'";

			$update_result = $this->db->update($query);

			if ($update_result) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Programme Updated Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Programme Not Updated</div>';
			return $msg;
			}
		}


	}


























}//end of class



 ?>