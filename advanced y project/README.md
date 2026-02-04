# Responsive-Blog-Website

The PHP & MySQL Blog App with Admin Panel project is a web application that allows users to create and manage blog posts, categories, and users. The app is built using PHP and MySQL, two popular technologies for web development, and features a robust CRUD functionality that enables users to Create, Read, Update, and Delete posts, categories, and users.

# Technologies Used

- PHP
- MySQL
- HTML
- CSS
- JavaScript
- XAMPP Web Server

# Features

- Blog post management (CRUD functionality)
- Category management (CRUD functionality)
- User management and authentication (CRUD functionality)
- Sign in and sign up functionality
- Dashboard for users and admin
- Responsive Design
- Search funcrionality
- Live demo available

# Live Demo

|  #  | WebPage           | Live Demo                                                                                 |
| :-: | ----------------- | ----------------------------------------------------------------------------------------- |
| 01  | Index             | [Live Demo](https://underemployed.lovestoblog.com/index.php)                              |
| 02  | Blog              | [Live Demo](https://underemployed.lovestoblog.com/blog.php)                               |
| 03  | Category_Post     | [Live Demo](https://underemployed.lovestoblog.com/category-posts.php)                     |
| 04  | About             | [Live Demo](https://underemployed.lovestoblog.com/about.php)                              |
| 05  | Services          | [Live Demo](https://underemployed.lovestoblog.com/services.php)                           |
| 06  | Contact           | [Live Demo](https://underemployed.lovestoblog.com/contact.php)                            |
| 07  | SignIn            | [Live Demo](https://underemployed.lovestoblog.com/signin.php)                             |
| 08  | SignUp            | [Live Demo](https://underemployed.lovestoblog.com/signup.php)                             |
| 09  | Dashboard         | [Live Demo](https://underemployed.github.io/blog_website_template/dashboard.html)         |
| 10  | Edit_Posts        | [Live Demo](https://underemployed.github.io/blog_website_template/edit-post.html)         |
| 11  | Add_Post          | [Live Demo](https://underemployed.github.io/blog_website_template/add-post.html)          |
| 12  | Add_User          | [Live Demo](https://underemployed.github.io/blog_website_template/add-user.html)          |
| 13  | Manage_Users      | [Live Demo](https://underemployed.github.io/blog_website_template/manage-users.html)      |
| 14  | Edit_User         | [Live Demo](https://underemployed.github.io/blog_website_template/edit-user.html)         |
| 15  | Add_Category      | [Live Demo](https://underemployed.github.io/blog_website_template/add-category.html)      |
| 16  | Manage_Categories | [Live Demo](https://underemployed.github.io/blog_website_template/manage-categories.html) |
| 16  | Edit_Category     | [Live Demo](https://underemployed.github.io/blog_website_template/edit-category.html)     |

# Screenshots

- users Table (for storing users data both job seeker and provider ) (user field can be seeker or provider based on they select on the sign up page)

![Screenshot (118)](https://github.com/Underemployed/PHP-MySQL-Blog-Website-with-Admin-Panel-Backend/blob/main/user.png?raw=true)

- posts Table

![Screenshot (119)](https://github.com/Underemployed/PHP-MySQL-Blog-Website-with-Admin-Panel-Backend/blob/main/post.png?raw=true)

- categories Table

![Screenshot (119)](https://github.com/Underemployed/PHP-MySQL-Blog-Website-with-Admin-Panel-Backend/blob/main/categ.png?raw=true)



MY REVI 

1 :31 
CONFIQ IN REQIURE one have .../ and other not have why
..PARTIAL 3 doted 
config ya admin and cofig ya frnt end
why this db has password and root
// confiq url and how to linkl with css learn very well
// ose lines are not shown directly in the browser.
They work behind the scenes in PHP to prepare data for the HTML form.

$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname  = $_SESSION['signup-data']['lastname'] ?? null;
$username  = $_SESSION['signup-data']['username'] ?? null;
$email     = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;


Purpose:

Take old form values from $_SESSION['signup-data']

Put them into normal PHP variables

If nothing exists, make them empty (null)

These values are later inserted into the form inputs like this:

<input type="text" name="firstname" value="<?= $firstname ?>">
<input type="text" name="lastname"  value="<?= $lastname ?>">
<input type="text" name="username"  value="<?= $username ?>">
<input type="email" name="email"     value="<?= $email ?>">


So what the browser sees is:

If the user previously typed Ali as first name → the input box shows Ali

If there was no previous value → the input box is blank

The browser never sees $_SESSION or those PHP lines.
The browser only receives the final HTML, for example:

<input type="text" name="firstname" value="Ali">


or, if empty:

<input type="text" name="firstname" value="">


This line:

unset($_SESSION['signup-data']);


Just clears the memory after using it, so old data does not stay forever.

In short:

PHP reads old data from session

Puts it into form fields

Browser only sees filled or empty input boxes

User feels: “My data is still here after an error”
// PASSWORD DONT MATCH AND SILL REDIRECTING TO SIGNUP LOGIC WHY?