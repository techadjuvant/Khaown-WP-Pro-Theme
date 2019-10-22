<?php

global $emotahar;

$email_address = $_POST["email_address"];


$name = $_POST["name"];

$email = $_POST["email"];

$tabel_size = $_POST["table_size"];

$reservation_date = $_POST["reservation_date"];

$reservation_time_starts = $_POST["reservation_time_starts"];

$reservation_time_ends = $_POST["reservation_time_ends"];

$message = $_POST["message"];



$EmailTo = $email_address;

$Subject = $name ." has placed a reservation";

 

// prepare email body text

$Body .= "Name: " .$name ."\n";

$Body .= "Email: " .$email ."\n";

$Body .= "Tabe Size: " .$tabel_size ."\n";

$Body .= "Reservation Date: " .$reservation_date ."\n";

$Body .= "Reservation Time Starts: " .$reservation_time_starts ."\n";

$Body .= "Reservation Time Ends: " .$reservation_time_ends ."\n";

$Body .= "Message: " .$message ."\n";


 

// send email

$success = mail($EmailTo, $Subject, $Body, "From:".$email);

 

// redirect to success page

if ($success){

   echo "1";

}else{

    echo "0";

}

 