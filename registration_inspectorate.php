<?php
// Include database connection
include 'db_connection.php';

// Define categories for dropdown
$categories = array('Food', 'Medical Device', 'Drugs', 'Cosmetics');

// Initialize variables for form values and error messages
$name = $designation = $category = $inspector_id = $email = $password = '';
$nameErr = $designationErr = $categoryErr = $inspectorIdErr = $emailErr = $passwordErr = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form inputs
    // Validate Name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validate Designation
    if (empty($_POST["designation"])) {
        $designationErr = "Designation is required";
    } else {
        $designation = test_input($_POST["designation"]);
    }

    // Validate Category
    if (empty($_POST["category"])) {
        $categoryErr = "Category is required";
    } else {
        $category = test_input($_POST["category"]);
    }

    // Validate Inspector ID
    if (empty($_POST["inspector_id"])) {
        $inspectorIdErr = "Inspector ID is required";
    } else {
        $inspector_id = test_input($_POST["inspector_id"]);
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    // If all inputs are valid, insert data into database
    if (empty($nameErr) && empty($designationErr) && empty($categoryErr) && empty($inspectorIdErr) && empty($emailErr) && empty($passwordErr)) {
        // Hash the password before storing in database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute SQL query to insert data into database
        $stmt = $conn->prepare("INSERT INTO accounts_inspectorate (name, designation, category, inspectorID, email, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $designation, $category, $inspector_id, $email, $hashed_password);
        $stmt->execute();

        // Redirect to login page after successful registration
        header("Location: login.php");
        exit();
    }
}

// Function to sanitize form inputs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFROS - Inspectorate Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles can be added here */
        body {
            background-color: #f8f9fa;
        }
        .registration-container {
            max-width: 400px;
            margin: 100px auto;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container registration-container">
    <h2 class="text-center mb-4">Inspectorate Registration</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
            <span class="text-danger"><?php echo $nameErr; ?></span>
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $designation; ?>" required>
            <span class="text-danger"><?php echo $designationErr; ?></span>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
                <option value="" disabled selected>Select Category</option>
                <?php foreach ($categories as $cat) { ?>
                    <option value="<?php echo $cat; ?>" <?php if ($category == $cat) echo "selected"; ?>><?php echo $cat; ?></option>
                <?php } ?>
            </select>
            <span class="text-danger"><?php echo $categoryErr; ?></span>
        </div>
        <div class="mb-3">
            <label for="inspector_id" class="form-label">Inspector ID</label>
            <input type="text" class="form-control" id="inspector_id" name="inspector_id" value="<?php echo $inspector_id; ?>" required>
            <span class="text-danger"><?php echo $inspectorIdErr; ?></span>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            <span class="text-danger"><?php echo $emailErr; ?></span>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <span class="text-danger"><?php echo $passwordErr; ?></span>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
