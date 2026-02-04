<?php
// I deleted the php i will have to rewrite
/*require "config/database.php";
// you tube code
session_start();

//get signup form data

if(isset($_POST["submit"])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    if(!$firstname){
        $_SESSION['signup'] = 'Please enter your First Name';
    }elseif(!$lastname){
        $_SESSION['signup'] = 'Please enter your Last Name';
    }elseif(!$username){
        $_SESSION['signup'] = 'Please enter your Username';
    }elseif(!$email){
        $_SESSION['signup'] = 'Please enter your Email';
    }elseif(strlen($createpassword)<8 || strlen($confirmpassword)<8){
        $_SESSION['signup'] = 'Password should be 8+ characters';
    }elseif(!$avatar['name']){
        $_SESSION['signup'] = 'Please add Avatar ';
    }else{
        if($createpassword !== $confirmpassword){
            $_SESSION['signup']="Passwords donot match";

        }else{


            $hashed_password = password_hash($createpassword,PASSWORD_DEFAULT);
            


            $user_check_query="SELECT * FROM users WHERE username='$username' OR email ='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result)>0){
                $_SESSION['signup'] = "Username or Email already exists";
            }else{
                //WORK ON AVATAR
                //rename avatar
                $time = time(); // make each image name unique using current timestamp 
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name=$avatar['tmp_name'];
                $avatar_destination_path='images/' . $avatar_name;

                //,ake sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);
                if(in_array($extension,$allowed_files)){
                    //if image not too large

                    if($avatar['size']<1000000){

                        //upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    }else{
                        $_SESSION['signup']="Folder size too big.Should be less than 1mb";
                    }
                }else{
                    $_SESSION['signup']="File should be png, jpg or jpeg";
                }
            }



        }
    }
    // redirect back t signup on error
    if(isset($_SESSION['signup'])){
        // pass data back to sign up page
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
        
    }else{
        //insert new user into users table
        $inset_user_query = "INSERT INTO users SET firstname ='$firstname' ,lastname='$lastname',username='$username',email ='$email' ,password='$hashed_password',avatar='$avatar_name',is_admin=0";
        $inset_user_result = mysqli_query($connection, $inset_user_query);
        if(!mysqli_errno($connection)){
            $_SESSION['signup-success'] = "Registration Successful Please login";
            header('location: ' . ROOT_URL . 'signin.php');

        }
    }
}else{
    //button not clicked
    header('location: ' . ROOT_URL . "signup.php");
    die();
}
    


*/

