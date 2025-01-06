# Secure Login

## Hashing & Storing Passwords

The single most important rule about passwords is to *never store them in plain text*. If they aren't hashed, then anyone who has access to the database would have every user's password. 

*Note*: This may include other admins or co-workers, but it could also include hackers. It's also extremely possible that it could be leaked from a backup or from a decommissioned hard drive.

Since users often reuse usernames and passwords, if your organisation is ever the cause of a leak, you will inadvertently compromise the security of other websites. 


### Hashes

A *hashing algoritm* will take a plain text password and turn it into a big long string of characters. It is a one-way operation, so it cannot be reversed or decrypted. 

*Note*: But how could it be only one way? Imagine I took a book, removed all of the spaces and vowels, then alphabetised the remaining glyphs. With so much of the original information discarded, would you be able to figure out how it was originally supposed to look? 

When we register a user, we need to hash their password and then store the hashed value in our database (using the `INSERT` statement). PHP has language-defined functions to do this for us:

```PHP
    // The second argument is which hashing algorithm you'd like to use. PHP's current default is bcrypt.  
    password_hash($password, PASSWORD_DEFAULT);

    // If you prefer, you can specify it, and include options like the cost factor.
    password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);
```

If you echo out the result, then refresh, you'll see that the result changes. The reason is that while the hash will always be the same, this function also adds salt. Salt is about 22 characters of randomised data that the algorithm generates. 


### Comparing Hashes

Wait, so how does this work? If the only thing we're storing are hashed versions of a password (which looks like jumbled garbage) and the same password can generate multiple _unique_ hashes, how do we know if the user typed in the correct thing? 

Well, when a user logs in, we hash whatever they typed into the password input. Then, we'll compare that hash to whatever password hash we have stored in the database. It's likely that they will not be identical, but PHP has a built-in function to check if it's possible that two hashes originated from the same source (i.e. the original plain text passwords).

```PHP
    password_verify($login_password, $database_password);
```


## Static Logins

Although this isn't common practice, today we'll be creating a `users` table with an administrative username and password already created for us. Of course, this means we'll need to use a generated password hash and insert it into our table, as there is no registration form. 

Another way of creating a static account like this is by creating a text file in the `data/` folder and reading the credentials from file whenever the user wishes to log in. 


## Making Things More Secure

No application is perfectly secure. Even if we follow all of our best practices, there may be bugs or flaws revealed at a later date that cause our application to be vulnerable. However, if we approach security as a multi-layered net rather than one great big wall, we can make our applications more secure.

In the case of logins, we can:

1. Make login sessions expire. After a certain amount of time has elapsed since the last login, we can kick our user out. Banking applications and even Moodle uses this technique.

2. Store session data securely. By default, PHP stores session data on the server-side in a secure manner. Verify that the session files are stored in a secure directory that is not accessible from the web root.

3. Use secure connections. Enable HTTPS on your website to encrypt the communication between the server and the client. Make sure the entire login process and authenticated areas of your site are accessed over HTTPS.

    Note: This is not something that we have set up on our student server. 

4. Validate session data. Ensure that you validate and sanitize any session data before using it in your application to prevent potential security vulnerabilities. Apply appropriate sanitization and validation measures depending on the context in which the session data is used.

5. Store minimal information in sessions. Ensure that you avoid storing sensitive data, such as passwords or personally identifiable information (PII), in sessions. Store only the necessary information required to identify the user's session and retrieve additional information securely from a trusted data source when needed.

6. Protect against session hijacking. Implement additional measures such as IP validation and user-agent validation to detect and prevent session hijacking attacks. Compare the client's IP address and user-agent with the ones stored in the session to check for any discrepancies.

    Note: There are some laws concerning storing user IP information (ex. in the EU and the 'right to be forgotten') and will require a separate page on your website explaining your data governance policies (i.e. what information you collect, why, how it's stored, and how the user can opt-out). 

So, how do we grab that information?

```PHP
    $last_login_device = $_SERVER['HTTP_USER_AGENT'];
    $user_ip = $_SERVER['REMOTE_ADDR'];
```

Keep in mind that these things can be spoofed. A user could be using a VPN, altering their forwarding headers, and so on. 