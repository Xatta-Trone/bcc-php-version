<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User Level Class
*/
class Alumni{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addAlumni($data,$file){
		//var_dump($data);
		//var_dump($file);
		//exit();
		$membername      = $this->fm->validation($data['membername']);
		$memberemail     = $this->fm->validation($data['memberemail']);
		$memberfb        = $this->fm->validation($data['memberfb']);
		$memberlinkedin  = $this->fm->validation($data['memberlinkedin']);
		$batch_dept  = $this->fm->validation($data['batch_dept']);

		$membername      = mysqli_real_escape_string($this->db->link,$membername);
		$memberemail     = mysqli_real_escape_string($this->db->link,$memberemail);
		$memberfb        = mysqli_real_escape_string($this->db->link,$memberfb);
		$memberlinkedin  = mysqli_real_escape_string($this->db->link,$memberlinkedin);


		$permittedImg = array('jpg','jpeg');

		$imgName  = $file['memberimage']['name'];
		$imgSize  = $file['memberimage']['size'];
		$imgTemp  = $file['memberimage']['tmp_name'];
		$imgError = $file['memberimage']['error'];

		$currentPath = realpath(dirname(__FILE__));

		$imgExtension = explode('.',$imgName);
		$imgExtension = strtolower(end($imgExtension));
		$uniqueName   = substr(md5(time()), 0,10).'.'.$imgExtension;
		$uploadPath   = $currentPath."/../file/img/".$uniqueName;


