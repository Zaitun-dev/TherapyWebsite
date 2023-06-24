<?php
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Redirect to the protected page or display a welcome message
    header("Location: protected_page.php");
    exit;
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform login verification (replace with your own logic)
    if ($email == "example@example.com" && $password == "password123") {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        // Redirect to the protected page or display a welcome message
        header("Location: protected_page.php");
        exit;
    } else {
        // User not found or invalid credentials
        $showRegistrationForm = true;
        $errorMessage = "Invalid credentials. Please try again.";
    }
} else {
    // Show the registration form by default
    $showRegistrationForm = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/login.css">
    <title>User Login</title>
</head>
<body>
    <h1>User Login</h1>

    <?php if ($showRegistrationForm) : ?>
        <?php if (isset($errorMessage)) : ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>

<form method="POST" action="login.php">

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
        <label class="form-check-label" for="form2Example34"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="#!">Register</a></p>
  </div>
</form>
<?php endif; 
?>
</body>
</html>