/*require "config/database.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} // adding two chatgbt code 1 session 2 insert

// get signup form datA if sign up button was clicked 
if(isset($_POST["submit"])){

$firstname=filter_var($_POST["firstname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastname=filter_var($_POST["lastname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$username=filter_var($_POST["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email=filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
$createpassword=filter_var($_POST["createpassword"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confirmpassword=filter_var($_POST["confirmpassword"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$avatar = $_FILES["avatar"];
//var_dump($avatar);

// validate input values 
if(!$firstname){

$_SESSION["signup"]="please enter your first name";
}

elseif(!$lastname){

$_SESSION["signup"]= "please enter your last name";
}
elseif(!$username){

$_SESSION["signup"]= "please enter your username name";
}
elseif(!$email){

$_SESSION["signup"]= "please enter a valid email ";
}

elseif(strlen($createpassword)<8 || strlen($confirmpassword)<8){


$_SESSION["signup"]= "password should be 8+ characters";
}
elseif(!$avatar){

$_SESSION["signup"]= "please add avatar";

//elseif ($avatar['error'] === 4) {
   // $_SESSION["signup"] = "please add avatar";
}


//}
else{
 
// check if password dont match
if($createpassword!==$confirmpassword){

$_SESSION["signup"]="password dont match";

}
else{ // i think is another long else block 
    // hashed password
    $hashed_password= password_hash($createpassword, PASSWORD_DEFAULT);
// check if the username or email exists in the daabase
$user_check_query= "SELECT * FROM users WHERE username = '$username' OR email ='$email'";
$user_check_result=mysqli_query($connection,$user_check_query);
if(mysqli_num_rows($user_check_result)>0){

$_SESSION["signup"]="username or email already already exist";
}

else {
// work on avator
// rename avator 
$time=time();// make each image name unique using current timesatamp
$avatar_name=$time. $avatar['name'];
$avatar_tmp_name=$avatar['tmp_name'];
$avatar_destination_path='images/' . $avatar_name;
// make sure file is an image 
$allowed_files=['png','jpg','jpeg'];// every eg jpeg has its own single quote
$extention_parts=explode('.', $avatar_name);
$extention =strtolower(end($extention_parts));
if(in_array($extention,$allowed_files)){
    // make sure the image is not too large (1mb+)   
if($avatar['size']<1000000){// if in this is under if my note and that if is inside two else block

    //upload avator
    move_uploaded_file($avatar_tmp_name,$avatar_destination_path);
}

else{// even this else is inside if and if is inside two else block 
$_SESSION['signup']='file size is too big should be less than 1mb';
}


}
else{// out side of if  but inside two else block
$_SESSION['signup']='file should be png, jpg, or jpeg';
}
}

}//ithink is another long else block
}//  long else block

 // rediect back to sign up page if there was any problem 

 // end of 2 long else block
 if(isset($_SESSION['signup'])){ // is inside first if tis isset ive forgotten 
    // pass form data back to sign up page
    $_SESSION['signup_data']= $_POST;
    header('Location: ' . ROOT_URL . 'signup.php');
    die();
 }
 else{// inside first if 
// insert new users 
$inset_user_query="INSERT INTO users ( firstname, lastname, username, email, password, avatar, is_admin)

VALUES('$firstname', '$lastname', '$username', '$email', '$hashed_password','$avatar_name',0)";// that double quote starts from insert and 
//ends to them end of values before semi colon and isadmin zero 0 doesnt have quote 
//$inset_user_result= mysqli_query($connection, $inset_user_query);
 // inside this ubove short else

   // $_SESSION['sign-success']="regisration succsseful . please log in!";
    // header('Location: '. ROOT_URL.  'signin.php'); // location first latter capital in side signin so space
    // die();
   // if(!mysqli_errno($connection)){// my old code which is this only shows if their is error in connection
    // ireplaced with chatgbt code which shows both connection and insert database error eg wrong column n db

          //  $_SESSION['signup-success'] = "Registration Successful Please login";
           // header('location: ' . ROOT_URL . 'signin.php');

       // }
       $inset_user_result = mysqli_query($connection, $inset_user_query);

if ($inset_user_result) {
    $_SESSION['signup-success'] = "Registration Successful Please login";
    header('location: ' . ROOT_URL . 'signin.php');
    exit;
} else {
    die("MySQL Error: " . mysqli_error($connection));
}

 
 }// inside if 
 
}// first if

else{
// if button was not clicked, bounce back to signup page 
header('Location:'. ROOT_URL .'signup.php');
die();


}*/



