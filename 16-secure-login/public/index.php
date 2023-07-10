<?php

// Establishing connection to database.
require_once('/home/vwatson/data/connect.php');
$connection = db_connect();

// Importing our prepared statements.
require_once('../private/prepared.php');

// We need to define the unique title for this page.
$title = "Canadian Cities Online Database";
include('includes/nav.php');

?>
<main>
    <section>
        <h1 class="fw-light text-center mt-5">Current Cities in our System</h1>
        <p class="text-muted mb-5">Welcome to the Canadian Cities Online Database! All of the cities that we
            currently have listed in our system are down below. Click on any of the buttons above to get started
            on adding, editing, or deleting any of these entries.</p>
        <?php

        $cities = get_all_cities();

        if (count($cities) > 0) {
            echo "<table  class=\"table table-bordered table-hover\">";
            echo "<tr>";
            echo "<th scope=\"col\">City Name</th>";
            echo "<th scope=\"col\">Province</th>";
            echo "<th scope=\"col\">Population</th>";
            echo "</tr>";
            foreach ($cities as $city) {
                extract($city);
                echo "<tr><td>$city_name</td><td>$province</td><td>$population</td><tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Sorry there are no records available that match your query</p>";
        }
        ?>
    </section>
</main>
</body>

</html>

<?php

// Closing our connection.
db_disconnect($connection);

?>