<?php

// We need to define the unique title for this page.
$title = "Admin Area | Canadian Cities Online Database";
include('includes/nav.php');

// We'll initialise this variable right away to avoid any issues.
$message = "";

// If the user isn't logged in, get rid of them!
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

?>

<main>
    <section class="text-center">
        <h1 class="fw-light text-center mt-5">It's good to see you, admin.</h1>
        <p class="lead">If this were a fully-fledged application, we'd have all of the more dangerous CRUD operations hidden here, like inserts, updates, and deletes.</p>
    </section>
</main>