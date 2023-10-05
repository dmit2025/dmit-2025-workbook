<?php

$validation = "";

function clean_input($input)
{
	$input = trim($input);
	$input = filter_var($input, FILTER_SANITIZE_STRING);
	return $input;
}

if (isset($_POST['send'])) {
	$name = clean_input($_POST['name']);
	$email = clean_input($_POST['email']);
	$message = clean_input($_POST['message']);
	$is_form_valid = TRUE;

	// please do more!!!!!!

	if (!$name || !$email || !$message) {
		$is_form_valid = false;
		$validation .= "Please fill out all fields.";
	}
}

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Contact Form</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	</head>

	<body class="d-flex align-items-center justify-content-center min-vh-100">
		<section class="container">
			<div class="row align-items-center">
				<div class="col-md-5">
					<h2 class="display-4 fw-light">We'd love to hear from you!</h2>
					<p class="text-muted">Whether you have a question, comment, or just want to say hello, please don't hesitate to get in touch with us using the form below. Our team will do our best to respond to your message as soon as possible.</p>
				</div>
				<div class="col-md-6 offset-md-1">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<?php if (isset($validation)): ?>
							<p class="text-warning">
								<?php echo $validation; ?>
							</p>
						<?php endif ?>

						<div class="mb-3">
							<label for="name" class="form-label">Your Name</label>
							<input type="text" name="name" id="name" value="<?php echo $name; ?>" class="form-control">
						</div>

						<div class="mb-3">
							<label for="email" class="form-label">Email Address</label>
							<input type="text" name="email" id="email" value="<?php echo $email; ?>"
								class="form-control">
						</div>

						<div class="mb-3">
							<label for="message" class="form-label">Message</label>
							<textarea name="message" id="message"
								class="form-control"><?php echo $message; ?></textarea>
						</div>

						<input type="submit" name="send" value="Send Email" class="btn btn-primary">
					</form>
				</div>
			</div>
		</section>
	</body>

</html>