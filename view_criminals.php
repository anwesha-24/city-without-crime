<?php include('includes/db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Criminals</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">View Criminals</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Criminal ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Police Station ID</th>
                    <th>Crime Level</th>
                    <th>Status</th>
                    <th>Criminal Picture</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Criminal_Master";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["CriminalID"]. "</td><td>" . $row["Name"]. "</td><td>" . $row["Gender"]. "</td><td>" . $row["Height"]. "</td><td>" . $row["Weight"]. "</td><td>" . $row["PStation_Id"]. "</td><td>" . $row["Crimelevel"]. "</td><td>" . $row["Status"]. "</td><td>" . $row["Criminal_Picture"]. "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No criminals found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
