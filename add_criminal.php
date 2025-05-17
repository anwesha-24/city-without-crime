<?php include('includes/db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Criminal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Add Criminal</h2>
        <form method="POST" action="add_criminal.php">
            <div class="form-group">
                <label for="criminalID">Criminal ID:</label>
                <input type="text" class="form-control" name="criminalID" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" class="form-control" name="gender" required>
            </div>
            <div class="form-group">
                <label for="height">Height:</label>
                <input type="text" class="form-control" name="height" required>
            </div>
            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="text" class="form-control" name="weight" required>
            </div>
            <div class="form-group">
                <label for="pStationID">Police Station ID:</label>
                <input type="text" class="form-control" name="pStationID" required>
            </div>
            <div class="form-group">
                <label for="crimeLevel">Crime Level:</label>
                <input type="text" class="form-control" name="crimeLevel" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" name="status" required>
            </div>
            <div class="form-group">
                <label for="criminalPicture">Criminal Picture:</label>
                <input type="text" class="form-control" name="criminalPicture" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Criminal</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $criminalID = $_POST['criminalID'];
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            $pStationID = $_POST['pStationID'];
            $crimeLevel = $_POST['crimeLevel'];
            $status = $_POST['status'];
            $criminalPicture = $_POST['criminalPicture'];

            $sql = "INSERT INTO Criminal_Master (CriminalID, Name, Gender, Height, Weight, PStation_Id, Crimelevel, Status, Criminal_Picture)
                    VALUES ('$criminalID', '$name', '$gender', '$height', '$weight', '$pStationID', '$crimeLevel', '$status', '$criminalPicture')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Criminal added successfully!</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>