<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "free_scheduling_system";

// Create connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Form submitted successfully!";
    error_log(print_r($_POST, true));

    // Retrieve and sanitize input
    $first_name = $conn->real_escape_string(trim($_POST['first_name']));
    $middle_name = $conn->real_escape_string(trim($_POST['middle_name']));
    $last_name = $conn->real_escape_string(trim($_POST['last_name']));
    $birthday = $conn->real_escape_string(trim($_POST['birthday']));
    $gender = $conn->real_escape_string(trim($_POST['gender']));
    $contact_number = $conn->real_escape_string(trim($_POST['contact_number']));
    $address = $conn->real_escape_string(trim($_POST['address']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = trim($_POST['password']);

    // Basic input validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if (strlen($password) < 8) {
        die("Password should be at least 8 characters.");
    }
    

    // Check if user already exists based on email
    $stmt = $conn->prepare("SELECT * FROM Users WHERE email = ?"); // Use correct column name
    if (!$stmt) {
        die("Prepare failed: " . $conn->error); // Debugging line
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "You already have an account!";
    } else {
        // Calculate age
        $dob = new DateTime($birthday);
        $now = new DateTime();
        $age = $now->diff($dob)->y;
        if ($result->num_rows > 0) {
            echo "You already have an account!";
        } else {
            // Calculate age
            $dob = new DateTime($birthday);
            $now = new DateTime();
            $age = $now->diff($dob)->y;
        // Hash the password for secure storage
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        }
        // Insert the user data into the database
        $stmt = $conn->prepare("INSERT INTO Users (first_name, middle_name, last_name, age, birthday, email, password, phone_number, gender, address) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); // Ensure 'email' is correct
        if (!$stmt) {
            die("Prepare failed: " . $conn->error); // Debugging line
        }

        $stmt->bind_param("sssissssss", $first_name, $middle_name, $last_name, $age, $birthday, $email, $hashed_password, $contact_number, $gender, $address);

        if ($stmt->execute()) {
            echo "New account created successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Optional: Handle GET requests or direct access
    echo "No data received. Please submit the form.";
}

$conn->close();
?>