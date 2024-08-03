    <?php
    session_start();

    include 'datacon.php';



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = ($_POST["email"]);
        $password = ($_POST["password"]);

        // Validate login credentials
        //$sql = "SELECT id, password FROM users WHERE username='$username' OR password='$password'";
        $sql = "SELECT id, username, password FROM users WHERE username='$username' OR password='$password'";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Echo retrieved username and hashed password for debugging
            // echo "Retrieved Username: " . $row['username'] . "<br>";
            // echo "Retrieved Hashed Password: " . $row['password'] . "<br>";

            if (password_verify($password, $row['password'])) {
                // Login successful (hashed password comparison)
                $_SESSION['id'] = $row['id'];
            } else {
                $errorMsg = "Invalid username or password";
            }
        } else {
            $errorMsg = "Invalid username or password";
        }
    }
