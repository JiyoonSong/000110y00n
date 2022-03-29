<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div>
	<form action="registration.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<h1>Registration Page</h1>
					<hr class="mb-3">
					<label for="firstname">First Name</label>
					<input class="form-control" id="firstname" type="text" name="firstname" required>
					<label for="lastname">Last Name</label>
					<input class="form-control" id="lastname" type="text" name="lastname" required>
					<label for="email">Email</label>
					<input class="form-control" id="email" type="email" name="email" required>
					<label for="phoneNo">Phone Number</label>
					<input class="form-control" id="phoneNo" type="text" name="phoneNo" required>
					<label for="password">Password</label>
					<input class="form-control" id="password" type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-primary" id="register" type="submit" name="signUp" value="Sign Up">
				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid=this.form.checkValidity();

			if(valid){

			var firstname = $('#firstname').val();
			var lastname = $('#lastname').val();
			var email = $('#email').val();
			var phoneNo = $('#phoneNo').val();
			var password = $('#password').val();

				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {firstname: firstname, lastname: lastname, email: email, phoneNo: phoneNo, password: password},
					success: function(data){
					Swal.fire({
								'title':'Succesful',
								'text': data,
								'type':'success'
								})
					},
					error: function(data){
					Swal.fire({
								'title':'Errors',
								'text':'Error Occured',
								'type':'error'
								})
					}
				});
			}else{
				alert('false');
			}
		});

			
	});
</script>
</body>
</html>