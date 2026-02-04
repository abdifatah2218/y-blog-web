<?php
/*require "config/database.php";


if(isset($_POST['submit'])){
    // getting input
    $username_email = filter_var($_POST['username_email'] , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var(($_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$username_email){
        $_SESSION['signin'] = 'Username or Email is Inccorrect';

    }
    elseif(!$password){
        $_SESSION['signin'] = 'Password required';
 
    }else{  
        // fetch user from database
        $fetch_user_query = "SELECT * FROM users WHERE username = '$username_email' OR email = '$username_email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if(mysqli_num_rows($fetch_user_result) == 1){
            //convert the record into assoc array
            $user_record=mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];

            // compare form password with database password
            if(password_verify($password,$db_password)){

                // set session for access control
                $_SESSION['user-id'] = $user_record['id'];
                $_SESSION['signin-success'] = "User successfully logged in";

                //set session if user is  admin
                if($user_record['is_admin']==1){
                    $_SESSION['user_is_admin'] = true;

                }
                //log in user
                header('location: ' . ROOT_URL . 'admin/index.php');
                
            }else{
                $_SESSION['signin'] = "Please check your input";
            }
        }else{
            $a = mysqli_num_rows($fetch_user_result);
            echo mysqli_num_rows($fetch_user_result);
            $_SESSION['signin'] = "User Not found";
        }
    }

    //if any problem, redirect back to signin page
    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }

}else{
    header('location: ' . ROOT_URL . "signin.php");
    die();
}

// error_log();

?>*/





// gbt code 
/*require "config/database.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// If the login form was not submitted, redirect to signin page

if (!isset($_POST['submit'])) {
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
}

// Get input
$username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = $_POST['password'] ?? '';

// Validate input
if (!$username_email) {
    $_SESSION['signin'] = 'Username or Email is required';
}
elseif (!$password) {
    $_SESSION['signin'] = 'Password is required';
}

// $_SESSION['signin'] is a flag + message stored on the server to remember that a signin error happened in an earlier if-condition (like missing username, missing password, or wrong credentials), so other pages can detect the error after redirect


if (isset($_SESSION['signin'])) {
    $_SESSION['signin-data'] = $_POST; // store to be retyped
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
}

// Fetch user securely
$sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $username_email, $username_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    $_SESSION['signin'] = 'User not found';
    $_SESSION['signin-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
}

$user = $result->fetch_assoc();

// Verify password
if (!password_verify($password, $user['password'])) {
    $_SESSION['signin'] = 'Incorrect password';
    $_SESSION['signin-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
}

// Login success
$_SESSION['user-id'] = $user['id'];

if ($user['is_admin'] == 1) {
    $_SESSION['user_is_admin'] = true;
    header('Location: ' . ROOT_URL . 'admin/index.php');
} else {
    header('Location: ' . ROOT_URL . 'index.php');
}

exit;

*/


//2nd 
// Connect to database
require "config/database.php";

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If login form was not submitted, redirect to signin page
if (!isset($_POST['submit'])) {
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
}

// Get username/email from form (sanitize input)
$username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Get password from form (do NOT sanitize password to avoid breaking it)
$password = $_POST['password'] ?? '';

// --------------------
// Step 1: Validate input
// --------------------
if (!$username_email) {
    $_SESSION['signin'] = 'Username or Email is required';
} elseif (!$password) {
    $_SESSION['signin'] = 'Password is required';
}

// If there is any validation error, redirect back
if (isset($_SESSION['signin'])) {
    $_SESSION['signin-data'] = $_POST; // keep the form data so user doesn't have to retype
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
}

// --------------------
// Step 2: Fetch user securely from database
// --------------------
$sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $username_email, $username_email);
$stmt->execute();
$result = $stmt->get_result();

// If user not found, redirect back
if ($result->num_rows !== 1) {
    $_SESSION['signin'] = 'User not found';
    $_SESSION['signin-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
}

// Get user data  //  👇 THIS IS THE “otherwise” PART

$user = $result->fetch_assoc();

// --------------------
// Step 3: Verify password
// --------------------
if (!password_verify($password, $user['password'])) {
    $_SESSION['signin'] = 'Incorrect password';
    $_SESSION['signin-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
}

// --------------------
// Step 4: Login successful
// --------------------

// Store user ID in session  // **If the login details MATCH a user already stored in the database, then remember that
$_SESSION['user-id'] = $user['id'];

// Optional: if user is admin, set admin session // CHECKS ARE YOU ADMIN OR NORMAL USER
if ($user['is_admin'] == 1) {
    $_SESSION['user_is_admin'] = true;
}

// Optional: store success message THIS SHOULD BE BEFORE REDIRECTING
$_SESSION['signin-success'] = "User successfully logged in"; // both admin and normal user will see and it is not next to TCHR WILL CONFIRM

// Redirect: admin to dashboard, normal user to home page
if ($user['is_admin'] == 1) {
    header('Location: ' . ROOT_URL . 'admin/index.php'); // admin  
} else {
    header('Location: ' . ROOT_URL . 'index.php');// normal users exit in db// $_SESSION['user-id'] = $user['id'];
}

// Stop script
exit;
?>




*/
    