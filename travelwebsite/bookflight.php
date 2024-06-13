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

$flightName = isset($data['flightName']) ? $data['flightName'] : null;
$airport = isset($data['airport']) ? $data['airport'] : null;
$checkin = isset($data['checkin']) ? $data['checkin'] : null;
$checkout = isset($data['checkout']) ? $data['checkout'] : null;
$adults = isset($data['adults']) ? (int) $data['adults'] : 0;
$children = isset($data['children']) ? (int) $data['children'] : 0;

// Check if required fields are not null
if (is_null($flightName) || is_null($airport) || is_null($checkin) || is_null($checkout)) {
    echo json_encode(["success" => false, "message" => "Missing required fields."]);
    die();
}

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

$sql = "INSERT INTO flightbooking (userid, flightname, airportname, checkin, checkout, adults, children) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("issssii", $userid, $flightName, $airport, $checkin, $checkout, $adults, $children);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Booking successful"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
mysqli_close($con);
?>
