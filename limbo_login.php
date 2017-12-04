<!--
This file is prints_login.php
This PHP script front-ends linkyprints.php with a login page.
Originally created By Ron Coleman.
Revision history:
Who    Date        Comment
RC  07-Nov-13   Created.
-->
<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
	overflow: hidden;
    background-color: red;
	text-align: center;
}

li {
    float: left;
	border-right: 1px solid #bbb;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 12px 12px;
}

li a:hover {
    background-color:grey ;
}
</style>
</head>
<body>

<ul>
  <li><a href="landing.php">Home</a></li>
  <li><a href="lost.php">Lost Something?</a></li>
  <li><a href="found.php">Found something?</a></li>
  <li><a href="quicklinks.php">Quick Links</a></li>
  <li><a href="limbo_login.php">Admins</a></li>
</ul>

</body>
</html>
<html>
<?php
# Connect to MySQL server and the database
require( 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\connect_db.php' ) ;

# Connect to MySQL server and the database
require( 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\limbo_login_tools.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

    $user = $_POST['user'] ;

    $pid = validate($user) ;

	$password = $_POST['password'] ;

    $pidtwo = validatetwo($password) ;

    if($pid == -1 || $pidtwo == -1 )
      echo '<P style=color:red>Login failed please try again.</P>' ;

    else
      load('adminlanding.php'); #,$pid);
}
?>
<!-- Get inputs from the user. -->
<h1>Admin Login</h1>
<form action="limbo_login.php" method="POST">
<table>
<tr>
<td>Email:</td><td><input type="text" name="user"></td>
<td>Password:</td><td><input type="password" name="password"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>