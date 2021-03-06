<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Style-Type" content="text/css" /> 
    <title>Current Submissions</title>
    <link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
    <link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="/library/js/headscripts.js"></script>
    <style>body { padding: 5px !important; }</style>
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
a:link, a:visited {
    background-color: red;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

a:hover {
	background-color:grey;
}

p {
	display: inline-block;
	margin-top: 20px;
	margin-left: 60px;
	text-align: center;
}
</style>
  </head>
  <body>
  <ul>
  <li><a href="landing.php">Home</a></li>
  <li><a href="lost.php">Lost Something?</a></li>
  <li><a href="found.php">Found something?</a></li>
  <li><a href="limbo_login.php">Admins</a></li>
</ul>
<p><a href= "admin.php"> Delete an Entry </a></p>
<p><a href= "admin1a.php"> Update Status </a></p>
<p><a href= "admin1b.php"> Change Password </a></p>
<p><a href= "admin1c.php"> Add Admin </a></p>
<p><a href= "admin1d.php"> Delete Admin </a></p> 
<?php
    
#Jenna Daly
# Version 1.5 November 2, 2017
# Lab 9

# Connect to MySQL server and the database
require( 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\connect_db.php' ) ;
# Includes these helper functions
require( 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\limbohelpers.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $email = $_POST['email'] ;

    $pass = $_POST['pass'] ;


}
    
# Validates fields top insert into table
/*if(!valid_number($number)) {
  echo '<p style="color:red">Number error.</p>' ;
} else if (!valid_lname($fname)) {
  echo '<p style="color:red">First name error.</p>' ;
} else if (!valid_lname($lname)) {
  echo '<p style="color:red">Last name error.</p>' ;
} else { */

    insert_recordtwo($dbc, $email, $pass);


    
# If user opened the page without submitting, initialize the fields
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
  $email = "" ;
  $pass = "" ;

if(isset($_GET['id'])) show_record($dbc, $_GET['id']) ;
}

    
# Otherwise, user submitted the form, so let's validate
else if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    
  # Initialize an error array.
  $errors = array();

    $email = $_POST['email'] ;

    $pass = $_POST['pass'] ;
    

  # Check for a name & email address.
  if ( empty( $_POST[ 'email' ] ) ) {
  	$errors[] = 'email' ;
  }
  else {
  	$email = trim( $email )  ;
  }

  if ( empty( $_POST[ 'pass' ] ) ) {
  	$errors[] = 'pass' ;
  }
  else {
  	$pass = trim( $pass )  ;
  }


  # Report result.
  if( !empty( $errors ) )
  {
    echo 'Error! Please enter your ' ;
    foreach ( $errors as $field ) { echo " - $field " ; }
  }
  else {
  	echo "<p>Success! Thanks!</p>" ;
  }
}

 
# Show the link records
show_recordstwo($dbc);

# Close the connection
mysqli_close( $dbc ) ;
    

# Show the input form with whatever we got for fields
  show_form($email,$pass) ;



# Shows the input form
function show_form($email,$pass) {
  echo '<form action="admin1c.php" method="POST">' ;
  echo '<p>Add Email: <input type="text" name="email" value="' . $email . '"> </p> ' ;
  echo '<p>With Password: <input type="text" name="pass" value="' . $pass . '"></p>' ;   
  echo '<p><input type="submit"></p>' ;
  echo '</form>' ;
}
    
?>

</html>