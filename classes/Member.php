<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helper/Format.php');
	include_once ('Mail.php');
	include_once ('MailTemplate.php');
/**
* User Level Class
*/
class Member{
	
	private $db;
	private $fm;
	public $mail;
	public $template;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
		$this->mail = new Mail();
		$this->template = new MailTemplate();
	}

	public function randomPassword($num=8){
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < $num; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
    	return implode($pass); //turn the array into a string
	}

	public function addMember($data,$file){
		$password = self::randomPassword();
		//var_dump($data);
		//var_dump($file);
		//var_dump($password);
		//exit();
		$md_password = md5($password);

		
		$membername      = $this->fm->validation($data['membername']);
		$dept            = $this->fm->validation($data['dept']);
		$area            = $this->fm->validation($data['area']);
		$position        = $this->fm->validation($data['position']);
		$memberemail     = $this->fm->validation($data['memberemail']);
		$memberfb        = $this->fm->validation($data['memberfb']);
		$memberlinkedin  = $this->fm->validation($data['memberlinkedin']);

		$membername      = mysqli_real_escape_string($this->db->link,$membername);
		$dept            = mysqli_real_escape_string($this->db->link,$dept);
		$area            = mysqli_real_escape_string($this->db->link,$area);
		$position        = mysqli_real_escape_string($this->db->link,$position);
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
		}elseif (empty($dept)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Dept. Field is required.</div>';
			return $msg;
		}elseif (empty($area)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Area Field is required.</div>';
			return $msg;
		}elseif (empty($position)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Position Field is required.</div>';
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
				$reset_code = self::randomPassword(5);

				$query = "INSERT INTO tbl_member(name,dept,area,position,email,password,fb,linkedin,image,reset_code)
				VALUES('$membername','$dept','$area','$position','$memberemail','$md_password','$memberfb','$memberlinkedin','$uniqueName','$reset_code')";

				$Insert_member = $this->db->insert($query);

				if ($Insert_member) {

					//$this->mail->sendMail($memberemail,'New Account',$password,'xatta@gmail.com');

					$body = $this->template->NewMemberAdd($membername,$memberemail,$password,$reset_code);

					$this->mail->sendEmail($memberemail,$body,'admin@buetcareerclub.org','New Account');

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
		$query = "SELECT members.*, area.areaname, position.positionname FROM tbl_member as members, tbl_position as position, tbl_area as area WHERE members.area = area.id AND members.position = position.id order BY members.id DESC";

		return $this->db->select($query);
	}

	public function getMemberAllDataById($id){
		$query = "SELECT members.*, area.areaname, position.positionname FROM tbl_member as members, tbl_position as position, tbl_area as area WHERE members.area = area.id AND members.position = position.id AND members.id='$id'";

		return $this->db->select($query);
	}

	public function getMemberById($id){
		$query = "SELECT * FROM tbl_member WHERE id='$id'";

		return $this->db->select($query);
	}
	public function getMemberByArea($area){
		$query = "SELECT members.*, position.positionname FROM tbl_member as members, tbl_position as position WHERE members.area = '$area' AND members.position = position.id order BY members.position ASC";

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


		$query = "DELETE FROM tbl_member WHERE id='$id'";

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
		$dept            = $this->fm->validation($data['dept']);
		$area            = $this->fm->validation($data['area']);
		$position        = $this->fm->validation($data['position']);
		$memberemail     = $this->fm->validation($data['memberemail']);
		$memberfb        = $this->fm->validation($data['memberfb']);
		$memberlinkedin  = $this->fm->validation($data['memberlinkedin']);

		$membername      = mysqli_real_escape_string($this->db->link,$membername);
		$dept            = mysqli_real_escape_string($this->db->link,$dept);
		$area            = mysqli_real_escape_string($this->db->link,$area);
		$position        = mysqli_real_escape_string($this->db->link,$position);
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
		}elseif (empty($dept)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Dept. Field is required.</div>';
			return $msg;
		}elseif (empty($area)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Area Field is required.</div>';
			return $msg;
		}elseif (empty($position)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Position Field is required.</div>';
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

						/*$query = "INSERT INTO tbl_member(name,dept,area,position,email,password,fb,linkedin,image)
						VALUES('$membername','$dept','$area','$position','$memberemail','password','$memberfb','$memberlinkedin','$uniqueName')";*/

						$query = "UPDATE tbl_member SET
							name = '$membername',
							dept = '$dept',
							area = '$area',
							position = '$position',
							email = '$memberemail',
							fb = '$memberfb',
							linkedin = '$memberlinkedin',
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
				$query = "UPDATE tbl_member SET
							name = '$membername',
							dept = '$dept',
							area = '$area',
							position = '$position',
							email = '$memberemail',
							fb = '$memberfb',
							linkedin = '$memberlinkedin'
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


	public function memberLogin($data){
		$email    = $this->fm->validation($data['email']);
		$password = $this->fm->validation($data['password']);

		$email     = mysqli_real_escape_string($this->db->link,$email);
		$password  = mysqli_real_escape_string($this->db->link,$password);

		if (empty($email) || empty($password)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Please enter your credentials</div>';
			return $msg;
		}
		$password = md5($password);


		$query = "SELECT * FROM tbl_member WHERE email='$email' AND password='$password'";

		$result = $this->db->select($query);

		if ($result != false) {
			$value = $result->fetch_assoc();

			Session::init();

			Session::set("Name",$value['name']);
			Session::set("userId",$value['id']);
			Session::set("isLoggedIn",true);
			Session::set("isUser",true);

			if ($value['is_admin']=='1') {
				Session::set("isAdmin",true);
			
			}else{
				Session::set("isAdmin",false);
			}
				header("Location:index.php");

		}else{
			$msg = '<div class="alert alert-danger"><strong>Error! </strong> your credentials do not match</div>';
			return $msg;
		}

	}


	public function changePassword($data){
		$user_id = Session::get('userId');
		$oldPassword = $this->fm->validation($data['oldPassword']);
		$newpassword = $this->fm->validation($data['newpassword']);
		$repassword = $this->fm->validation($data['repassword']);

		$oldPassword  = mysqli_real_escape_string($this->db->link,$oldPassword);
		$newpassword  = mysqli_real_escape_string($this->db->link,$newpassword);
		$repassword  = mysqli_real_escape_string($this->db->link,$repassword);

		

		//var_dump($data); echo $user_id; exit;


		if (empty($oldPassword)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong> Please Enter old password</div>';
			return $msg;
		}else{
			if (($newpassword !== $repassword) || empty($newpassword) || empty($repassword)) {
				$msg = '<div class="alert alert-danger"><strong>Error! </strong> New Passwords do not match or empty</div>';
				return $msg;
			}else{
				$query = "SELECT * FROM tbl_member WHERE id= '$user_id'";
				$result = $this->db->select($query);

				if ($result) {
					$passwordData = $result->fetch_assoc();
					if ($passwordData['password'] !== md5($oldPassword)) {
						$msg = '<div class="alert alert-danger"><strong>Error! </strong> Please enter correct password</div>';
						return $msg;
					}else{
						$newpassword = md5($newpassword);
						$query = "UPDATE tbl_member SET
							password = '$newpassword'
							WHERE id='$user_id'";

						$pwdChng = $this->db->update($query);
						if ($pwdChng) {
							$msg = '<div class="alert alert-success"><strong>Success!</strong> Password Changed Succesfully</div>';
							return $msg;
						//	Session::destroy();
							//header("location:login.php");
						}else{
							$msg = '<div class="alert alert-danger"><strong>Error!</strong> Password Not changed</div>';
							return $msg;
						}
					}

				}else{
					//Session::destroy();
					Session::destroy();
				}
			}
		}

	}

	public function forgotPassword($email){

		$email = $this->fm->validation($email['email']);

		if (!empty($email)) {
			$query = "SELECT email FROM tbl_member WHERE email= '$email'";

			$result = $this->db->select($query);
			if ($result) {
				$reset_code = self::randomPassword(5);

				$query = "UPDATE tbl_member SET reset_code= '$reset_code' WHERE email='$email'";

				$update_query = $this->db->update($query);

				if ($update_query) {
					$memberemail = $email;


					$body = $this->template->resetPassword($memberemail,$reset_code);

					$sendMail = $this->mail->sendEmail($memberemail,$body,'no-reply@buetcareerclub.org','Reset Password','Change Password');
					
					$msg = '<div class="alert alert-success">An email has been sent to your address. Please check your email(spam folder too) to reset password, or you can enter reset code <a href="reset.php">here</a> </div>';
					return $msg;
					
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> There was an error </div>';
						return $msg;
				}




			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> There is no account with this email</div>';
				return $msg;
			}
		}else{
			$msg = '<div class="alert alert-danger"><strong>Error!</strong> Please enter your email address</div>';
			return $msg;
		}
	}


	public function resetVerfication($code){
		$code = $code['code'];

		if (!empty($code)) {
			$query = "SELECT * FROM tbl_member WHERE reset_code='$code'";

			$result = $this->db->select($query);

			if ($result) {
				$value = $result->fetch_assoc();
				header("Location:resetpassword.php?email=".$value['email']."&&code=".$code);
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> This code does not exists in our system. Please check your email</div>';
				return $msg;
			}
			
		}else{
			$msg = '<div class="alert alert-danger"><strong>Error!</strong> Please enter reset code</div>';
			return $msg;
		}

	}


	public function resetPassword($data,$email,$code){
		$newpassword = $this->fm->validation($data['newpassword']);
		$repassword = $this->fm->validation($data['repassword']);

		$newpassword  = mysqli_real_escape_string($this->db->link,$newpassword);
		$repassword  = mysqli_real_escape_string($this->db->link,$repassword);

		if (($newpassword !== $repassword) || empty($newpassword) || empty($repassword)) {
				$msg = '<div class="alert alert-danger"><strong>Error! </strong> New Passwords do not match or empty</div>';
				return $msg;
			}else{
				$newpassword = md5($newpassword);
				$query = "UPDATE tbl_member SET
					password = '$newpassword',
					reset_code = ''
					WHERE email='$email' AND reset_code='$code'";

				$pwdChng = $this->db->update($query);
				if ($pwdChng) {
					$msg = '<div class="alert alert-success"><strong>Success!</strong> Password Changed Succesfully</div>';
					return $msg;
				//	Session::destroy();
					//header("location:login.php");
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> Password Not changed</div>';
					return $msg;
				}
				
			}
		}


		public function makeAdmin($id){

			$query = "UPDATE tbl_member SET is_admin = '1' WHERE id='$id'";

			$update_query = $this->db->update($query);

			if ($update_query) {
					$msg = '<div class="alert alert-success"><strong>Success!</strong> New admin added</div>';
					return $msg;
				//	Session::destroy();
					//header("location:login.php");
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> There was an error making him/her admin</div>';
					return $msg;
				}
		}

		public function removeAdmin($id){

			$query = "UPDATE tbl_member SET is_admin = '2' WHERE id='$id'";

			$update_query = $this->db->update($query);

			if ($update_query) {
					$msg = '<div class="alert alert-success"><strong>Success!</strong> admin removed</div>';
					return $msg;
				//	Session::destroy();
					//header("location:login.php");
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> There was an error removing him/her as admin</div>';
					return $msg;
				}
		}

	




						












}//end of class



 ?>