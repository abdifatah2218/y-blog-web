<?php


/*include "config/constants.php";

//get beck form DATA IF THERE IS A REGISTRATION ERROR
$firstname=$_SESSION['signup-data']['firstname'] ?? null;
$lastname=$_SESSION['signup-data']['lastname'] ?? null;
$username=$_SESSION['signup-data']['username'] ?? null;
$email=$_SESSION['signup-data']['email'] ?? null;
$createpassword=$_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;


//delete signup data     session
unset($_SESSION['signup-data']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNDEREMPLOYED</title>
    <!-- CUSTOM STYLESHEET -->
<!--<link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">--> <link rel="stylesheet" href="css/style.css">
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONT(MONTSERATE) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,800;1,700&display=swap" rel="stylesheet"> 
</head>
<body>


<section class="form__section">

    <div class="container form__section-container">
        <h2>Sign Up</h2>
        <?php
        if(isset($_SESSION['signup'])): ?> 
            <div class="alert__message error">
            <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']);
                ?>
            </p>
            
            </div>
        
        <?php endif ?>
        <form action="<?=ROOT_URL?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text"     name ="firstname"   placeholder="First Name">
            <input type="text"     name ="lastname"   placeholder="Last Name">
            <input type="username"     name ="username"  placeholder="Username">
            <input type="email"    name ="email"   placeholder="email">
            <input type="password" name ="createpassword"  placeholder="Password">
            <input type="password" name ="confirmpassword"   placeholder="Confirm Password">
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name ="submit"class="btn">Sign Up</button>
            <small>Already have an Account? <a href="signin.php">Sign in</a></small>
        </form>
    </div>

</section>


</body>
</html>*/


include "config/constants.php";


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Restore old form values (after validation error)
$old = $_SESSION['signup-data'] ?? []; //It represents all the old form values in one variable  whicj]h more repeated $session [signupdata]and makes your code cleaner and more professional.


$firstname       = $old['firstname']       ?? '';
$lastname        = $old['lastname']        ?? '';
$username        = $old['username']        ?? '';
$email           = $old['email']           ?? '';
$createpassword  = $old['createpassword']  ?? '';
$confirmpassword = $old['confirmpassword'] ?? '';

// Clear stored old data
unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNDEREMPLOYED - Sign Up</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;800&display=swap" rel="stylesheet">
</head>
<body>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>

        <!-- // Check if there is a signup error message stored in the session
 -->
        <?php if (isset($_SESSION['signup'])): ?>
        <!--- Display the error message inside a styled div-->
            <div class="alert__message error">

                <p><?= htmlspecialchars($_SESSION['signup'])// Echo the error message safely  ?></p>
            </div>
            
            <?php unset($_SESSION['signup']); // // Remove the error from session so it doesn't show again on page refresh?>
            
        <?php endif; ?>

        <form action="<?= ROOT_URL ?>signup-logic.php" method="POST" enctype="multipart/form-data">
            /*this echos old value or last input user typed <!-- Pre-fill the form inputs with the user's previous input (stored in session) after a validation error, so they don't have to type everything again -->
 */
            <input type="text" name="firstname" placeholder="First Name"
                   value="<?= htmlspecialchars($firstname) ?>" required>
            
            <input type="text" name="lastname" placeholder="Last Name"
                   value="<?= htmlspecialchars($lastname) ?>" required>
            
            <input type="text" name="username" placeholder="Username"
                   value="<?= htmlspecialchars($username) ?>" required>
            
            <input type="email" name="email" placeholder="Email"
                   value="<?= htmlspecialchars($email) ?>" required>
            
            <input type="password" name="createpassword" placeholder="Password"
                   value="<?= htmlspecialchars($createpassword) ?>" required>
            
            <input type="password" name="confirmpassword" placeholder="Confirm Password"
                   value="<?= htmlspecialchars($confirmpassword) ?>" required>
            
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar" required>
            </div>

            <button type="submit" name="submit" class="btn">Sign Up</button>
            <small>Already have an account? <a href="<?= ROOT_URL ?>signin.php">Sign in</a></small>
        </form>
    </div>
</section>

</body>
</html>
