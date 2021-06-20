<?php
//include('dbconnection.php');
include("database_connection.php");

if(isset($_POST['action']))
{
    if($_POST['action']=='insert')
    {
        $Query="insert into tbl_sample (first_name,last_name) values ('". $_POST["first_name"]."', '". $_POST["last_name"]."')";
        // $run=mysqli_query($connect,$Query);
		// echo "Data Inserted";
		$statement = $connect->prepare($Query);
		$statement->execute();
    }

    if($_POST['action']=='delete')
    {
        $Query="DELETE FROM tbl_sample WHERE id='". $_POST["id"]."'";
		//$Run=mysqli_query($connect,$Query);
		$statement = $connect->prepare($Query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
    }

	if($_POST["action"] == "fetch_single")
	{
		$query = "
		SELECT * FROM tbl_sample WHERE id = '".$_POST["id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['first_name'] = $row['first_name'];
			$output['last_name'] = $row['last_name'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE tbl_sample 
		SET first_name = '".$_POST["first_name"]."', 
		last_name = '".$_POST["last_name"]."' 
		WHERE id = '".$_POST["hidden_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
}
?>