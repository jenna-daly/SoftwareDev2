<!--
This file is prints_login_tools.php
This file contains PHP login helper functions.
Orginally created by Ron Coleman.
History:
Who    Date        Comment
RC     7-Nov-13    Created.
-->
<?php
# Includes these helper functions
require( 'C:\Program Files (x86)\EasyPHP-Devserver-17\eds-www\limbohelpers.php' ) ;

# Loads a specified or default URL.
function load( $page = 'adminlanding.php', $pid = -1 )
{
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL and the print id.
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page . '?id=' . $pid;

  # Execute redirect then quit.
  session_start( );

  header( "Location: $url" ) ;

  exit() ;
}

# Validates the print name.
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validate($email = '')
{
    global $dbc;

    if(empty($email))
      return -1 ;

#email may be valid but not for admin purposes
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "This email address is not in the system.\n";
		}
#checks for valid email w @ and a .		
	else {
    echo "This email address is not valid.\n";
		}

    # Make the query
    $query = "SELECT email FROM users WHERE email='" . $email . "'"  ;
    #show_query($query) ;

    # Execute the query
    $results = mysqli_query( $dbc, $query ) ;
    check_results($results);

    # If we get no rows, the login failed
    if (mysqli_num_rows( $results ) == 0 )
      return -1 ;

    # We have at least one row, so get the frist one and return it
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

    $pid = $row [ 'id' ] ;

    return intval($pid) ;
}

function validatetwo($pass = '')
{
    global $dbc;

    if(empty($pass))
      return -1 ;

    # Make the query
    $query = "SELECT pass FROM users WHERE pass='" . $pass . "'"  ;
    #show_query($query) ;

    # Execute the query
    $results = mysqli_query( $dbc, $query ) ;
    check_results($results);

    # If we get no rows, the login failed
    if (mysqli_num_rows( $results ) == 0 )
      return -1 ;

    # We have at least one row, so get the frist one and return it
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

    #$pidtwo = $row [ 'id' ] ;

    #return intval($pidtwo) ;
}



?>