<?php 

include "includes/config.php";

$images_sql = "SELECT * FROM images ORDER BY id desc limit 10";

$result = mysqli_query($con,$images_sql);

$row = mysqli_fetch_array($result);

$filename = $row['name'];
$image = $row['image'];
<?php

 $sql = "select image from images where id=1";
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);

 $image_src2 = $row['image'];
 
?>
<img src='<?php echo $image_src; ?>' >

?>
<!DOCTYPE html>
<html>
<head></head>
<body>

	<!-- Image -->
	<img src="upload/<?= $filename ?>" width="300px" height="300px" >

	<!-- Base64 image -->
	<img src="<?= $image ?>" width="300px" height="300px"  >
</body>
</html>