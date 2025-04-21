# DMIT2025 Lesson Plan Overview

## Module 0 (Development Environment Setup) Overview

Lesson 01: Overview of LAMP solution stack and PHP engine; development environment and workbook setup.


**Activity: Server Setup**


## Module 1 (PHP Basics & Form Handling) Overview

Lesson 02: Introduction to PHP; `phpinfo()` and installed libraries; introduction to variables with "Hello, world!" exercise; exploration of data types and basic arithmetic; indexed arrays. 

Lesson 03: `include()` and modular code; three problems that review the concepts from the previous lesson.

Lesson 04: Simple exploration of logical operators, control structures, and loops.

Lesson 05: Three problems that review the concepts from the previous lesson; brief introduction to the `date()` function.

Lesson 06: Review of forms and form control attributes; introduction to `$_POST` and associative arrays by taking common programming problems and converting them into scripts that accept values from the user.

Lesson 07: Introduction to `$_GET`, query strings, and ternary operators with recipe coverter.

Lesson 08: Introduction to handling multiple forms on a single page with mean, median, and mode calculator; hidden values in forms.


**Lab 01 Released: PHP Language Fundamentals (15%)**


## Module 2 (Custom Functions, Form Validation, & OOP Libraries) Overview

Lesson 09: Custom functions with string manipulation methods (palindrome checker); documentation for developers.

Lesson 10: Query string validation; $_GET vulnerabilities and error handling with custom functions. 

Lesson 11 (two days): Overview of SQL Injections and XSS attacks; form validation using custom functions for specific data types using henchmen application form.

**Quiz 01 Released: PHP Scripting Language Concepts (10%)**

Lesson 12: Form validation using a simple open source library; quick overview of Object-Oriented Programming (OOP) and PHP Syntax. 

Lesson 13: Introduction to `mail()` and why it often fails (SMTP issues, vulnerabilities, email injection for spamming); PHP Mailer library as an alternative. 


**Lab 02 Released: Web Form Validation (15%)**


## Module 3 (Data Retrieval & Manipulation with MySQLi) Overview

Lesson 14: Overview of phpMyAdmin; setting up databases and simple tables; introduction to SQL and running queries in phpMyAdmin.

Lesson 15: Continued SQL review; creating a connection handle for connecting to the database; SQLi and fetching records; manipulating returned records for display with PHP.

**Quiz 02 Released: MySQLi & MariaDB (10%)**

Lesson 16: Set up 'World Happiness Report', a read-only application; create a simple index (similar to our CRUD application), but allow the user to 'View' the entire record on a separate page.

Lesson 17: Introduce and build pagination for the returned records. 

Lesson 18: Add an advanced search feature that builds a dynamic query (i.e. the query will be different depending upon which fields the user fills out), binds the correct number of parameters, and execute a prepared-statement. Use the splat operator. 

Lesson 19: Filtering results and exploring data using intuitive buttons and links; building a query string using array methods; using a query string to build a dynamic query. 


**Lab 03 Released: Read-Only Web Application (15%)**


## Module 4 (CRUD Applications & Basic Authentication) Overview

Lesson 20: CRUD (Read); introduction to the concept of CRUD; setting up the 'shell' for the application and all of its pages.

Lesson 21: CRUD (Create, AKA Add or Insert); allow a user to add records to a table; prepared statements and why we use them.

Lesson 22: CRUD (Delete); allow a user to delete records from a table; confirmation page to make sure the user want to delete a record before doing it. 

Lesson 23: CRUD (Update, AKA Edit); using parts of all of the previous pages, allow a user to pick a record to edit from a table, prepopulate a form with the existing values in the database, and allow the user to update that record. 

Lesson 24: `$_SESSION` superglobal array and saving the state of a user or an application.

Lesson 25: Password encryption and validation methods; one-way hashing algorithms, salt, and how to store login information securely.

Lesson 26: Using sessions, we can now make sure that only an authenticated and authorised user can add, edit, or delete records. We will also go over hashes and how to use PHP methods to compare a stored hash to a plain text password.

**Quiz 03 Released: CRUD & Web Security Concepts (10%)**

Lesson 27: Introduction to GD Graphics Library; begin working with image objects and lead students through the basic steps of processing or manipulating any image.

Lesson 28: Build an image posting application with a web form and simple gallery; convert an uploaded image file into a 'full-sized' optimised WebP and a thumbnail version; set up database and all necessary tables.


**Catalogue Project Released (25%)**