/*require "config/database.php";
1st chatgbt code
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Only run if signup form is submitted
if (!isset($_POST['submit'])) {
    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}

// Get and sanitize form data
$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$createpassword = $_POST['createpassword'] ?? '';
$confirmpassword = $_POST['confirmpassword'] ?? '';
$avatar = $_FILES['avatar'] ?? null;

// ---- STEP 1: Validate inputs ----
if (!$firstname) {
    $_SESSION['signup'] = 'Please enter your first name';
} elseif (!$lastname) {
    $_SESSION['signup'] = 'Please enter your last name';
} elseif (!$username) {
    $_SESSION['signup'] = 'Please enter a username';
} elseif (!$email) {
    $_SESSION['signup'] = 'Please enter a valid email';
} elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
    $_SESSION['signup'] = 'Password should be at least 8 characters';
} elseif ($createpassword !== $confirmpassword) {
    $_SESSION['signup'] = 'Passwords do not match';
} elseif (!$avatar || $avatar['error'] !== 0) {
    $_SESSION['signup'] = 'Please upload an avatar';
}

// If any validation failed, redirect back
if (isset($_SESSION['signup'])) {
    $_SESSION['signup-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}

// ---- STEP 2: Process avatar ----
$allowed_extensions = ['png', 'jpg', 'jpeg'];
$avatar_name = time() . '_' . basename($avatar['name']);
$avatar_tmp_name = $avatar['tmp_name'];
$avatar_destination_path = 'images/' . $avatar_name;

$ext = strtolower(pathinfo($avatar_name, PATHINFO_EXTENSION));
if (!in_array($ext, $allowed_extensions)) {
    $_SESSION['signup'] = 'Avatar must be png, jpg, or jpeg';
} elseif ($avatar['size'] > 1000000) {
    $_SESSION['signup'] = 'Avatar size must be less than 1MB';
}

// If avatar validation failed, redirect back
if (isset($_SESSION['signup'])) {
    $_SESSION['signup-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}

// Move uploaded avatar to images folder
if (!move_uploaded_file($avatar_tmp_name, $avatar_destination_path)) {
    $_SESSION['signup'] = 'Failed to upload avatar';
    $_SESSION['signup-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}

// ---- STEP 3: Check if username/email already exists ----
$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$user_check_result = mysqli_query($connection, $user_check_query);
if (mysqli_num_rows($user_check_result) > 0) {
    $_SESSION['signup'] = 'Username or email already exists';
    $_SESSION['signup-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}

// ---- STEP 4: Hash password and insert user ----
$hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

$insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) 
                      VALUES ('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$avatar_name', 0)";
$insert_user_result = mysqli_query($connection, $insert_user_query);

if ($insert_user_result) {
    $_SESSION['signup-success'] = 'Registration successful. Please login';
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
} else {
    die("MySQL Error: " . mysqli_error($connection));
}
?>
*/



require "config/database.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Only run if signup form is submitted or // if button was not clicked bounce back to sign up page -this was my last else in old y tb code
if (!isset($_POST['submit'])) {
    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}

// Get and sanitize form data
$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$createpassword = $_POST['createpassword'] ?? '';
$confirmpassword = $_POST['confirmpassword'] ?? '';
$avatar = $_FILES['avatar'] ?? null;

// ---- STEP 1: Validate inputs ----
if (!$firstname) {
    $_SESSION['signup'] = 'Please enter your first name';
} elseif (!$lastname) {
    $_SESSION['signup'] = 'Please enter your last name';
} elseif (!$username) {
    $_SESSION['signup'] = 'Please enter a username';
} elseif (!$email) {
    $_SESSION['signup'] = 'Please enter a valid email';
} elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
    $_SESSION['signup'] = 'Password should be at least 8 characters';
} elseif ($createpassword !== $confirmpassword) {
    $_SESSION['signup'] = 'Passwords do not match';
} elseif (!$avatar || $avatar['error'] !== 0) {// also this upgraded
    $_SESSION['signup'] = 'Please upload an avatar';
}
// If any validation failed (like missing fields, invalid email, or password too short)

if (isset($_SESSION['signup'])) {
    /// Store all the form data the user just typed into session
    // This allows the form to "remember" what the user typed before
    $_SESSION['signup-data'] = $_POST;
    //Redirect back to the signup page so the user can see the errors or Redirect back to the signup page
    
    // The signup page will display the error message
    // and pre-fill the form with the user's previous input
    // my note all this comments is written before the code or above this code 

    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}

// ---- STEP 2: Process avatar ----
$allowed_extensions = ['png', 'jpg', 'jpeg'];
$avatar_name = time() . '_' . basename($avatar['name']);
$avatar_tmp_name = $avatar['tmp_name'];
$avatar_destination_path = 'images/' . $avatar_name;

$ext = strtolower(pathinfo($avatar_name, PATHINFO_EXTENSION));
if (!in_array($ext, $allowed_extensions)) {
    $_SESSION['signup'] = 'Avatar must be png, jpg, or jpeg';
} elseif ($avatar['size'] > 1000000) {
    $_SESSION['signup'] = 'Avatar size must be less than 1MB';
}

