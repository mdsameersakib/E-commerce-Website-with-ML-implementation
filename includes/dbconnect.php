<?php
require_once __DIR__ . '/config.php';

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Global Authentication & Authorization Protection
$current_script = basename($_SERVER['SCRIPT_NAME']);
$public_scripts = ['login.php', 'login_test.php', 'register.php', 'reg_form.php', 'index.php', 'homepage.php'];

if (!in_array($current_script, $public_scripts)) {
    // 1. Force Login Check
    if (!isset($_SESSION['userid'])) {
        $path_prefix = (strpos($_SERVER['REQUEST_URI'], '/employee/') !== false || 
                        strpos($_SERVER['REQUEST_URI'], '/admin/') !== false || 
                        strpos($_SERVER['REQUEST_URI'], '/categories/') !== false || 
                        strpos($_SERVER['REQUEST_URI'], '/actions/') !== false || 
                        strpos($_SERVER['REQUEST_URI'], '/ml/') !== false) ? "../" : "";
        header("Location: " . $path_prefix . "login.php?name_error=" . urlencode("Access Denied: Please Login"));
        exit();
    }

    // 2. Role-based Directory Protection
    if (strpos($_SERVER['REQUEST_URI'], '/employee/') !== false || strpos($_SERVER['REQUEST_URI'], '/admin/') !== false) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {
            header("HTTP/1.1 403 Forbidden");
            die("Access Denied: Employee Role Required");
        }
    }

    // 3. Prevent IDOR (Ensure request ID matches logged-in user session)
    $request_id = $_GET['userid'] ?? $_POST['userid'] ?? $_POST['customer_id'] ?? $_POST['employee_id'] ?? $_GET['customer'] ?? $_POST['customer'] ?? null;
    if ($request_id !== null && $_SESSION['userid'] !== $request_id) {
        $path_prefix = (strpos($_SERVER['REQUEST_URI'], '/employee/') !== false || 
                        strpos($_SERVER['REQUEST_URI'], '/admin/') !== false || 
                        strpos($_SERVER['REQUEST_URI'], '/categories/') !== false || 
                        strpos($_SERVER['REQUEST_URI'], '/actions/') !== false || 
                        strpos($_SERVER['REQUEST_URI'], '/ml/') !== false) ? "../" : "";
        header("Location: " . $path_prefix . "login.php?name_error=" . urlencode("Access Denied: Unauthorized ID"));
        exit();
    }
}
?>