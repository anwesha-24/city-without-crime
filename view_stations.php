<?php include('includes/db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Police Stations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">View Police Stations</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Police Station ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Mobile</th>
                    <th>Head</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Police_Station_Master";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["PStation_Id"]. "</td><td>" . $row["PStation_Name"]. "</td><td>" . $row["Address"]. "</td><td>" . $row["Phone"]. "</td><td>" . $row["Mobile"]. "</td><td>" . $row["PStation_Head"]. "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No police stations found</td></tr>";
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