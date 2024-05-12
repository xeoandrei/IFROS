<?php
// Include session management
session_start();

// Check if inspectorate is logged in, if not, redirect to login page
if (!isset($_SESSION["inspectorate_loggedin"]) || $_SESSION["inspectorate_loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Fetch inspectorate details from session
$inspectorate_name = $_SESSION["inspectorate_name"];
$inspectorate_designation = $_SESSION["inspectorate_designation"];
$inspectorate_inspectorID = $_SESSION["inspectorate_inspectorID"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFROS - Inspectorate Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles can be added here */
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
        }
        .menu-item {
            padding: 10px 0;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <h2>Welcome, <?php echo $inspectorate_name; ?>!</h2>
    <p>Your Designation: <?php echo $inspectorate_designation; ?></p>
    <p>Your Inspector ID: <?php echo $inspectorate_inspectorID; ?></p>

    <h3>Menu:</h3>
    <ul class="list-group">
        <li class="list-group-item menu-item">Placeholder - Link 1</li>
        <li class="list-group-item menu-item">Placeholder - Link 2</li>
        <li class="list-group-item menu-item">Placeholder - Link 3</li>
        <!-- Add more menu items as needed -->
    </ul>
</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
