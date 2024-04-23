<?php
$host = 'witstudentregistration-server.mysql.database.azure.com'; // Replace with your Azure MySQL database host address
$dbname = 'studentdb';  // Make sure the database name is correct
$username = 'wbeztaktxc';  // Your MySQL username
$password = 'Taqwa123!';  // Your MySQL password

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO Students (FirstName, LastName, Email, DateOfBirth, EnrollmentDate, Major) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $firstName, $lastName, $email, $dateOfBirth, $enrollmentDate, $major);

// Set parameters and execute
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$dateOfBirth = $_POST['dateOfBirth'];
$enrollmentDate = $_POST['enrollmentDate'];
$major = $_POST['major'];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
