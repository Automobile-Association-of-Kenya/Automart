<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Validate Assessment Report</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.css" integrity="sha512-4wfcoXlib1Aq0mUtsLLM74SZtmB73VHTafZAvxIp/Wk9u1PpIsrfmTvK0+yKetghCL8SHlZbMyEcV8Z21v42UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="styles1.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<div class="bg">
		<div class="circle">
			
		</div>
		
	</div>
	<div class="container">
		<div class="image">
			<img src="logo.png" alt="AAK LOGO">
			
		</div>
		
	</div>
	<div id="wrapper">
	<div class="form-container">
		<span class="form-heading">Validate AAK Assessment Report</span>
		<form  method="post">
			<div class="alert alert-success" role="alert" id="error_palign" >
				
         </div>
			<!--<div class="input-group">
				<i class="fas fa-user"></i>
				<input type="text" placeholder="Email...." name="email" id="email" required>
				<span class="bar align-center" id="error_email" style="color: darkred;">i can see you</span>
			</div>-->
			<br>
			<div class="input-group">
				<i class="fas fa-lock"></i>
				<input type="text" placeholder="Enter Report No.." name="cert" id="cert" required>
				<span class="bar align-center" id="error_password" style="color: darkred;">I can see you</span>
			</div>
			<br>
			<div class="input-group">
				<button type="submit" name="submit" id="submit">
					<i class="fab fa-telegram-plane"></i>
				</button>
			</div>
			

			<div id="error_gf" class="switch-login">
				<iframe src="https://giphy.com/embed/QAPQujznKdHeiX5V3w" width="100" height="70" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p></p>
			</div>
			<div class="switch-login" id="btn_loader">
				<iframe src="https://giphy.com/embed/hL9q5k9dk9l0wGd4e0" width="100" height="70" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p></p>
				
			</div>
			<br>
			
			
			


			
		</form>
		
	</div>
	</div>
	<script >
		$(document).ready(function(){
			//alert('ready');
			$('#submit').attr('disabled','disabled');
			//$('#btn_error').hide();
			$('#btn_loader').hide();
			$('#error_gf').hide();
			$('#error_palign').hide();
			$('#error_email').hide();
			$('#error_password').hide();
			// validation error
		
			var cert_error = false;

			$('#certi').focusout(function(){
				check_cert();
			});

			

			function check_cert(){
				var cert = $('#certi').val();
				if (cert == '') {
					var cert_error = 'Please Enter Report No. ';
					$('#error_password').show();
					$('#error_password').text(cert_error);
					$('#submit').attr('disabled','disabled');
					$('#btn_error').show();
					$('#error_gf').show().fadeOut(5000);
					$('#btn_error').text("Careful Now! Button Can't submit with an error");
					 cert_error = true;
					 return true;

				}else{
					var cert_error = '';
						$('#btn_error').hide();
						$('#error_password').text(cert_error);
						$('#btn_error').hide();
						$('#submit').removeAttr('disabled','disabled');
				}
			}

			$('#submit').on('click',function(e){
				e.preventDefault();
				var email1_error = false;
				var cert_error = false;

			//	check_email();
				check_cert();

				if ( cert_error == false) {
			
					var cert = $('#certi').val();
				//	alert(email);
				$.ajax({
						url:'code.php',
						type:'POST',
						data:{btn:'ass_validate',cert:cert},
						success:function(data){
						    $('#btn_loader').show().fadeOut(8000);
							$('#error_palign').show();
							$('#error_palign').html(data);

						}

					});
					return true;

				}else{
					//alert('couldnt submit');
					$('#btn_error').show();
					$('#error_gf').show().fadeOut(5000);
					$('#btn_error').text("Connection to the server could not be established. Reloading...");
					
					location.reload();
					return false;
				}

			});




		/*	$('#signin').on('click',function(){
				location.href = 'reg.php';
			});
			$('#reset').on('click',function(){
				location.href = 'reset.html';
			})*/

		});
	</script>

</body>
</html>