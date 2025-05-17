<?php include('includes/db_connect.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-4">Login</h2>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="email" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="passwordField" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-secondary" id="togglePasswordButton">Show</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        
        <?php
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM Login_Master WHERE UserName='$username' AND Password='$password' AND Enabled=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $_SESSION['username'] = $username;
                echo "<div class='alert alert-success mt-3'>Login successful!</div>";
                // Redirect to user dashboard or home page
                header("Location: index.php");
                exit;
            } else {
                echo "<div class='alert alert-danger mt-3'>Invalid username or password</div>";
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var togglePasswordButton = document.getElementById('togglePasswordButton');
        var passwordField = document.getElementById('passwordField');
        togglePasswordButton.addEventListener('click', function() {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePasswordButton.textContent = 'Hide';
            } else {
                passwordField.type = 'password';
                togglePasswordButton.textContent = 'Show';
            }
        });
    });
    </script>
</body>
</html>
