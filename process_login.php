<?php
include 'db_config.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$aadhar = $_POST['aadhar'];
$voterid = $_POST['voterid'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND aadhar = ? AND voterid = ?");
$stmt->bind_param("sss", $email, $aadhar, $voterid);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        header("Location: vote.php");
        exit();
    } else {
        echo "❌ Incorrect password.";
    }
} else {
    echo "❌ User not found or Aadhaar/Voter ID doesn't match.";
}

$stmt->close();
$conn->close();
?>
