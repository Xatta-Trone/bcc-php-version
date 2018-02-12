<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User Level Class
*/
class Utilities{
	
	private $db;
	private $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllData(){
		$query = "SELECT * FROM tbl_utilities";

		return $this->db->select($query);
	}

	public function updateLogo($file){

		//var_dump($file);
		//exit();

		$permittedImg = array('png');

		$PrimaryimgName  = $file['primarylogo']['name'];
		$PrimaryimgSize  = $file['primarylogo']['size'];
		$PrimaryimgTemp  = $file['primarylogo']['tmp_name'];
		$PrimaryimgError = $file['primarylogo']['error'];

		$currentPath = realpath(dirname(__FILE__));

		$PrimaryimgExtension = explode('.',$PrimaryimgName);
		$PrimaryimgExtension = strtolower(end($PrimaryimgExtension));
		$PrimaryuniqueName   = 'main-logo'.'.'.$PrimaryimgExtension;
		$PrimaryuploadPath   = $currentPath."/../file/img/".$PrimaryuniqueName;


		$SecondaryimgName  = $file['secondarylogo']['name'];
		$SecondaryimgSize  = $file['secondarylogo']['size'];
		$SecondaryimgTemp  = $file['secondarylogo']['tmp_name'];
		$SecondaryimgError = $file['secondarylogo']['error'];

		$currentPath = realpath(dirname(__FILE__));

		$SecondaryimgExtension = explode('.',$SecondaryimgName);
		$SecondaryimgExtension = strtolower(end($SecondaryimgExtension));
		$SecondaryuniqueName   = substr(md5(time()), 0,10).'.'.$SecondaryimgExtension;
		$SecondaryuploadPath   = $currentPath."/../file/img/".$SecondaryuniqueName;



		if (!empty($PrimaryimgName) && !empty($SecondaryimgName)) {
			if ($PrimaryimgSize>2097152) {
			// 1048576 bit = 1MB
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Max img size is 2MB</div>';
			return $msg;
			}elseif (!empty($PrimaryimgExtension) && in_array($PrimaryimgExtension,$permittedImg)==false) {
				$msg = '<div class="alert alert-danger"><strong>Error! </strong>Image type is not allowed. Only';
				$msg .= implode(' , ', $permittedImg);
				$msg .= ' types are allowed</div>';
				return $msg;
			}elseif ($SecondaryimgSize>2097152) {
			// 1048576 bit = 1MB
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Max img size is 2MB</div>';
			return $msg;
			}elseif (in_array($SecondaryimgExtension,$permittedImg)==false) {
				$msg = '<div class="alert alert-danger"><strong>Error! </strong>Image type is not allowed. Only';
				$msg .= implode(' , ', $permittedImg);
				$msg .= ' types are allowed</div>';
				return $msg;
			}else{
				if ($PrimaryimgError=='0' && $SecondaryimgError == '0') {
					
					move_uploaded_file($PrimaryimgTemp,$PrimaryuploadPath);
					move_uploaded_file($SecondaryimgTemp,$SecondaryuploadPath);

					$query = "UPDATE tbl_utilities SET
						primarylogo = '$PrimaryuniqueName',
						secondarylogo = '$SecondaryuniqueName'";

					$UpdateImg = $this->db->update($query);

					if ($UpdateImg) {
						$msg = '<div class="alert alert-success"><strong>Success!</strong> Image Added Succesfully</div>';
						return $msg;
					}else{
						$msg = '<div class="alert alert-danger"><strong>Error!</strong> Image Not added</div>';
						return $msg;
					}
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> There Was a error with the file';
					$msg .= $imgError;
					$msg .= '</div>';
					return $msg;
				}	
			}
		}elseif (!empty($PrimaryimgName)) {
			if ($PrimaryimgSize>2097152) {
			// 1048576 bit = 1MB
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Max img size is 2MB</div>';
			return $msg;
			}elseif (!empty($SecondaryimgExtension) && in_array($PrimaryimgExtension,$permittedImg)==false) {
				$msg = '<div class="alert alert-danger"><strong>Error! </strong>Image type is not allowed. Only';
				$msg .= implode(' , ', $permittedImg);
				$msg .= ' types are allowed</div>';
				return $msg;
			}else{
				if ($PrimaryimgError=='0') {
					
					move_uploaded_file($PrimaryimgTemp,$PrimaryuploadPath);
					

					$query = "UPDATE tbl_utilities SET
						primarylogo = '$PrimaryuniqueName'";

					$UpdateImg = $this->db->update($query);

					if ($UpdateImg) {
						$msg = '<div class="alert alert-success"><strong>Success!</strong> Image Added Succesfully</div>';
						return $msg;
					}else{
						$msg = '<div class="alert alert-danger"><strong>Error!</strong> Image Not added</div>';
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
			if ($SecondaryimgSize>2097152) {
			// 1048576 bit = 1MB
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Max img size is 2MB</div>';
			return $msg;
			}elseif (in_array($SecondaryimgExtension,$permittedImg)==false) {
				$msg = '<div class="alert alert-danger"><strong>Error! </strong>Image type is not allowed. Only';
				$msg .= implode(' , ', $permittedImg);
				$msg .= ' types are allowed</div>';
				return $msg;
			}elseif(!empty($SecondaryimgName)){
				if ($SecondaryimgError=='0') {
					
					move_uploaded_file($SecondaryimgTemp,$SecondaryuploadPath);
					

					$query = "UPDATE tbl_utilities SET
						secondarylogo = '$SecondaryuniqueName'";

					$UpdateImg = $this->db->update($query);

					if ($UpdateImg) {
						$msg = '<div class="alert alert-success"><strong>Success!</strong> Image Added Succesfully</div>';
						return $msg;
					}else{
						$msg = '<div class="alert alert-danger"><strong>Error!</strong> Image Not added</div>';
						return $msg;
					}
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> There Was a error with the file';
					$msg .= $imgError;
					$msg .= '</div>';
					return $msg;
				}	
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> No image added</div>';
						return $msg;

			}
		}
	}



	public function UpdateHeaderFooter($data){
		$googleanalytics      = $this->fm->validation($data['googleanalytics']);
		$header               = $this->fm->validation($data['header-text']);
		$footer               = $this->fm->validation($data['footer-text']);


		if (empty($googleanalytics)) {
			$msg = '<div class="alert alert-danger"><strong>Error!</strong> Analytics Code Required</div>';
			return $msg;
		}elseif (empty($footer)) {
			$msg = '<div class="alert alert-danger"><strong>Error!</strong> Analytics Code Required</div>';
			return $msg;
		}else{
			$query = "UPDATE tbl_utilities SET
			footer_text = '$footer',
			google_analytics = '$googleanalytics',
			header_text = '$header'";

			$Update = $this->db->update($query);

			if ($Update) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Data Updated Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Data Not Updated</div>';
				return $msg;
			}
		}

		
	}

	public function SocialLinks($data){
		$fb      = $this->fm->validation($data['fb']);
		$twitter               = $this->fm->validation($data['twitter']);
		$linkedin               = $this->fm->validation($data['linkedin']);
		$youtube               = $this->fm->validation($data['youtube']);


			$query = "UPDATE tbl_utilities SET
			fb = '$fb',
			twitter = '$twitter',
			linkedin = '$linkedin',
			youtube = '$youtube'";

			$Update = $this->db->update($query);

			if ($Update) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Data Updated Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Data Not Updated</div>';
				return $msg;
			}
		

		
	}

	public function ContactData($data){
		$email      = $this->fm->validation($data['email']);
		$phone               = $this->fm->validation($data['phone']);
		$address               = $this->fm->validation($data['address']);


			$query = "UPDATE tbl_utilities SET
			email = '$email',
			phone = '$phone',
			address = '$address'";

			$Update = $this->db->update($query);

			if ($Update) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Data Updated Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Data Not Updated</div>';
				return $msg;
			}
		
	}

