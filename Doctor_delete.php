<?php
include "datacon.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"])) {

        // Sanitize the id parameter to prevent SQL injection
        $id = mysqli_real_escape_string($link, $_GET["id"]);

        // Prepare the SQL statement
        $sql = "DELETE FROM doctors WHERE id=$id";


        // Execute the SQL query
        $result = mysqli_query($link, $sql);

        if ($result) {
            // Check if any rows were affected
            if (mysqli_affected_rows($link) > 0) {
                // Redirect the user
                header("location: /DocCare/SuperAdmin/doctors.php");
                exit(); // Terminate script execution after redirection
            } else {
                echo "No records were deleted.";
            }
        } else {
            // Handle SQL query execution error
            echo "Error: " . mysqli_error($link);
        }
    } else {
        echo "No ID parameter provided.";
    }
} else {
    echo "Invalid request method.";
}
