<?php
// DB connection
$servername='localhost';
$username='test';
$password='Test123$';
$dbname='myusers';
$con = new mysqli($servername,$username,$password,$dbname);

if($con->connect_error){
  echo "connection error: ".$con->connect_error;
}
// prepared statement, preventing XSS
$stmt=$con->prepare("INSERT INTO EMPLOYEE(name,email,position,phone,salary,date)
VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssss",$name,$email,$position,$phone,$salary,$date);
$name = $_POST[name];
$email = $_POST[email];
$position = $_POST[position];
$phone = $_POST[phone];
$salary = $_POST[salary];
$date = $_POST[date];
// execute and check prepared statement
if ($stmt->execute()) {
    include 'index.html';
    echo "<script>alert('A new record for ".$_POST[name]." was added succesfully.')</script>";
} else {
    echo "Insertion Error!";
}

$stmt->close();
$con->close();
?>