	public function title($title){
		$title = strtolower($title);

		//var_dump($title); exit;
		if ($title == 'index') {
			$title = "Home";
		}elseif($title == 'contact'){
			$title = 'contact';
		}elseif ($title == 'blog') {
			$title = 'blog';
		}elseif ($title == 'buet-Rostrum') {
			$title = 'Buet Rostrum';
		}elseif ($title == 'Cracking-gre') {
			$title = 'Cracking GRE';
		}elseif ($title == 'Duke-of-Edinburghs') {
			$title = 'Duke of Edinburgh';
		}elseif ($title == 'editptofile') {
			$title = 'Profile Edit';
		}elseif ($title =='higher-study') {
			$title = 'Higher Study';
		}elseif ($title == 'news-events') {
			$title = 'News & Events';
		}elseif ($title == 'post') {
			$title = 'Post';
		}elseif ($title == 'profile') {
			$title = 'profile';
		}elseif ($title == 'programs') {
			$title = 'programs';
		}elseif ($title == 'public-private-job') {
			$title = 'Public & Private Jobs';
		}elseif ($title == 'register') {
			$title = 'Join';
		}elseif ($title == 'single-news-post') {
			$title = 'single news post';
		}elseif ($title == 'team') {
			$title = 'team';
		}elseif ($title == 'voluenteer') {
			$title = 'voluenteer';
		}elseif ($title == 'women-wing') {
			$title = 'women wing';
		}elseif ($title == 'alumni') {
			$title = 'alumni';
		}elseif ($title == 'moderator') {
			$title = 'moderator';
		}else{
			$title == '';
		}
		return $title= ucwords($title);

	}

	public function nameShorten($name){
		$arrayName = explode(" ",$name);
		$firstname = $arrayName[0];

		return $firstname;


	}

	public function imgUpload($file){
		//$password = self::randomPassword();
		//var_dump($data);
		//var_dump($file);
		//var_dump($password);
		//exit();
		//$md_password = md5($password);

		
		/*$membername      = $this->fm->validation($data['membername']);
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
		$memberlinkedin  = mysqli_real_escape_string($this->db->link,$memberlinkedin);*/


		$permittedImg = array('jpg','jpeg');

		$imgName  = $file['image']['name'];
		$imgSize  = $file['image']['size'];
		$imgTemp  = $file['image']['tmp_name'];
		$imgError = $file['image']['error'];

		$currentPath = realpath(dirname(__FILE__));

		$imgExtension = explode('.',$imgName);
		$imgExtension = strtolower(end($imgExtension));
		$uniqueName   = substr(md5(time()), 0,10).'.'.$imgExtension;
		$uploadPath   = $currentPath."/../file/img/".$uniqueName;

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
				
				$imgupload  = move_uploaded_file($imgTemp,$uploadPath);


				if ($imgupload) {

					$msg = '<div class="alert alert-success"><strong>Success!</strong> Img Added Succesfully</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> Img Not added</div>';
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




}//end of class



 ?>