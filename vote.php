<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Vote Now</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Cast Your Vote</h2>
  <form action="submit_vote.php" method="post">
    <label><input type="radio" name="candidate" value="Candidate A" required> Candidate A</label><br>
    <label><input type="radio" name="candidate" value="Candidate B" required> Candidate B</label><br>
    <button type="submit">Submit Vote</button>
  </form>
</body>
</html>