		if (empty($membername)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Name Field is required.</div>';
			return $msg;
		}elseif (empty($memberemail)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Email Field is required.</div>';
			return $msg;
		}elseif (empty($memberfb)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Facebook Field is required.</div>';
			return $msg;
		}elseif ($imgSize>2097152) {
			// 1048576 bit = 1MB
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Max img size is 2MB</div>';
			return $msg;
		}elseif (in_array($imgExtension,$permittedImg)==false) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Image type is not allowed. Only';
			$msg .= implode(' , ', $permittedImg);
			$msg .= ' types are allowed</div>';
			return $msg;
		}else{
			if ($imgError=='0') {
				
				move_uploaded_file($imgTemp,$uploadPath);

				$query = "INSERT INTO tbl_alumni(name,email,fb,linkedin,batch_dept,image)
				VALUES('$membername','$memberemail','$memberfb','$memberlinkedin','$batch_dept','$uniqueName')";

				$Insert_member = $this->db->insert($query);

				if ($Insert_member) {
					$msg = '<div class="alert alert-success"><strong>Success!</strong> Member Added Succesfully</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> Member Not added</div>';
					return $msg;
				}
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> There Was a error with the file';
				$msg .= $imgError;
				$msg .= '</div>';
				return $msg;
			}	
		}
	}

	public function getAllMembers(){
		$query = "SELECT * FROM tbl_alumni ORDER BY id ASC";

		return $this->db->select($query);
	}

	public function getMemberById($id){
		$query = "SELECT * FROM tbl_alumni WHERE id='$id'";

		return $this->db->select($query);

	}

	public function deleteMemberById($id){

		$getMember = $this->getMemberById($id);

		if ($getMember) {
			$currentPath = realpath(dirname(__FILE__));

			while ($delMember = $getMember->fetch_assoc()) {
				$img= $currentPath."/../file/img/".$delMember['image'];

				//echo $img; exit();

				unlink($img);

			}
		}


		$query = "DELETE FROM tbl_alumni WHERE id='$id'";

		$deleteConfirm = $this->db->delete($query);

		if ($deleteConfirm) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Member Deleted Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Member Not Deletd</div>';
			return $msg;
			}
	}


	public function updateMemberById($data,$file,$id){

		$membername      = $this->fm->validation($data['membername']);
		$memberemail     = $this->fm->validation($data['memberemail']);
		$memberfb        = $this->fm->validation($data['memberfb']);
		$memberlinkedin  = $this->fm->validation($data['memberlinkedin']);
		$batch_dept  = $this->fm->validation($data['batch_dept']);

		$membername      = mysqli_real_escape_string($this->db->link,$membername);
		$memberemail     = mysqli_real_escape_string($this->db->link,$memberemail);
		$memberfb        = mysqli_real_escape_string($this->db->link,$memberfb);
		$memberlinkedin  = mysqli_real_escape_string($this->db->link,$memberlinkedin);


		$permittedImg = array('jpg','jpeg');

		$imgName  = $file['memberimage']['name'];
		$imgSize  = $file['memberimage']['size'];
		$imgTemp  = $file['memberimage']['tmp_name'];
		$imgError = $file['memberimage']['error'];

		$currentPath = realpath(dirname(__FILE__));

		$imgExtension = explode('.',$imgName);
		$imgExtension = strtolower(end($imgExtension));
		$uniqueName   = substr(md5(time()), 0,10).'.'.$imgExtension;
		$uploadPath   = $currentPath."/../file/img/".$uniqueName;


		if (empty($membername)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Name Field is required.</div>';
			return $msg;
		}elseif (empty($memberemail)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Email Field is required.</div>';
			return $msg;
		}elseif (empty($memberfb)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Facebook Field is required.</div>';
			return $msg;
		}else{
			if (!empty($imgName)) {
				if ($imgSize>2097152) {
					// 1048576 bit = 1MB
					$msg = '<div class="alert alert-danger"><strong>Error! </strong>Max img size is 2MB</div>';
					return $msg;
				}elseif (in_array($imgExtension,$permittedImg)==false) {
					$msg = '<div class="alert alert-danger"><strong>Error! </strong>Image type is not allowed. Only';
					$msg .= implode(' , ', $permittedImg);
					$msg .= ' types are allowed</div>';
					return $msg;
				}else{
					if ($imgError=='0') {
						$getMember = $this->getMemberById($id);

						if ($getMember) {
							$currentPath = realpath(dirname(__FILE__));

							while ($delMember = $getMember->fetch_assoc()) {
								$img= $currentPath."/../file/img/".$delMember['image'];

								//echo $img; exit();

								unlink($img);

							}
						}
						
						move_uploaded_file($imgTemp,$uploadPath);

						/*$query = "INSERT INTO tbl_alumni(name,dept,area,position,email,password,fb,linkedin,image)
						VALUES('$membername','$dept','$area','$position','$memberemail','password','$memberfb','$memberlinkedin','$uniqueName')";*/

						$query = "UPDATE tbl_alumni SET
							name = '$membername',
							email = '$memberemail',
							fb = '$memberfb',
							linkedin = '$memberlinkedin',
							batch_dept = '$batch_dept',
							image = '$uniqueName'
							WHERE id = '$id'";

						$upadte_member = $this->db->update($query);

						if ($upadte_member) {
							$msg = '<div class="alert alert-success"><strong>Success!</strong> Member Updated Succesfully</div>';
							return $msg;
						}else{
							$msg = '<div class="alert alert-danger"><strong>Error!</strong> Member Not Updated</div>';
							return $msg;
						}
					}else{
						$msg = '<div class="alert alert-danger"><strong>Error!</strong> There Was a error with the file';
						$msg .= $imgError;
						$msg .= '</div>';
						return $msg;
					}	
				}
			}else{
				$query = "UPDATE tbl_alumni SET
							name = '$membername',
							email = '$memberemail',
							fb = '$memberfb',
							linkedin = '$memberlinkedin',
							batch_dept ='$batch_dept'
							WHERE id = '$id'";

						$upadte_member = $this->db->update($query);

						if ($upadte_member) {
							$msg = '<div class="alert alert-success"><strong>Success!</strong> Member Updated Succesfully</div>';
							return $msg;
						}else{
							$msg = '<div class="alert alert-danger"><strong>Error!</strong> Member Not Updated</div>';
							return $msg;
						}

			}
		}
























		

	}



	





}//end of class



 ?>