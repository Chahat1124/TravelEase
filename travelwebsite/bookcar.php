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

$carName = $data['name'];
$carSeats = (int) $data['seats']; 
$pickup = $data['pickup'];
$dropoff = $data['dropoff'];
$price = (int) $data['price']; 
$start = $data['start'];
$end = $data['end'];


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

$sql = "INSERT INTO carbooking (userid, car_name, seats, price, pickup_date, dropoff_date, pickup_time, dropoff_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("issssiii", $userid, $carName, $carSeats,$price, $pickup, $dropoff, $start, $end);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Booking successful"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
}

$stmt->close();
mysqli_close($con);
?>
