

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>

<body  bgcolor="#bbcdef">
<?php
include 'connection.php';
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<label>First Name or Last Name :</label><br>
	<input type="text" name="f_name" required="required"><br>
	<input type="submit" value="Search" name="search">
</form>
<?php
if(isset($_POST['f_name']))
{		
	$name = $_POST['f_name'];
	$len = strlen($name);
	
	// this condition checks searching string is atleast 3 letters
	if($len >= 3)
	{
		// This query gives the five maches anywhere in firstnames or lastnames by using given input --if found
		
		 $query = "select distinct(f_name), l_name from user where f_name like '%$name%' or l_name like '%$name%' limit 0,5"; 
		 $result=$conn->query($query);
			if( $conn->query($query)== true)
			{
				echo "Searched for : " . $name. ":---" .  "<br>";
					if ($result->num_rows > 0)
 					{
    					// output data of each row
    					while($row = $result->fetch_assoc())
	 					{
						echo $row["f_name"] . " " . $row["l_name"] . "<br>";
		
						}
   	 				}
					else
		  			echo "Not found!"; 
		  }	
	}
	else
	{
		echo"Please enter more atleast 3 letters";
	}
	
}

?>
</body>
</html>
