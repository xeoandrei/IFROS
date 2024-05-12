<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iFROS - Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles can be added here */
        body {
            background-color: #f8f9fa;
        }
        .registration-container {
            max-width: 600px;
            margin: 100px auto;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container registration-container">
    <h2 class="text-center mb-4">Registration</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img class="card-img-top" src="..." alt="Data Controller">
                <div class="card-body">
                    <h5 class="card-title">Data Controller Registration</h5>
                    <p class="card-text">Register as a Data Controller to manage and control data.</p>
                    <a href="registration_datacontroller.php" class="btn btn-primary btn-block">Register</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img class="card-img-top" src="..." alt="Inspectorate">
                <div class="card-body">
                    <h5 class="card-title">Inspectorate Registration</h5>
                    <p class="card-text">Register as an Inspectorate to perform inspections and regulatory operations.</p>
                    <a href="registration_inspectorate.php" class="btn btn-primary btn-block">Register</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img class="card-img-top" src="..." alt="Licensing Officer">
                <div class="card-body">
                    <h5 class="card-title">Licensing Officer Registration</h5>
                    <p class="card-text">Register as a Licensing Officer to manage licenses and permits.</p>
                    <a href="registration_licensing.php" class="btn btn-primary btn-block">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
