<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User Level Class
*/
class Post{
	
	private $db;
	public $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addPost($data,$file){
		/*var_dump($data);
		var_dump($file);
		exit();*/
		$title      = $this->fm->validation($data['title']);
		$programme  = $this->fm->validation($data['programme']);
		$posttype   = $this->fm->validation($data['posttype']);
		$postdata   = $this->fm->validation($data['postdata']);
		$tags       = $this->fm->validation($data['tags']);
		

		$title      = mysqli_real_escape_string($this->db->link,$title);
		$programme  = mysqli_real_escape_string($this->db->link,$programme);
		$posttype   = mysqli_real_escape_string($this->db->link,$posttype);
		//$postdata   = mysqli_real_escape_string($this->db->link,$postdata);
		$tags       = mysqli_real_escape_string($this->db->link,$tags);

		$user_id = Session::get('userId');
		

		$permittedImg = array('jpg','jpeg');

		$imgName  = $file['postimg']['name'];
		$imgSize  = $file['postimg']['size'];
		$imgTemp  = $file['postimg']['tmp_name'];
		$imgError = $file['postimg']['error'];

		$currentPath = realpath(dirname(__FILE__));

		$imgExtension = explode('.',$imgName);
		$imgExtension = strtolower(end($imgExtension));
		$uniqueName   = substr(md5(time()), 0,10).'.'.$imgExtension;
		$uploadPath   = $currentPath."/../file/img/".$uniqueName;


		if (empty($title)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>title Field is required.</div>';
			return $msg;
		}elseif (empty($programme)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>programme Field is required.</div>';
			return $msg;
		}elseif (empty($posttype)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Post Type Field is required.</div>';
			return $msg;
		}elseif (empty($postdata)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Post body Field is required.</div>';
			return $msg;
		}elseif (empty($tags)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Tags Field is required.</div>';
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

				$query = "INSERT INTO tbl_post(title,programme,posttype,body,tags,image,user)
				VALUES('$title','$programme','$posttype','$postdata','$tags','$uniqueName','$user_id')";

				$Insert_member = $this->db->insert($query);

				if ($Insert_member) {
					$msg = '<div class="alert alert-success"><strong>Success!</strong> Post Added Succesfully</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> Post Not added</div>';
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

	public function getAllPost(){
		$query = "SELECT post.*, programme.programmename, member.name FROM tbl_post as post, tbl_programme as programme, tbl_member as member WHERE post.programme = programme.id AND post.user = member.id order BY post.id DESC";

		return $this->db->select($query);
	}
	public function getAllPostByProgramme($id =1){
		$query = "SELECT post.*, programme.programmename, member.name FROM tbl_post as post, tbl_programme as programme, tbl_member as member WHERE post.programme = programme.id AND post.user = member.id AND post.programme = $id order BY post.id DESC";

		return $this->db->select($query);
	}
	public function getPostByType($type = 1){
		$query = "SELECT post.*, programme.programmename, member.name FROM tbl_post as post, tbl_programme as programme, tbl_member as member WHERE post.programme = programme.id AND post.user = member.id AND post.posttype = $type order BY post.id DESC";

		return $this->db->select($query);
	}
	public function getLimitedPost($per_page = 12,$start_from = 0){
		$query = "SELECT post.*, programme.programmename, member.name FROM tbl_post as post, tbl_programme as programme, tbl_member as member WHERE post.programme = programme.id AND post.user = member.id AND post.posttype = 1 order BY post.id DESC LIMIT $start_from,$per_page";

		return $this->db->select($query);
	}
	public function getLimitedPostByType($per_page = 12,$start_from = 0,$type = 1){
		$query = "SELECT post.*, programme.programmename, member.name FROM tbl_post as post, tbl_programme as programme, tbl_member as member WHERE post.programme = programme.id AND post.user = member.id AND NOT post.posttype=$type order BY post.id DESC LIMIT $start_from,$per_page";

		return $this->db->select($query);
	}

	public function getAllPostById($id){
		$query = " SELECT tbl_post.*, tbl_programme.programmename FROM(tbl_post INNER JOIN tbl_programme ON tbl_programme.id=tbl_post.programme) WHERE tbl_post.user = '$id'";

		return $this->db->select($query);
	}

	public function Pagaination($per_page =12){
		$query = "SELECT * FROM tbl_post";
		$result = $this->db->select($query);
		if ($result) {
			$total_rows = mysqli_num_rows($result);
			$total_pages = ceil($total_rows/$per_page);
			return $total_pages;
		}
		
	}

	public function getPostById($id){
		$query = "SELECT * FROM tbl_post WHERE id='$id'";

		return $this->db->select($query);

	}
	public function getRecentPost($limit = 3){
		$query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT $limit";

		return $this->db->select($query);

	}

	public function getSinglePostById($id){
		self::updatePostviewById($id);
		$query = "SELECT post.*, programme.programmename, member.name FROM tbl_post as post, tbl_programme as programme, tbl_member as member WHERE post.programme = programme.id AND post.user = member.id AND post.id='$id'";
		return $this->db->select($query);
	}

	public function deletePostById($id){

		$getPost = $this->getPostById($id);

		if ($getPost) {
			$currentPath = realpath(dirname(__FILE__));

			while ($delPost = $getPost->fetch_assoc()) {
				$img= $currentPath."/../file/img/".$delPost['image'];

				//echo $img; exit();

				unlink($img);

			}
		}


		$query = "DELETE FROM tbl_post WHERE id='$id'";

		$deleteConfirm = $this->db->delete($query);

		if ($deleteConfirm) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Post Deleted Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Post Not Deletd</div>';
			return $msg;
			}
	}


	public function updatePostById($data,$file,$id){

		$title      = $this->fm->validation($data['title']);
		$programme  = $this->fm->validation($data['programme']);
		$posttype   = $this->fm->validation($data['posttype']);
		$postdata   = $this->fm->validation($data['postdata']);
		$tags       = $this->fm->validation($data['tags']);
		

		$title      = mysqli_real_escape_string($this->db->link,$title);
		$programme  = mysqli_real_escape_string($this->db->link,$programme);
		$posttype   = mysqli_real_escape_string($this->db->link,$posttype);
		//$postdata   = mysqli_real_escape_string($this->db->link,$postdata);
		$tags       = mysqli_real_escape_string($this->db->link,$tags);
		

		$permittedImg = array('jpg','jpeg');

		$imgName  = $file['postimg']['name'];
		$imgSize  = $file['postimg']['size'];
		$imgTemp  = $file['postimg']['tmp_name'];
		$imgError = $file['postimg']['error'];

		$currentPath = realpath(dirname(__FILE__));

		$imgExtension = explode('.',$imgName);
		$imgExtension = strtolower(end($imgExtension));
		$uniqueName   = substr(md5(time()), 0,10).'.'.$imgExtension;
		$uploadPath   = $currentPath."/../file/img/".$uniqueName;


		if (empty($title)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Title Field is required.</div>';
			return $msg;
		}elseif (empty($programme)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Programme Field is required.</div>';
			return $msg;
		}elseif (empty($posttype)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Post Type Field is required.</div>';
			return $msg;
		}elseif (empty($postdata)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Post Data Field is required.</div>';
			return $msg;
		}elseif (empty($tags)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Tags Field is required.</div>';
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
						$getPostById = $this->getPostById($id);

						if ($getPostById) {
							$currentPath = realpath(dirname(__FILE__));

							while ($delpostImg = $getPostById->fetch_assoc()) {
								$img= $currentPath."/../file/img/".$delpostImg['image'];

								//echo $img; exit();

								unlink($img);

							}
						}
						
						move_uploaded_file($imgTemp,$uploadPath);

						/*$query = "INSERT INTO tbl_post(name,programme,posttype,postdata,email,password,fb,linkedin,image)
						VALUES('$title','$programme','$posttype','$postdata','$tags','password','$memberfb','$memberlinkedin','$uniqueName')";*/

						$query = "UPDATE tbl_post SET
							title = '$title',
							programme = '$programme',
							posttype = '$posttype',
							body = '$postdata',
							tags = '$tags',
							image = '$uniqueName'
							WHERE id = '$id'";

						$upadte_Post = $this->db->update($query);

						if ($upadte_Post) {
							$msg = '<div class="alert alert-success"><strong>Success!</strong> Post Updated Succesfully</div>';
							return $msg;
						}else{
							$msg = '<div class="alert alert-danger"><strong>Error!</strong> Post Not Updated</div>';
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
				$query = "UPDATE tbl_post SET
							title = '$title',
							programme = '$programme',
							posttype = '$posttype',
							body = '$postdata',
							tags = '$tags'
							WHERE id = '$id'";

						$upadte_Post = $this->db->update($query);

						if ($upadte_Post) {
							$msg = '<div class="alert alert-success"><strong>Success!</strong> Post Updated Succesfully</div>';
							return $msg;
						}else{
							$msg = '<div class="alert alert-danger"><strong>Error!</strong> Post Not Updated</div>';
							return $msg;
						}

			}
		}


	}



	public function updatePostviewById($id){
		$query = "SELECT * FROM tbl_post WHERE id= '$id'";
		$result = $this->db->select($query);

		while ($data = $result->fetch_assoc()) {
			$views = $data['views'];

			$new_view = (int)$views + 1;

			$query ="UPDATE tbl_post SET views ='$new_view' WHERE id='$id'";

			return $this->db->update($query);
		}
	}



	





}//end of class



 ?>