// If avatar validation failed, redirect back
if (isset($_SESSION['signup'])) {
    $_SESSION['signup-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}

// Move uploaded avatar to images folder
if (!move_uploaded_file($avatar_tmp_name, $avatar_destination_path)) {
    $_SESSION['signup'] = 'Failed to upload avatar';
    $_SESSION['signup-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}

// ---- STEP 3: Check if username/email already exists ----
$check_sql = "SELECT id FROM users WHERE username = ? OR email = ?";
$check_stmt = $connection->prepare($check_sql);
$check_stmt->bind_param("ss", $username, $email);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    $_SESSION['signup'] = 'Username or email already exists';
    $_SESSION['signup-data'] = $_POST;
    header('Location: ' . ROOT_URL . 'signup.php');
    exit;
}
$check_stmt->close();

// ---- STEP 4: Hash password and insert user using prepared statement ----
$hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

$insert_sql = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) 
               VALUES (?, ?, ?, ?, ?, ?, 0)";
$insert_stmt = $connection->prepare($insert_sql);
$insert_stmt->bind_param("ssssss", $firstname, $lastname, $username, $email, $hashed_password, $avatar_name); // <- one line

if ($insert_stmt->execute()) {
    $_SESSION['signup-success'] = 'Registration successful. Please login';
    header('Location: ' . ROOT_URL . 'signin.php');
    exit;
} else {
    die("MySQL Insert Error: " . $insert_stmt->error);
}

$insert_stmt->close();
$connection->close();
?>




































/*
more profetional 
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

    $uploadDir = 'images/';
    $time = time();
    $original = basename($_FILES['avatar']['name']);
    $avatar_name = $time . '_' . $original;
    $tmp = $_FILES['avatar']['tmp_name'];
    $target = $uploadDir . $avatar_name;

    // validate
    $allowed = ['png', 'jpg', 'jpeg'];
    $ext = strtolower(pathinfo($avatar_name, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        $_SESSION['signup'] = 'File must be png, jpg, or jpeg';
    }
    elseif ($_FILES['avatar']['size'] > 1000000) {
        $_SESSION['signup'] = 'File size must be less than 1MB';
    }
    else {
        move_uploaded_file($tmp, $target);
    }
}
    Between the two, **your second idea is closer to “professional”**, because it tries to *validate* the upload (type + size).
The first snippet looks clean, but it is **not professional by itself** because it blindly accepts any file:


if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $imageName = basename($_FILES['image']['name']);
    $targetFile = $uploadDir . time() . '_' . $imageName;

    move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
}


This version:

* Does **not** check file type
* Does **not** check file size
* Allows `.php`, `.exe`, anything → **security risk**

So it is *simple*, but **not professional**.

Your second version is better in concept because it:

* Renames the file
* Checks extension
* Checks size
* Blocks wrong files

However, it has small bugs:

```php
$allowed_files = ['png,jpg,jpeg'];   // ❌ should be separate values
$extention = explode(',', $avatar_name); // ❌ should split by "."
```

A **professional version** combines both styles and fixes those issues:

```php
if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {

    $uploadDir = 'images/';
    $time = time();
    $original = basename($_FILES['avatar']['name']);
    $avatar_name = $time . '_' . $original;
    $tmp = $_FILES['avatar']['tmp_name'];
    $target = $uploadDir . $avatar_name;

    // validate
    $allowed = ['png', 'jpg', 'jpeg'];
    $ext = strtolower(pathinfo($avatar_name, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        $_SESSION['signup'] = 'File must be png, jpg, or jpeg';
    }
    elseif ($_FILES['avatar']['size'] > 1000000) {
        $_SESSION['signup'] = 'File size must be less than 1MB';
    }
    else {
        move_uploaded_file($tmp, $target);
    }
}
```

This is what “professional” looks like:

* Clean like the first
* Safe like your second
* Correct validation
* No confusing nested blocks

*/ 
 ?>