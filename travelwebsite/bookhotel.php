<?php
session_start();

header("Content-Type: application/json");

if (!isset($_SESSION["username"])) {
    echo json_encode(["success" => false, "message" => "Unauthorized access."]);
    die();
}

$con = mysqli_connect("localhost", "root", "Chahat@2003", "travelwebsite");

if (!$con) {
    echo json_encode(["success" => false, "message" => "Database connection failed."]);
    die();
}

$username = $_SESSION["username"];
$data = json_decode(file_get_contents('php://input'), true);

$hotelName = $data['hotelName'];
$hotelStars = (int) $data['hotelStars']; // Ensure the stars are an integer
$checkin = $data['checkin'];
$checkout = $data['checkout'];
$adults = (int) $data['adults']; // Ensure adults is an integer
$children = (int) $data['children']; // Ensure children is an integer
$room = (int) $data['room']; 

$sql = "SELECT userid FROM users WHERE username = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userid = $row['userid'];
} else {
    echo json_encode(["success" => false, "message" => "User not found."]);
    $stmt->close();
    $con->close();
    die();
}

$stmt->close();

$sql = "INSERT INTO hotelbooking (userid, hname, cindate, coutdate, adults, children, rooms, star) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("issssiii", $userid, $hotelName, $checkin, $checkout, $adults, $children, $room, $hotelStars);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Booking successful"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
mysqli_close($con);
?>
