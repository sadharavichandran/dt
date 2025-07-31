<?php
include 'db_config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$aadhar = $_POST['aadhar'];
$voterid = $_POST['voterid'];

if (!preg_match("/^[0-9]{12}$/", $aadhar)) {
    echo "❌ Invalid Aadhaar number.";
    exit();
}

if (!preg_match("/^[A-Za-z0-9]{10,12}$/", $voterid)) {
    echo "❌ Invalid Voter ID.";
    exit();
}

$sql = "INSERT INTO users (name, email, password, aadhar, voterid) 
        VALUES ('$name', '$email', '$password', '$aadhar', '$voterid')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Registered successfully. <a href='index.html'>Login now</a>";
} else {
    echo "❌ Error: " . $conn->error;
}
?>
