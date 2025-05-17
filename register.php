<?php include('includes/db_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Register</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="email" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" class="form-control" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $mobile = $_POST['mobile'];
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];

            // Check if username already exists
            $checkSql = "SELECT * FROM Login_Master WHERE UserName = ?";
            $stmt = $conn->prepare($checkSql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<div class='alert alert-danger mt-3'>Username already exists. Please choose another one.</div>";
            } else {
                // Insert new user
                $sql = "INSERT INTO Login_Master (UserName, Password, Mobile, Full_Name, Address, Enabled)
                VALUES (?, ?, ?, ?, ?, 1)";
                
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $username, $password, $mobile, $fullname, $address);
                
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success mt-3'>Registration successful!</div>";
                    header("Location: login.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger mt-3'>Error: " . $stmt->error . "</div>";
                }
            }

            $stmt->close();
        }
        $conn->close();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
