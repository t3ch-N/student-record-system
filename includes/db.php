<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'student_db');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

// Site configuration
define('SITE_NAME', 'Student Record Management System');
define('SITE_URL', 'http://localhost/student-record-system');

// Session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Helper functions
function sanitize($data) {
    global $conn;
    return $conn->real_escape_string(trim(stripslashes(htmlspecialchars($data))));
}

function is_admin_logged_in() {
    return isset($_SESSION['admin_id']);
}

function redirect($url) {
    header("Location: " . $url);
    exit();
}

function calculate_grade($marks) {
    if ($marks >= 90) return 'A+';
    if ($marks >= 80) return 'A';
    if ($marks >= 70) return 'B+';
    if ($marks >= 60) return 'B';
    if ($marks >= 50) return 'C';
    if ($marks >= 40) return 'D';
    return 'F';
}
?>
