<!DOCTYPE html>
<html>
<body>

<?php
include 'connection.php';			// this conects to MySQL database

// This Query reads the lastnames from the file "lastnames.out"
$myfile = fopen("firstnames.out", "r") or die("Unable to open file:- firstnames.out !");

// Output one line until end-of-file
while(!feof($myfile)) {
 $f_name = fgets($myfile);
 $insert= "INSERT INTO firstnames VALUES('$f_name')";
 
  if( $conn->query($insert)=== true)
	{
	echo $f_name . "<br>" ;
	}
}
fclose($myfile);

// This Query reads the lastnames from the file "lastnames.out"
$myfile = fopen("lastnames.out", "r") or die("Unable to open file :- lastnames.out !");

// Output one line until end-of-file
while(!feof($myfile)) {
 $l_name = fgets($myfile);
 $insert= "INSERT INTO lastnames VALUES('$l_name')";
 
	 if( $conn->query($insert)=== true)
	{
	echo $l_name . "<br>";
	}
}
fclose($myfile);

// This MySQL Query Performs mysql database with all possible combinations using the first and last names.
$insert = "INSERT INTO user  (SELECT * FROM firstnames, lastnames)";
if( $conn->query($insert)=== true)
	{
	echo "first name and last name inserted";
	}
?>

</body>
</html>