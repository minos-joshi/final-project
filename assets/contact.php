<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


/*  database connection  */

$conn = new mysqli('localhost','root','','client_data');
if($conn->connect_error)
{
    die('Connection_failed : '.$conn->connect_error );
}
else{
    $stmt = $conn->prepare("Insert into datasheet(name, email, message)
            values(?,?,?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    echo "Message sent succesfully...";
    $stmt->close();
    $conn->close();


}
?>