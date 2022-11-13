<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="include.css" />
</head>

<body>

<?php include ("header.php");?>

<?php

$q = "SELECT ID_B,date,full_name,phone_number,how_many_person FROM booking ORDER BY ID_B";

$result = @mysqli_query($connect,$q);

if($result)
{
	echo '<table border = "2">
		<tr><td><b>Edit</b></td>
		    <td><b>Delete</b></td>
		    <td><b>ID_B</b></td>
            <td><b>date</b></td>
			<td><b>full_name</b></td>
			<td><b>phone_number</b></td>
			<td><b>how_many_person</b></td>
		</tr>';

			while($row =mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				echo '<tr>
				<td><a href  ="edit-booking.php?id='.$row['ID_B'].'">Edit</a></td>
				<td><a href  ="delete-booking.php?id='.$row['ID_B'].'">Delete</a></td>
				<td>'.$row['ID_B']. '</td>
				<td>'.$row['date']. '</td>
				<td>'.$row['full_name']. '</td>
				<td>'.$row['phone_number']. '</td>
				<td>'.$row['how_many_person']. '</td>
				</tr>';
			}
			
			echo'</table>';
			mysqli_free_result ($result);
}
else
{
	echo'<p class = "error" > The current student could not be retrieved.We apologize for any inconvinience </p>';
	echo'<p>'.mysqli_error($connect).'<br><br/>Query: '.$q.'</p>';
} //end of it ($result) 
//close the database connection
mysqli_close($connect);
?>
</div>
</div>
</body>
</html>