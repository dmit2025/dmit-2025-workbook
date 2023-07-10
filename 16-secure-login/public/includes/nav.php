<?php
// This must be included on every page that you wish to access $_SESSION variables from.
session_start();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?php echo $title; ?>
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

    <body class="container p-5">
        <header class="text-center">
            <nav class="mb-5">
                <a href="index.php" class="btn btn-dark">Home</a>

                <!-- If the user is logged in, we'll give them access to the administrative area. -->
                <?php if (isset($_SESSION['username'])): ?>

                    <a href="admin.php" class="btn btn-dark">Admin Area</a>

                    <!-- We'll also give them the option to log out. -->
                    <a href="logout.php" class="btn btn-warning">Log Out</a>

                <?php else: ?>

                    <!-- If the user is NOT logged in, we'll give them a login button. -->
                    <a href="login.php" class="btn btn-success">Login</a>

                <?php endif; ?>
            </nav>
        </header>