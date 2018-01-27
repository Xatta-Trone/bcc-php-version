<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');

	include_once ('Mail.php');
	include_once ('MailTemplate.php');
/**
* User Level Class
*/
class Submission{
	
	private $db;
	public $fm;


	public $mail;
	public $template;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();

		$this->mail = new Mail();
		$this->template = new MailTemplate();
	}

	public function JoinData($data){
		$name          = $this->fm->validation($data['name']);
		$email         = $this->fm->validation($data['email']);
		$fathers_name  = $this->fm->validation($data['fathers_name']);
		$mothers_name  = $this->fm->validation($data['mothers_name']);
		$student_id    = $this->fm->validation($data['student_id']);
		$dept          = $this->fm->validation($data['dept']);
		$contact_1     = $this->fm->validation($data['contact_1']);
		$contact_2     = $this->fm->validation($data['contact_2']);
		$fb_id         = $this->fm->validation($data['fb_id']);
		$linkedin_id   = $this->fm->validation($data['linkedin_id']);
		$address       = $this->fm->validation($data['address']);

		$name          = mysqli_real_escape_string($this->db->link,$name);
		$email         = mysqli_real_escape_string($this->db->link,$email);
		$fathers_name  = mysqli_real_escape_string($this->db->link,$fathers_name);
		$mothers_name  = mysqli_real_escape_string($this->db->link,$mothers_name);
		$student_id    = mysqli_real_escape_string($this->db->link,$student_id);
		$dept          = mysqli_real_escape_string($this->db->link,$dept);
		$contact_1     = mysqli_real_escape_string($this->db->link,$contact_1);
		$contact_2     = mysqli_real_escape_string($this->db->link,$contact_2);
		$fb_id         = mysqli_real_escape_string($this->db->link,$fb_id);
		$linkedin_id   = mysqli_real_escape_string($this->db->link,$linkedin_id);
		$address       = mysqli_real_escape_string($this->db->link,$address);


		if (empty($name)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Name Field is required.</div>';
			return $msg;
		}elseif (empty($email)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Email Field is required.</div>';
			return $msg;
		}elseif (empty($student_id)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Student Id is required.</div>';
			return $msg;
		}elseif (empty($dept)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Dept is required.</div>';
			return $msg;
		}else{
			$query = "INSERT INTO tbl_join(name,email,fathers_name,mothers_name,student_id,dept,contact_1,contact_2,fb_id,linkedin_id,address) 
					VALUES('$name','$email','$fathers_name','$mothers_name','$student_id','$dept','$contact_1','$contact_2','$fb_id','$linkedin_id','$address')";
			
			$MessageInsert = $this->db->insert($query);

			if ($MessageInsert) {

				$body = $this->template->receiveConfirmation($name,$email);

				$this->mail->sendEmail($email,$body,'no-reply@buetcareerclub.org','Confirmation','BCC Confirmation');
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Form Submitted </div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> There Was an error.</div>';
			return $msg;
			}
		}

	}

	public function getAllSubmission(){
		$query = "SELECT * FROM tbl_join ORDER BY id DESC";

		return $this->db->select($query);
	}
	public function getAllVolunteerSubmission(){
		$query = "SELECT * FROM tbl_volunteer ORDER BY id DESC";

		return $this->db->select($query);
	}
	public function getAllSeenMessage(){
		$query = "SELECT * FROM tbl_join WHERE is_seen = '2' ORDER BY id DESC";

		return $this->db->select($query);
	}
	public function getMessageById($id){
		$query = "SELECT * FROM tbl_join WHERE id = '$id'";

		return $this->db->select($query);
	}

	public function deleteMessageById($id){
		$query = "DELETE FROM tbl_join WHERE id='$id'";

		$deleteConfirm = $this->db->delete($query);

		if ($deleteConfirm) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Message Deleted Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Message Not Deleetd</div>';
			return $msg;
			}
	}

	public function reply($data,$id){

		var_dump($data);
		exit();

		$to  = $data['to'];
		$from  = $data['from'];
		$subject  = $data['subject'];
		$message  = $data['message'];


		$send = mail($to, $subject, $message,$from);

		if ($send) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Message Sent Succesfully</div>';
				return $msg;
			self::markSentMailById($id);
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Message Not Sent</div>';
			return $msg;
			}

	}

	public function SeenMailbyId($id){
		$query = "UPDATE tbl_join SET 
		is_seen = '2' WHERE id = '$id'";

		$this->db->update($query);
	}
	public function markSentMailById($id){
		$query = "UPDATE tbl_join SET 
		is_replied = '2' WHERE id = '$id'";

		$this->db->update($query);
	}


	public function VoluenteerData($data){

		//var_dump($data); exit;


		$name          = $this->fm->validation($data['name']);
		$dept         = $this->fm->validation($data['dept']);
		$student_id  = $this->fm->validation($data['student_id']);
		$fb_id  = $this->fm->validation($data['fb_id']);
		$email    = $this->fm->validation($data['email']);
		$linkedin_id          = $this->fm->validation($data['linkedin_id']);
		$contact_1     = $this->fm->validation($data['contact_1']);
		$contact_2     = $this->fm->validation($data['contact_2']);
		$question_1         = $this->fm->validation($data['question_1']);
		$question_2   = $this->fm->validation($data['question_2']);
		$question_3       = $this->fm->validation($data['question_3']);
		$question_4       = $data['question_4'];
		$question_5       = $this->fm->validation($data['question_5']);
		$question_6       = $this->fm->validation($data['question_6']);

		$question_4_ans = implode(',', $question_4);


		$name          = mysqli_real_escape_string($this->db->link,$name);
		$dept          = mysqli_real_escape_string($this->db->link,$dept);
		$student_id          = mysqli_real_escape_string($this->db->link,$student_id);
		$fb_id          = mysqli_real_escape_string($this->db->link,$fb_id);
		$email          = mysqli_real_escape_string($this->db->link,$email);
		$linkedin_id          = mysqli_real_escape_string($this->db->link,$linkedin_id);
		$contact_1          = mysqli_real_escape_string($this->db->link,$contact_1);
		$contact_2          = mysqli_real_escape_string($this->db->link,$contact_2);


		if (empty($name)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Name Field is required.</div>';
			return $msg;
		}elseif (empty($email)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Email Field is required.</div>';
			return $msg;
		}elseif (empty($student_id)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Student Id is required.</div>';
			return $msg;
		}elseif (empty($dept)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Dept is required.</div>';
			return $msg;
		}else{
			$query = "INSERT INTO tbl_volunteer(name,dept,student_id,fb_id,email,linkedin_id,contact_1,contact_2,question_1,question_2,question_3,question_4,question_5,question_6) 
					VALUES('$name','$dept','$student_id','$fb_id','$email','$linkedin_id','$contact_1','$contact_2','$question_1','$question_2','$question_3','$question_4_ans','$question_5','$question_6')";
			
			$MessageInsert = $this->db->insert($query);

			if ($MessageInsert) {
				$body = $this->template->receiveConfirmation($name,$email);

				$this->mail->sendEmail($email,$body,'no-reply@buetcareerclub.org','Confirmation','BCC Confirmation');
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Form Submitted </div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> There Was an error.</div>';
			return $msg;
			}
		}

	}

	





}//end of class



 ?>