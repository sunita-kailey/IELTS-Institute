<?php
function connection()
{
 $dsn="mysql:host=localhost;dbname=project";
 $username="root";
 $password="";
	try 
	{
		$conn = new PDO($dsn, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn; 
	} 
	catch(PDOException $e)
	{
		echo "not connected";
		return 0;
	}
}


function insert_data($sql)
{
	$conn=connection();
	$row=$conn->exec($sql);
	return $row;
	
}


function delete_data($sql)
{
$conn=connection();
	$row=$conn->exec($sql);
	return $row;	

}


function update_data($sql)
{
 $conn=connection();
	$row=$conn->exec($sql);
	return $row;	
}

function get_data($sql)
{
	$conn=connection();
	
			$stmt=$conn->prepare($sql);
			$stmt->execute();
			return $stmt;
}

?>