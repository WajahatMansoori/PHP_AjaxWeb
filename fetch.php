<?php

//fetch.php

include("dbconnection.php");

$query = "SELECT * FROM tbl_sample";
//$statement = $con->prepare($query);
$Row=mysqli_query($con,$query);
$TotalRow=mysqli_num_rows($Row);
//$statement->execute();
//$result = $statement->fetchAll();
//$total_row = $statement->rowCount();

// $output = '
// <table class="table table-striped table-bordered">
// 	<tr>
// 		<th>First Name</th>
// 		<th>Last Name</th>
// 		<th>Edit</th>
// 		<th>Delete</th>
// 	</tr>
// ';
?>
<table class="table">
    <tr>
        <th>First Name</th>
 		<th>Last Name</th>
    	<th>Edit</th>
 		<th>Delete</th>
    </tr>


<?php
if($TotalRow > 0)
{
    	
    //foreach($result as $row)
    while($data=mysqli_fetch_array($Row))
	{
		// $output .= '
		// <tr>
		// 	<td width="40%">'.$row["first_name"].'</td>
		// 	<td width="40%">'.$row["last_name"].'</td>
		// 	<td width="10%">
		// 		<button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row["id"].'">Edit</button>
		// 	</td>
		// 	<td width="10%">
		// 		<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["id"].'">Delete</button>
		// 	</td>
		// </tr>
        // ';
        echo "<tr>
        <td>".$data[1]."</td>
        <td>".$data[2]."</td>
        <td width='10%'>
				<button type='button' name='edit' class='btn btn-primary btn-xs edit' id='".$data["id"]."'>Edit</button>
		</td>
		<td width='10%''>
				<button type='button' name='delete' class='btn btn-danger btn-xs delete' id='".$data["id"]."'>Delete</button>
		</td>
        </tr>";
	}
}
else
{
	// $output .= '
	// <tr>
	// 	<td colspan="4" align="center">Data not found</td>
	// </tr>
    // ';
    echo "<tr>
    <td>No Rows Found</td>
    </tr>";
}
// $output .= '</table>';
// echo $output;
?>
</table>