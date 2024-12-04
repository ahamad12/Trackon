<?php
function login($user, $pwd, $connection, $userR)
{
    // Start session at the top of the function
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Debug: Check session started
    echo "<pre>Session started successfully: " . (session_status() === PHP_SESSION_ACTIVE ? "Yes" : "No") . "</pre>";

    $query = "SELECT * FROM user WHERE userName='$user' AND userPassword='$pwd' AND userRole='$userR'";
    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $query = "SELECT userId, userRole FROM user WHERE userName='$user' AND userPassword='$pwd'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $userId = $row['userId'];
        $userRole = $row['userRole'];

        // Debug: Print user details
        echo "<pre>User ID: $userId\nUser Role: $userRole</pre>";

        $_SESSION['userId'] = $userId;

        // Redirect based on role
        if ($userRole === $userR) {
            if ($userRole == "admin") {
                echo "Redirecting to ../admin.php<br>";
                header("location: ../admin.php");
                exit(); // Ensure no further script execution
            } else {
                echo "Redirecting to ../index.php<br>";
                header("location: ../index.php");
                exit(); // Ensure no further script execution
            }
        } else {
            echo "Role mismatch. Expected $userRole, but selected $userR.<br>";
        }
    } else {
        echo "Login Failed. User not found.<br>";
    }

    // Debug: Check for premature output
    if (headers_sent($file, $line)) {
        echo "<pre>Headers already sent in $file on line $line.</pre>";
    }
}
?>
