<?php 
	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	
	include_once ($filepath.'/../helper/Format.php');
/**
* User Level Class
*/
class Slider{
	
	private $db;
	public $fm;
	
	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addSlider($data,$file){
		/*var_dump($data);
		var_dump($file);
		exit();*/
		$programme  = $this->fm->validation($data['programme']);
		$caption   = $this->fm->validation($data['caption']);
		

		$programme  = mysqli_real_escape_string($this->db->link,$programme);
		$caption   = mysqli_real_escape_string($this->db->link,$caption);
		

		$permittedImg = array('jpg','jpeg');

		$imgName  = $file['sliderimg']['name'];
		$imgSize  = $file['sliderimg']['size'];
		$imgTemp  = $file['sliderimg']['tmp_name'];
		$imgError = $file['sliderimg']['error'];

		$currentPath = realpath(dirname(__FILE__));

		$imgExtension = explode('.',$imgName);
		$imgExtension = strtolower(end($imgExtension));
		$uniqueName   = substr(md5(time()), 0,10).'.'.$imgExtension;
		$uploadPath   = $currentPath."/../file/img/".$uniqueName;


		if (empty($programme)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>programme Field is required.</div>';
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

				$query = "INSERT INTO  tbl_slider(image,programme,caption)
				VALUES('$uniqueName','$programme','$caption')";

				$Insert_Slider = $this->db->insert($query);

				if ($Insert_Slider) {
					$msg = '<div class="alert alert-success"><strong>Success!</strong> Slider Added Succesfully</div>';
					return $msg;
				}else{
					$msg = '<div class="alert alert-danger"><strong>Error!</strong> Slider Not added</div>';
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

	public function getAllSlides(){
		$query = "SELECT slider.*, programme.programmename FROM tbl_slider as slider, tbl_programme as programme WHERE slider.programme = programme.id order BY slider.id DESC";

		return $this->db->select($query);
	}

	public function getSlideById($id){
		$query = "SELECT * FROM tbl_slider WHERE id='$id'";

		return $this->db->select($query);
	}
	public function getSlideByProgramme($id=1){
		$query = "SELECT * FROM tbl_slider WHERE programme='$id' ORDER BY id DESC";

		return $this->db->select($query);
	}

	public function deleteSlideById($id){

		$getPost = $this->getSlideById($id);

		if ($getPost) {
			$currentPath = realpath(dirname(__FILE__));

			while ($delPost = $getPost->fetch_assoc()) {
				$img= $currentPath."/../file/img/".$delPost['image'];

				//echo $img; exit();

				unlink($img);

			}
		}


		$query = "DELETE FROM tbl_slider WHERE id='$id'";

		$deleteConfirm = $this->db->delete($query);

		if ($deleteConfirm) {
				$msg = '<div class="alert alert-success"><strong>Success!</strong> Slider Deleted Succesfully</div>';
				return $msg;
			}else{
				$msg = '<div class="alert alert-danger"><strong>Error!</strong> Slider Not Deletd</div>';
			return $msg;
			}
	}


	public function updateSliderById($data,$file,$id){

		$programme  = $this->fm->validation($data['programme']);
		$caption   = $this->fm->validation($data['caption']);
		

		$programme  = mysqli_real_escape_string($this->db->link,$programme);
		$caption   = mysqli_real_escape_string($this->db->link,$caption);
		

		$permittedImg = array('jpg','jpeg');

		$imgName  = $file['sliderimg']['name'];
		$imgSize  = $file['sliderimg']['size'];
		$imgTemp  = $file['sliderimg']['tmp_name'];
		$imgError = $file['sliderimg']['error'];

		$currentPath = realpath(dirname(__FILE__));

		$imgExtension = explode('.',$imgName);
		$imgExtension = strtolower(end($imgExtension));
		$uniqueName   = substr(md5(time()), 0,10).'.'.$imgExtension;
		$uploadPath   = $currentPath."/../file/img/".$uniqueName;


		if (empty($programme)) {
			$msg = '<div class="alert alert-danger"><strong>Error! </strong>Programme Field is required.</div>';
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
						$getSlideById = $this->getSlideById($id);

						if ($getSlideById) {
							$currentPath = realpath(dirname(__FILE__));

							while ($delSlideImg = $getSlideById->fetch_assoc()) {
								$img= $currentPath."/../file/img/".$delSlideImg['image'];

								//echo $img; exit();

								unlink($img);

							}
						}
						
						move_uploaded_file($imgTemp,$uploadPath);

						/*$query = "INSERT INTO tbl_post(name,programme,caption,postdata,email,password,fb,linkedin,image)
						VALUES('$title','$programme','$caption','$postdata','$tags','password','$memberfb','$memberlinkedin','$uniqueName')";*/

						$query = "UPDATE tbl_slider SET
							image = '$uniqueName',
							programme = '$programme',
							caption = '$caption'
							WHERE id = '$id'";

						$upadte_Slide = $this->db->update($query);

						if ($upadte_Slide) {
							$msg = '<div class="alert alert-success"><strong>Success!</strong> Slider Updated Succesfully</div>';
							return $msg;
						}else{
							$msg = '<div class="alert alert-danger"><strong>Error!</strong> Slider Not Updated</div>';
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
				$query = "UPDATE tbl_slider SET
							programme = '$programme',
							caption = '$caption'
							WHERE id = '$id'";

						$upadte_Slide = $this->db->update($query);

						if ($upadte_Slide) {
							$msg = '<div class="alert alert-success"><strong>Success!</strong> Slider Updated Succesfully</div>';
							return $msg;
						}else{
							$msg = '<div class="alert alert-danger"><strong>Error!</strong> Slider Not Updated</div>';
							return $msg;
						}

			}
		}
	

	}



	





}//end of class



 ?>