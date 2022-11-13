<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reservation Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/booking-style.css">
    </head>
    <body>
        
<?php 
    // call file to connect to server 
    include ("header.php"); ?>       
<?php 


//This query inserts a record in the clinic table 
//has form been submitted? 
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
$error = array (); //initialize an error array

// check for a FirstName 
if (empty($_POST['full_name'])) {
    $error [] = 'You forgot to enter your full name.';
}
else {
    $n = mysqli_real_escape_string ($connect, trim ($_POST ['full_name']));
}

// check for a People 
if (empty($_POST['how_many_person'])) {
    $error [] = 'You forgot to enter your people quantity.';
}
else {
    $p = mysqli_real_escape_string ($connect, trim ($_POST ['how_many_person']));
}

// check for a date 
if (empty($_POST['date'])) {
    $error [] = 'You forgot to enter your date.';
}
else {
    $d = mysqli_real_escape_string ($connect, trim ($_POST ['date']));
}



// check for a date 
if (empty($_POST['phone_number'])) {
    $error [] = 'You forgot to enter your phone number.';
}
else {
    $pn = mysqli_real_escape_string ($connect, trim ($_POST ['phone_number']));
}
 
 
    //make the query: 
    $q = "Insert INTO booking ( full_name, how_many_person, date,  phone_number) VALUES ( '$n', '$p', '$d',  '$pn')"; 
    $result = @mysqli_query($connect, $q); // run the query 
    if ($result){ 
 
     //if it runs 

header('Location: http://localhost/super_cafe_project/');
    exit(); 
    } else { //if it did not run 
    //message 
        echo '<h1>System error</h1>';
//debugging message 
echo '<p>' .mysqli_error($connect).'<br><br>Query: '.$q. '</p>'; 
}//end of it (result) 
mysqli_close($connect); //close the database connecttion. 
exit();

}
?>
 <section class = "banner">
            <h2>BOOK YOUR TABLE NOW</h2>
            <form action="booking.php" method="post">
            <div class = "card-container">
                <div class = "about-img">
                    <!-- image here -->
                </div>

                <div class = "card-content">
                    <h3>Reservation</h3>
                    <form>
                        <div class = "form-row">
 	<input class="w3-input w3-padding-16" type="date" placeholder="Date and time" required name="date" value="2020-11-16T20:00"
	"<?php if (isset($_POST['date'])) echo $_POST ['date']; ?>" required>
                        </div>

                        <div class = "form-row">
                            <input type = "text" placeholder="full name" name="full_name" 
                            value="<?php if (isset($_POST['full_name'])) echo $_POST ['full_name']; ?>">
                            <input type = "text" placeholder="phone number" name="phone_number"
                            value="<?php if (isset($_POST['phone_number'])) echo $_POST ['phone_number']; ?>">
                        </div>

                        <div class = "form-row">
                            <input type = "number" placeholder="how many persons?" min = "1" name="how_many_person"
                            value="<?php if (isset($_POST['how_many_person'])) echo $_POST ['how_many_person']; ?>">
                            <input type = "submit" value = "BOOK TABLE">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        
    </body>
</html>