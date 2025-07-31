<?php
include 'db_config.php';
session_start();

$user_id = $_SESSION['user_id'];
$candidate = $_POST['candidate'];

$sql_check = "SELECT * FROM votes WHERE user_id = $user_id";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    echo "⚠️ You have already voted!";
} else {
    $sql = "INSERT INTO votes (user_id, candidate) VALUES ($user_id, '$candidate')";
    if ($conn->query($sql) === TRUE) {
        echo "✅ Vote submitted successfully!";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>
