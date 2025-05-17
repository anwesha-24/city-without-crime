<?php include('includes/db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Emergency</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Add Emergency</h2>
        <form method="POST" action="add_emergency.php">
            <div class="form-group">
                <label for="sno">S.No:</label>
                <input type="number" class="form-control" name="sno" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Emergency</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sno = $_POST['sno'];
            $description = $_POST['description'];

            $sql = "INSERT INTO emergency (Sno, Descripton) VALUES ('$sno', '$description')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Emergency added successfully!</div>";
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
