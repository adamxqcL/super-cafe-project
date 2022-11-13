<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>super cafe</title>

</head>

<?php include ("header.php");?>

<h2 class="text-center">Edit a booking record</h2>

<?php

if ((isset ($_GET['id'])) && (is_numeric($_GET['id'])))
{
	$id = $_GET['id'];
}
elseif ((isset ($_POST['id'])) && (is_numeric($_POST['id'])))
{
	$id = $_POST['id'];
}
else 
{
	echo '<p class = "error">This page has been accessed in error. </p>';
	exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$error = array();
    //look for first name
	    if (empty ($_POST['date']))
	    {
		$error[] = 'You forgot to enter your first Name.';
	    }
		else
		{
			$nc = mysqli_real_escape_string ($connect, trim($_POST['date']));
		}
		
		//check for a email	
		if (empty($_POST['full_name']))
		{
			$error[] = 'You forgot to enter your email.';	
		}
		else 
		{
			$uc= mysqli_real_escape_string($connect, trim ($_POST['full_name']));
		}
	
		//check for a a no phone
		if (empty($_POST['phone_number']))
		{	
			$error = 'You forgot to enter your Phone Number.';
		}
		else 
		{
			$fc = mysqli_real_escape_string ($connect, trim ($_POST['phone_number']));
		}
		
		//check for a password	
		if (empty($_POST['how_many_person']))
		{
			$error = 'You forgot to enter your password.';
		}
		else
		{
			$pc = mysqli_real_escape_string ($connect, trim ($_POST['how_many_person']));
		}

	if(empty($error))
	{
		$q = "SELECT ID_B FROM booking WHERE phone_number='$fc' AND ID_B != $id";
		$result =@mysqli_query($connect,$q);

		if(mysqli_num_rows($result) == 0)
		{
			$q = "UPDATE booking SET date='$nc' , full_name='$uc' , phone_number='$fc', how_many_person='$pc'
			WHERE ID_B='$id' LIMIT 1";

        $result =@mysqli_query($connect,$q);
		
		if(mysqli_affected_rows($connect)== 1)
			{
              echo '<h3>The user has been edited</h3>'; 
              header('Location:booking-list.php');
			}
		else
		{
			echo '<p class="error">The user has not be edited due to the system error.We apologize for
			any convinience</p>';
			echo'<p>' .mysqli_error($connect). '<br/> query: '.$q.'</p>';
		}
	}
	else
	{
		echo'<p class="error">The no ic has already been registered</p>';
	}
}
	else
	{
		echo '<p class="error"> The following error (s) occurred: </br>';
		foreach ($error as $msg)
		{
			echo " -msg<br/> /n";
		}
		echo'</p><p>Please try again.</p>';
	}
}
$q= "SELECT date,full_name,phone_number,how_many_person FROM booking WHERE ID_B=$id";
$result = @mysqli_query($connect,$q);

if(mysqli_num_rows($result) == 1)
{
	$row = mysqli_fetch_array ($result,MYSQLI_NUM);

	echo'<form action ="edit-booking.php" method="post">

	<fieldset>
	<p><br><label class = "order-label" for="date"> Name: </label>
	<input id="date" type="text" name= "date" size="30" maxlength="30" class="input-responsive" value="'.$row[0].'"></p>

	<p><br><label class = "order-label" for="full_name"> Username: </label>
	<input id="full_name" type="text" name= "full_name" size="30" maxlength="30" class="input-responsive" value="'.$row[1].'"></p>

	<p><br><label class = "order-label" for="phone_number"> Phone Number: </label>
	<input id="phone_number" type="text" name= "phone_number" size="30" maxlength="30" class="input-responsive" value="'.$row[2].'"></p>

	<p><br><label class = "order-label" for="how_many_person"> how many person: </label>
	<input id="how_many_person" type="text" name= "how_many_person" size="30" maxlength="30" class="input-responsive" value="'.$row[3].'"></p>

	<br><p><input id = "submit" type = "submit" name="submit" value="Edit" class="btn btn-primary"></p>
	<br><input type="hidden" name="id" value="'.$id.'"/>
    
    </fieldset>
	</form>';
}
else
{
	echo '<p class="error">This page has been acessed in error.</p>';
}

mysqli_close($connect);
?>