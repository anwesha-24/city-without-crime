<?php include('includes/db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Lodge Complaint</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Lodge Complaint</h2>
        <form method="POST" action="lodge_complaint.php">
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="pStationID">Police Station ID:</label>
                <input type="text" class="form-control" name="pStationID" required>
            </div>
            <button type="submit" class="btn btn-primary">Lodge Complaint</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $description = $_POST['description'];
            $pStationID = $_POST['pStationID'];

            $sql = "INSERT INTO Complaint (Description, PStation_Id) VALUES ('$description', '$pStationID')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Complaint lodged successfully!</div>";
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
