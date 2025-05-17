<?php include('includes/db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register Police Station</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Register Police Station</h2>
        <form method="POST" action="register_station.php">
            <div class="form-group">
                <label for="pStationID">Police Station ID:</label>
                <input type="text" class="form-control" name="pStationID" required>
            </div>
            <div class="form-group">
                <label for="pStationName">Police Station Name:</label>
                <input type="text" class="form-control" name="pStationName" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="pStationHead">Police Station Head:</label>
                <input type="text" class="form-control" name="pStationHead" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $pStationID = $_POST['pStationID'];
            $pStationName = $_POST['pStationName'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $mobile = $_POST['mobile'];
            $pStationHead = $_POST['pStationHead'];
            $password = $_POST['password'];

            $sql = "INSERT INTO Police_Station_Master (PStation_Id, PStation_Name, Address, Phone, Mobile, PStation_Head, Password)
                    VALUES ('$pStationID', '$pStationName', '$address', '$phone', '$mobile', '$pStationHead', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Police station registered successfully!</div>";
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
