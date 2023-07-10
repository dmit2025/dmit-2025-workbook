<?php

/*
    The following are prepared statements, which adds a layer of abstraction between our user's (potentially dangerous) input and the SQL statements that we're executing. 
*/

// Prepared statement for inserting a new city
$insert_statement = $connection->prepare("INSERT INTO cities (city_name, province, population) VALUES (?, ?, ?)");

// Prepared statement for updating a city
$update_statement = $connection->prepare("UPDATE cities SET city_name = ?, province = ?, population = ? WHERE cid = ?");

// Prepared statement for deleting a city
$delete_statement = $connection->prepare("DELETE FROM cities WHERE cid = ?");

// Prepared statement for selecting all cities
$select_statement = $connection->prepare("SELECT * FROM cities");

// Prepared statement for selection a specific city (on edit page).
$specific_select_statement = $connection->prepare("SELECT * FROM cities WHERE cid = ?");


/* 
    Before we really get into it, we need some way of handling our errors. It's easiest to include this in our other functions rather than call it manually every single time we do something with the database. 
*/

// Function to handle database errors
function handle_database_error($statement)
{
    global $connection;
    die("Error in: " . $statement . ". Error details: " . $connection->error);
}


/* 
    Next, these custom functions use the prepared statements above to bind and execute each query. 
*/

// Function to insert a new city. We don't use the `cid` (the primary key) here because it should be auto-incremented and automatically taken care of by the database.
function insert_city($city_name, $province, $population)
{
    global $connection;
    global $insert_statement;
    $insert_statement->bind_param("ssi", $city_name, $province, $population);
    if (!$insert_statement->execute()) {
        handle_database_error("inserting city");
    }
    // Normally, we'd close things here; however, if we close this within the function, we'll have a hard time manipulating it or reading out all the records later.
    // $insert_statement->close();
}

// Function to update an existing city
function update_city($city_name, $province, $population, $city_id)
{
    global $connection;
    global $update_statement;
    $update_statement->bind_param("ssii", $city_name, $province, $population, $city_id);
    $update_statement->execute();
    // if(!$update_statement->execute()) {
    //     handle_database_error("updating city");
    // } else {
    //     $update_statement->close();
    // }
}

// Function to delete a city
function delete_city($cid)
{
    global $connection;
    global $delete_statement;
    $delete_statement->bind_param("i", $cid);
    if(!$delete_statement->execute()) {
        handle_database_error("deleting city");
    }
    // $delete_statement->close();
}

// Function to retrieve all cities
function get_all_cities()
{
    global $connection;
    global $select_statement;
    if (!$select_statement->execute()) {
        handle_database_error("fetching cities");
    }
    $result = $select_statement->get_result();
    $cities = [];
    while ($row = $result->fetch_assoc()) {
        $cities[] = $row;
    }
    // $select_statement->close();
    return $cities;
}

// Function to retrieve a specific city, by its ID.
function select_city_by_id($cid)
{
    global $connection;
    global $specific_select_statement, $connection;
    $specific_select_statement->bind_param("i", $cid);
    if (!$specific_select_statement->execute()) {
        handle_database_error("Selecting city by ID");
    }
    $result = $specific_select_statement->get_result();
    $city = $result->fetch_assoc();
    //$specific_select_statement->close();
    return $city;
}

?>