<?php
// Include database connection
include 'db_connection.php';

// Start session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare SQL statement to fetch user details
    $stmt = $conn->prepare("SELECT * FROM accounts_inspectorate WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user["password"])) {
        // Set session variables
        $_SESSION["inspectorate_loggedin"] = true;
        $_SESSION["inspectorate_name"] = $user["name"];
        $_SESSION["inspectorate_designation"] = $user["designation"];
        $_SESSION["inspectorate_inspectorID"] = $user["inspectorID"];

        // Redirect to inspectorate home page
        header("Location: home_inspectorate.php");
        exit();
    } else {
        // Redirect back to login page with error message
        header("Location: login.php?error=Invalid username or password");
        exit();
    }
}
?>
