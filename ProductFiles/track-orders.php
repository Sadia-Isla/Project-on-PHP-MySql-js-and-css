<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter">
	    <meta name="robots" content="all">
		
		<title>Track Orders</title>
	    	    
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link rel="stylesheet" href="assets/css/footer.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		<link rel="stylesheet" href="assets/css/upload.css">
		<!------------ JS Library--------->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
	<!------------------HEADER --------------->
	</head>
    <body class="cnt-home">	
	   <header class="header-style-1">			
		<?php include('includes/top-header.php');?>

		<?php include('includes/main-header.php');?>
			
		<?php include('includes/menu-bar.php');?>

		</header>
<!------------------HEADER --------------->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'> Upload Images</li>
			</ul>
		</div>
	</div>
</div>

<div class="container">
      <h2 style="text-align:center;">Upload Image </h2>
        <div class="row">
         <div class="col-md-4"></div>  
          <div class="col-md-4" style="margin-top:20px;margin-bottom:20px;">
          <span class="ajax-message"></span>
            <form id="submitForm">
              <div class="form-group">
                <label for="file">Select File</label>
                <input type="file" class="form-control" name="file" id="image" required="">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn btn-block">Upload</button>
              </div>  
            </form>
          </div>
        </div>
      <div class="row">
      <div class="col-md-4"></div>  
        <div class="card col-md-4" id="preview" style="display: none;">
          <div class="card-body" id="imageView">
                   
          </div>
        </div>    
      </div>
	  

<!---jQuery ajax file upload --->
<script type="text/javascript">
  $(document).ready(function(){
      $("#submitForm").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          url  : "upload.php",
          type : "POST",
          cache:false,
          data :formData,
          contentType : false, 
          processData: false,
          success:function(response){
            $("#preview").show();
            $("#imageView").html(response);
            $("#image").val('');
            data = JSON.parse(response);
            if (data.error == '1') {
              $("#preview").hide();
            }
            else if(data.error =='0'){
              $('.ajax-message').replaceWith('<div class="alert alert-danger alert-dismissible" role="alert">'
                 + data.message + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
              $("#preview").hide();
            }
          }
        });
      });
  });
</script>


<?php echo include('includes/brands-slider.php');?>
</div>
</div>

<?php include('includes/footer.php');?>

<!------------ JS Library ---------->
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/upload.js"></script>
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
				

</body>
</html>

 
