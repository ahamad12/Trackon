<?php 
  require_once '../Configuration/conf.php';
  require_once '../Functions/getUsers.php';
  $userRoles = getUserRoles($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trackon Login</title>
    <link rel="stylesheet" href="../Styles/login.css">
    <link rel="stylesheet" href="../Styles/dropdown.css">
</head>
<body>
  <main>
    <form class="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
      <!-- Role selector at top-right of form -->
      <div class="form-header">
        <!-- Logo container -->
        <div class="side-logo-container">
          <!-- Replace src with your actual logo path -->
          <img src="../Assests/slack 1.png" alt="Trackon Logo" class="logo">
        </div>
        
        <!-- Role selector -->
        <div class="role-selector">
          <div class="flex-column">
            <label>Role </label>
          </div>
          <div class="select" >
            <div class="selected" data-default="Select Role" data-one="Admin" data-two="User">
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="arrow">
                <path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"></path>
              </svg>
            </div>
            <div class="options">
            <input id="all" name="option" type="radio" />
            <label class="option" for="all" data-txt="Select Role"></label>
            <?php foreach ($userRoles as $index => $role): ?>
            <div title="option-<?php echo ($index + 1); ?>">
                <input id="option-<?php echo ($index + 1); ?>" name="option" type="radio" value="<?php echo htmlspecialchars($role); ?>" />
                <label class="option" for="option-<?php echo ($index + 1); ?>" data-txt="<?php echo htmlspecialchars($role); ?>"></label>
            </div>
            <?php endforeach; ?>

        </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Rest of the form content -->
      <div class="flex-column">
        <label>Username </label>
      </div>
      <div class="inputForm">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20"><g data-name="Layer 3" id="Layer_3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
        <input placeholder="Enter your Email" class="input" type="text" name="name">
      </div>
      
      <div class="flex-column">
        <label>Password </label>
      </div>
      <div class="inputForm">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="-64 0 512 512" height="20"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
        <input placeholder="Enter your Password" class="input" type="password" name="pwd">
      </div>

      <div class="flex-row">
        <div>
          <input type="radio">
          <label>Remember me </label>
        </div>
        <span class="span">Forgot password?</span>
      </div>
      <button class="button-submit"  type="submit" name="login">Log In</button>
    </form>
  </main>
</body>
<?php

session_start();
require_once '../Functions/login.php';




ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $user = trim($_POST['name'] ?? '');
    $pwd = trim($_POST['pwd'] ?? '');
    $userR = $_POST['option'] ?? '';

    if ($user && $pwd && $userR) {
        $conn = mysqli_connect('localhost', 'root', '', 'inventorydb') 
            or die("Connection Failed: " . mysqli_connect_error());

        // Debugging: Output connection status
        if (!$conn) {
            error_log("Database connection failed.");
        } else {
            echo "Connected to the database successfully.<br>";
        }

        // Call the login function
        login($user, $pwd, $conn, $userR);
    } else {
        echo "All fields are required.";
    }
}

ob_end_flush();
?>
</html>
