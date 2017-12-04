<?php
$debug = true;

#Jenna Daly

# Shows the records in prints
function show_records($dbc) {
	# Create a query to get the name and price sorted by price
$query = 'SELECT datelost, item, location, description, status FROM stuff ORDER BY datelost DESC' ;

# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Limbo Landing Page</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>Date/time Lost</TH>';
  echo '<TH>Item</TH>'; 
  echo '<TH>Location</TH>';
  echo '<TH>Description</TH>';
  echo '<TH>Status</TH>';  
  echo '</TR>';


  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    echo '<TR>' ;
    echo '<TD>' . $row['datelost'] . '</TD>' ;
    echo '<TD>' . $row['item'] . '</TD>' ;
    echo '<TD>' . $row['location'] . '</TD>' ;
    echo '<TD>' . $row['description'] . '</TD>' ; 
    echo '<TD>' . $row['status'] . '</TD>' ;
    echo '</TR>' ;
  }

  # End the table
  echo '</TABLE>';

  # Free up the results in memory
  mysqli_free_result( $results ) ;
	}
}
 

# Shows the link records in prints
function show_link_records($dbc) {
	# Create a query to get the name and price sorted by price
$query = 'SELECT id, item, datelost, location FROM stuff ORDER BY id ASC' ;

# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Limbo Landing Page</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>ID</TH>';
  echo '<TH>Date/time Lost</TH>';
  echo '<TH>Item</TH>'; 
  echo '<TH>Location</TH>';  
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    echo '<TR>' ;
   $alink = '<A HREF=landing.php?id=' . $row['id']  . '>' . $row['id'] . '</A>' ;
    echo '<td style=“text-align:center;”>' . $alink . '</TD>' ;
    echo '<TD>' . $row['datelost'] . '</TD>' ;
    echo '<TD>' . $row['item'] . '</TD>' ;
    echo '<TD>' . $row['location'] . '</TD>' ;
    echo '</TR>' ;
  
  
  }
    
  # End the table
  echo '</TABLE>';

  # Free up the results in memory
  mysqli_free_result( $results ) ;
	}
    
}


# Shows the records in prints
function show_record($dbc, $id) {
    echo "in show records";
	# Create a query to get the name and price sorted by price
#$query = 'SELECT datelost, location,item,description, contact_info FROM stuff WHERE item = ' . $item ;
$query = 'SELECT id, datelost, location,item,description, contact_info FROM stuff WHERE id = ' . $id ;


# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Selected Item</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>Date/time Lost</TH>';
  echo '<TH>Item</TH>'; 
  echo '<TH>Location</TH>';
  echo '<TH>Description</TH>';
  echo '<TH>Status</TH>';
  echo '<TH>Contact Info</TH>';    
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    echo '<TR>' ;
    echo '<TD>' . $row['datelost'] . '</TD>' ;
    echo '<TD>' . $row['item'] . '</TD>' ;
    echo '<TD>' . $row['location'] . '</TD>' ;
    echo '<TD>' . $row['description'] . '</TD>' ;
    echo '<TD>' . $row['status'] . '</TD>' ;
    echo '<TD>' . $row['contact_info'] . '</TD>' ;  
    echo '</TR>' ;
  }


  # End the table
  echo '</TABLE>';

  # Free up the results in memory
  mysqli_free_result( $results ) ;
	}
}
function show_recordstwo($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT email, pass FROM users' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Admins</H1>' ;
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>Email</TH>';
  		echo '<TH>Password</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['email'] . '</TD>' ;
    		echo '<TD>' . $row['pass'] . '</TD>' ;

    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}


# Inserts a record into the prints table
function insert_record($dbc, $datelost, $location, $item, $desc, $contact, $status) {
  $query = 'INSERT INTO stuff(datelost, location, item, description, contact_info, status) VALUES ("' . $datelost . '", "' . $location . '" , "' . $item . '" , "' . $desc . '", "' . $contact . '", "' . $status . '")' ;
 # show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

function insert_recordtwo($dbc, $email, $pass) {
  $query = 'INSERT INTO users(email, pass) VALUES ("' . $email . '", "' . $pass . '")' ;
 # show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}

function valid_number($num) {
if(empty($num) OR !is_numeric($num))
    return false ;
else {
$num = intval($num) ;
if($num <= 0)
return false ;
    }
return true ;
}

function valid_fname($fname) {
    if(empty($fname))
       return false ;
       else {
           return true ;
       }
}

function valid_lname($lname) {
    if(empty($lname))
       return false ;
       else {
           return true ;
       }
}


?>