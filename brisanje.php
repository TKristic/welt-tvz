<?php
require_once 'config/config.php';

$user_id = $_GET['user_id'];

$sql = "DELETE FROM komentari WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);

header("Location : index.php");
exit();

