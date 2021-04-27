<?php include "includes/config.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<link rel="stylesheet" href="assets/css/upload.css">
</head>
<body>
     <a href="track-orders.php">&#8592;</a>
     <?php 
          $sql = "SELECT * FROM images ORDER BY id DESC";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<img src="uploads/<?=$images['image_url']?>">
             </div>
          		
    <?php } }?>
</body>
</html>