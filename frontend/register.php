<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// // Mail Function for Register User.

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Fetch user input from form
//     $name = $_POST['name'] ?? '';
//     $email = $_POST['email'] ?? '';  // User's input email

//     if (!empty($name) && !empty($email)) {
//         $mail = new PHPMailer(true); // Enable exceptions

//         try {
//             // Server settings
//             $mail->isSMTP();                                            // Send using SMTP
//             $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server
//             $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//             $mail->Username   = 'sawnaylinn2017@gmail.com';             // Admin's Gmail address
//             $mail->Password   = 'doid czgg bokc qqlx';                  // Admin's Gmail app password
//             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` is also accepted
//             $mail->Port       = 587;                                    // TCP port to connect to

//             // Sender
//             $mail->setFrom('sawnaylinn2017@gmail.com', 'Admin');         // Admin's email and name
           
//             // Recipient (User's email)
//             $mail->addAddress($email);                                  // Send to the email the user provided (e.g., example@gmail.com)

//             // Content
//             $mail->isHTML(true);                                        // Set email format to HTML
//             $mail->Subject = "Welcome to Our Website, $name!";
//             $mail->Body    = "
//                 Dear $name,<br><br>
//                 Thank for registering Welcome to our site<br><br>
//                 Best regards,<br>
//                 Admin Team";

//             // Send the email
//             $mail->send();
//             echo "Email successfully send to $email";
//         } catch (Exception $e) {
//             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//         }
//     } else {
//         echo "Please fill in all the required fields.";
//     }
// }

?>

<html>
<?php include ("frontendHeader.php"); ?>
	
	<!-- Content -->
	<div class="container my-5">

		<div class="row justify-content-center">
			<div class="col-8">
				<form action="signup.php" method="POST">
		      		<div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="small mb-1" for="inputName"> Name</label>
                              <input class="form-control py-4" id="inputName" type="text" placeholder="Enter Name" name="name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="small mb-1" for="phone">Phone Number</label>
                              <input class="form-control py-4" id="phone" type="text" placeholder="Enter Phone Number" name="phone" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                      	<label class="small mb-1" for="inputEmailAddress">Email</label>
                      	<input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" />
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="small mb-1" for="inputPassword">Password</label>
                              <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                              <font id="error" color="red"></font>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                              <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                              <font id="cerror" color="red"></font>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                      	<label class="small mb-1" for="address"> Address </label>
                      	<textarea class="form-control" name="address"></textarea>
                    </div>
		      		
		      		<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
		        		
		        		<button type="submit" class="btn btn-secondary mainfullbtncolor btn-block"> Create Account </button>
		      		</div>
		  		</form>

		  		<div class=" mt-3 text-center ">
		  			<a href="login.php" class="loginLink text-decoration-none">Have an account? Go to login</a>
		  		</div>
			</div>
		</div>
		
		
		

	</div>
	
	<?php include ("frontendFooter.php"); ?>





	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- BOOTSTRAP JS -->
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<script src="js/slick.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src="js/owl.carousel.js"></script>

</body>
</html>