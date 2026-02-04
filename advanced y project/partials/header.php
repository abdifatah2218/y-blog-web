<?php
/*require 'config/database.php';
if(isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id='$id'";
    $result = mysqli_query($connection, $query);
    $avatar =  mysqli_fetch_assoc($result);
}
*/
/*?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="max-age=3600">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>

    <!-- CUSTOM STYLESHEET -->
<link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">

<?php if (strpos($_SERVER['PHP_SELF'], '/admin/') !== false): ?>
<link rel="stylesheet" href="<?= ROOT_URL ?>css/admin.css">
<?php endif; ?>


    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <!-- GOOGLE FONT(MONTSERATE) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,800;1,700&display=swap" rel="stylesheet"> 
</head> 
<body>

    <nav>
        <div class="container nav__container">
            <a href="<?= ROOT_URL ?>index.php" class="nav__logo">UNDEREMPLOYED</a>
            <ul class="nav__items">
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                <?php if(isset($_SESSION['user-id'])) : ?>
                
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>/admin/index.php">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                    </ul>
                </li>
                <?php else : ?>
                    <li><a href="<?= ROOT_URL ?>signin.php">SignIn</a></li>
                <?php endif ?>
            </ul>
            
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!-- ======================== END OF NAV ======================== -->
*/


// i deleted <?php closing tAg
require 'config/database.php';

/*
|--------------------------------------------------------------------------
| Navbar auth logic (minimal & professional)
|--------------------------------------------------------------------------
*/

$avatar = 'default-avatar.png';

if (isset($_SESSION['user-id'])) {
    $userId = (int) $_SESSION['user-id'];

    $stmt = $connection->prepare(
        "SELECT avatar FROM users WHERE id = ? LIMIT 1"
    );

    if ($stmt) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (!empty($user['avatar'])) {
                $avatar = $user['avatar'];
            }
        }
    }
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="max-age=3600">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>

    <!-- CUSTOM STYLES -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">

    <?php if (strpos($_SERVER['PHP_SELF'], '/admin/') !== false): ?>
        <link rel="stylesheet" href="<?= ROOT_URL ?>css/admin.css">
    <?php endif; ?>

    <!-- ICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;800&display=swap" rel="stylesheet">
</head>
<body>

<nav>
    <div class="container nav__container">
        <a href="<?= ROOT_URL ?>index.php" class="nav__logo">UNDEREMPLOYED</a>

        <ul class="nav__items">
            <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
            <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
            <li><a href="<?= ROOT_URL ?>services.php">Services</a></li>
            <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>

            <?php if (isset($_SESSION['user-id'])): ?>
                <li class="nav__profile">
                    <div class="avatar">
                        <img
                            src="<?= ROOT_URL ?>images/<?= htmlspecialchars($avatar) ?>"
                            alt="User Avatar"
                        >
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="<?= ROOT_URL ?>signin.php">Sign In</a></li>
            <?php endif; ?>
        </ul>

        <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
        <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
    </div>
</nav>
<!-- ======================== END OF NAV ======================== -->
