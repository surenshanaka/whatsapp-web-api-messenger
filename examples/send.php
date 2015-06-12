<!DOCTYPE html>
<html>
<head>
	<title>Whatsapp! Messenger</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="custom.css">	
	<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
</head>
<body>
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">			 				        		   
					<?php 
					if ( isset($_GET['success']) && $_GET['success'] == 1 )
					{					     
						echo '<div class="alert alert-success">';
						echo ' <a href="#" class="close" data-dismiss="alert"></a>';
				     	echo "Sent successfully";
				     	echo '</div>';
					}
				 	?>
			 	 
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active" id="login-form-link">Whatsapp! Messenger</a>
							</div>							
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="whatsappform" action="config.php" method="post" role="form" style="display: block;" enctype="multipart/form-data">
									<div class="form-group">
										<select class="form-control" name="receiver">
											<option value="">Choose a person</option>
											<option value="put here your number">put here your number</option>					
										</select>
										<!-- <input id="receiver" name="receiver" placeholder="94771234567" class="form-control input-md" type="text"> -->
									</div>
									<div class="form-group">
										<textarea class="form-control" id="message" name="message"></textarea>
									</div>
									<div class="form-group">
								  	<!-- <label class="col-md-4 control-label" for="filebutton">File Button</label> -->
								  	<div class="form-group">
									    <input id="image" name="image" class="input-file" type="file">
									  </div>
									</div>									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Send">
											</div>
										</div>
									</div>									
								</form>							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
	<script>
	// just for the demos, avoids form submit
	jQuery.validator.setDefaults({
	  // debug: true,
	  success: "valid"
	});
	$("#whatsappform").validate({
	  rules: {
	    receiver: {
	      required: true
	    }
	  }
	});
	</script>
</body>
</html>