<!-- 

STEPS FOR LOGGING IN A USER

1. The user will log in with a form. 
2. Our script will search for the username in the database.
3. If the username is found, it hashes the submitted password and compares it with the hashed password from the database.
4. If the hashes match, then it sets a value in the session to the user ID and redirects to a post-login page (ex. profile).

NOTE: Regardless of whether the username is not found or the password doesn't match, you should have a generic error message. The reason is so that it makes it harder for someone to check if a username exists.  

-->

<?php

if (isset($_POST['login'])) {

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if ($username && $password) {

		$statement = $connection->prepare("SELECT * FROM users WHERE users = ?");
		$statement->bind_param("s", $username);
		$statement->execute();
		$result = $statement->get_result();

		if ($result->num_rows === 1) {
			$row = $result->fetch_assoc();
			/* 
				password_verify is the companion to password_hash. It takes two arguments:
				1. the plain text password (that the user submitted)
				2. the hashed password (which we have stored in our database)
						 
				The method will then return either TRUE or FALSE. That's it. We don't need to add any configuration settings (indicating the algorithm or the cost factor) because the hash already has enough information in there to let the PHP know what to do. 
			*/
			if (password_verify($password, $row['hashed_pass'])) {
				/* 
							
					These are our access tokens: authenticated access maintained using user ID in a SESSION. These are stored in a file on the server.

					However, SESSIONs are vulnerable to session hijacking and session fixation attacks. This is when a hacker imitates a user in their logged in state by trying to obtain a user's session identifier.

					In session hijacking, the hacker tries to extract session_id data; in fixation attacks, the hacker already has a 'fixed' session_id. They will usually trick the user into logging on somewhere and authenticating, so they can then slip in.
								
					https://www.invicti.com/blog/web-security/session-fixation-attacks/
							
				*/

				// To protect access tokens, we can use HTTPS, secure session cookies in php.ini on the server, or use the method here. This way, if someone steals our session_id, it doesn't matter because it's regenerated every time we log in.
				session_regenerate_id();

				$_SESSION['username'] = $username;

				// This is to keep track of how long a user is logged in for. We can then require them to reauthenticate after a certain time period.
				$_SESSION['last_login'] = time();

				// This method takes a plain text argument (one day later, at midnight) and converts it to a time stamp.
				$_SESSION['login_expires'] = strtotime("+1 day midnight");

				header('Location: admin.php');
			}

			// If we really wanted to be secure here, we could track how many failed attemps at logging in someone has within a certain time frame. If they make (and fail) a certain amount of attempts, we could lock them out.
			else {
				$message = "<p class=\"text-warning\">Invalid username or password</p>";
			}
		} else {
			$message = "<p class=\"text-warning\">Invalid username or password</p>";
		}

	} else {
		$message = "<p class=\"text-warning\">Both fields are required.</p>";
	}
}

?>