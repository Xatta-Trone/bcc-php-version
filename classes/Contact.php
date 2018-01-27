<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');

	include_once ('Mail.php');
	include_once ('MailTemplate.php');
/**
* User Level Class
*/
class Contact{
	
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

	public function InsertMessage($data){
		$fname  = $this->fm->validation($data['fname']);
		$lname  = $this->fm->validation($data['lname']);
		$email  = $this->fm->validation($data['email']);
		$subject  = $this->fm->validation($data['subject']);
		$message  = $this->fm->validation($data['message']);

		$fname = mysqli_real_escape_string($this->db->link,$fname);
		$lname = mysqli_real_escape_string($this->db->link,$lname);
		$email = mysqli_real_escape_string($this->db->link,$email);
		$subject = mysqli_real_escape_string($this->db->link,$subject);
		$message = mysqli_real_escape_string($this->db->link,$message);


		if (empty($fname)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>First Name Field is required.</div>';
			return $msg;
		}elseif (empty($lname)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Last Name Field is required.</div>';
			return $msg;
		}elseif (empty($email)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Email Field is required.</div>';
			return $msg;
		}elseif (empty($message)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Message Field is required.</div>';
			return $msg;
		}else{
			$query = "INSERT INTO tbl_contact(fname,lname,email,subject,body) VALUES('$fname','$lname','$email','$subject','$message')";
			$MessageInsert = $this->db->insert($query);

			$name = $fname.' '.$lname;

			$body = $this->template->receiveConfirmation($name,$email);

			$this->mail->sendEmail($email,$body,'no-reply@buetcareerclub.org','Confirmation','BCC Confirmation');

			if ($MessageInsert) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Message Sent Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Message Not Sent</div>';
			return $msg;
			}
		}

	}

	public function getAllUnseenMessage(){
		$query = "SELECT * FROM tbl_contact WHERE is_seen = '1' ORDER BY id DESC";

		return $this->db->select($query);
	}
	public function getAllSeenMessage(){
		$query = "SELECT * FROM tbl_contact WHERE is_seen = '2' ORDER BY id DESC";

		return $this->db->select($query);
	}
	public function getMessageById($id){
		$query = "SELECT * FROM tbl_contact WHERE id = '$id'";

		return $this->db->select($query);
	}

	public function deleteMessageById($id){
		$query = "DELETE FROM tbl_contact WHERE id='$id'";

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

		//var_dump($data);
		//exit();

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
		$query = "UPDATE tbl_contact SET 
		is_seen = '2' WHERE id = '$id'";

		$this->db->update($query);
	}
	public function markSentMailById($id){
		$query = "UPDATE tbl_contact SET 
		is_replied = '2' WHERE id = '$id'";

		$this->db->update($query);
	}

	





}//end of class



 ?>