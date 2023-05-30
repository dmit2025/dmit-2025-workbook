# PHP Environment Setup

This semester, we'll be working with a LAMP stack. This is a whole bunch of software, set up on a server, that works together in order to let us develop dynamic websites. Specifically, LAMP stands for:

L - Linux (the operating system)

A - Apache (the server software)

M - MySQL (the database)

P - PHP (the back-end language)

Today, we're going to set up our environment before diving into development next class.

<br>

---

## Contents

1. [The dmitstudent Server](#dmitstudent-web-server)

2. [.htaccess Security](#htaccess-security)

3. [Securing Your Working Directory](#securing-your-working-directory)

4. [Installing the PHP Engine](#installing-the-php-engine-and-maria-db)

---

<br>

## dmitstudent Web Server

PHP is a server-side language. This means that any PHP script needs to be run by an engine installed on a server before the user can see the output. Because of this, we'll be using the dmitstudent web server extensively. [^1]

Any student registered in this course should have a new account generated for them on this server.

<br>

| Login                               |  Temporary Password                | Admin URL                           |
|-------------------------------------|------------------------------------|-------------------------------------|
| your student username (ex. jsmith2) | by default, your student ID number | https://studentweb2.sicet.ca:10000/ |

<br>

Please note that if an instructor in a previous level had you change your password, it will no longer be your student ID number; instead, please use whatever password you generally use in order to login to an FTP client like FileZilla.

If you do not have an account or cannot access it, please contact your instructor.  

<br>

## .htaccess Security

Since PHP is a server-side language, there are numerous ways that bad actors (hackers, bots, etc.) might exploit things in order to gain access to our server and/or database. Because we are just learning PHP concepts for the first time and will not always be writing secure applications, we need to protect ourselves from this in some way. 

Our dmitstudent server uses Apache, a type of HTTP server software, on a Linux operating system. This means we can use special configuration files called `.htaccess` and `.htpasswd` to secure the directory we'll be working in. [^2]

<br>

### What is `.htaccess` and `.htpasswd`?

In short, `.htaccess` creates a password wall. When a user attempts to look at any file within a directory that has an `.htaccess` file, they will be prompted to enter a username and password in order to continue.

However, in order for this to work, we also need a `.htpasswd` file that contains a list of all the authorised users and an encrypted version of their passwords. 

We can't put it inside of `public_html` because we never want someone to be able to see (or modify!) it. Instead, we'll put it out of reach of our users by placing it in the `data` folder.

<br>

## Securing Your Working Directory

1. Connect to the student server through an FTP client, such as FileZilla. 

2. Inside of `public_html`, create a new directory called `dmit2025`. This is where you will be uploading all of your work this semester.

3. Open the provided `.htaccess` file in `01-environment-setup` in your workbook. 

4. On Line 04, make sure that your dmitstudent server username is in the provided path.

    **Note**: This line tells the server where to find the `.htpasswd` file.

5. Upload this file to the `dmit2025` directory on the server.

    **Note**: You may not be able to see this file in your Finder (macOS) or File Explorer (Windows) because this is a special configuration file. Normally, these files are hidden by the operating system. 

    **Revealing hidden files on macOS**: In Finder, press the following key combination: `⌘` + `SHIFT` + `.`

    **Revealing hidden files on Windows 11**: In File Explorer, click on `View > Show > Hidden Items`.

6.  Next, edit the provided `.htpasswd` file. While it already has usernames and hashes (i.e. encrypted passwords) for your instructors, you will also need your own username and password hash. You can generate the line you need with the following website: https://sherylcanter.com/encrypt.php

7. Save the file and upload it to your `data` folder, immediately inside of the root of your dmitstudent server space.

8. Test to make sure that everything works! On your browser, go to: http://www.yourusername.dmitstudent.ca/dmit2025/ and make sure that you're greeted with the password prompt.

<br>

--- 

## Installing the PHP Engine and Maria DB

Now that we have our working directory secured, let's install PHP and everything else that we'll need later in the semester (including MariaDB). 

All of the scripts that we'll need to set up PHP and MySQL with Maria DB are available by logging in here: https://studentweb2.sicet.ca:10000/

On Moodle, you will find a Word document with screen captures showing you where to go.

---

### Footnotes

[^1]: An alternative to using the dmitstudent server is to run a local server stack. A server stack, sometimes called a solution stack, is a combination of an operating system, certain server software, a database, and a back-end scripting language engine, which you can run on your own machine. A popular one is [XAMPP](https://www.apachefriends.org/). However, when submitting your homework for the term, you must have a live version of your website up and available on the dmitstudent server. 

[^2]: You can read all about `.htaccess` files in the [Official Apache Documentation](https://httpd.apache.org/docs/2.4/howto/htaccess.html).