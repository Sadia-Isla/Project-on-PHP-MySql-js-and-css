<?php
	
	// Include database connectivity
	
	include('includes/Config.php');
	
	// upload file using move_uploaded_file function in php
	
	if (!empty($_FILES['file']['name'])) {

		$fileName = $_FILES['file']['name'];
		
		$fileExt = explode('.', $fileName);
		$fileActExt = strtolower(end($fileExt));
		$allowImg = array('png','jpeg','jpg');
		$fileNew = rand() . "." . $fileActExt;  
		$filePath = 'uploads/'.$fileNew; 

		if (in_array($fileActExt, $allowImg)) {
			if ($_FILES['file']['size'] > 0  && $_FILES['file']['error']==0) {
				$query = "INSERT INTO files(image) VALUES('$fileNew')";
				if (mysqli_query($con, $query)) {
					move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
					echo '<img src="'.$filePath.'" style="width:320px; height:300px;"/>';
				}else{
					echo json_encode(array('error'=>'0', 'message'=>'File is not uploaded try again'));
				}	
			}else{
				echo json_encode(array('error'=>'0', 'message'=>'Unable to upload physical file'));
			}
		}else{	
			echo json_encode(array('error'=>'0', 'message'=>'Only PNG, JPEG, JPG image allow'));
		}
	}

?>