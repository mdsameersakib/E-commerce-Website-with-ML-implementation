<?php
include 'dbconnect.php';
$userid = $_POST['userid'];
$password_cus = $_POST['password'];

if (empty($userid) || empty($password_cus)) {
    $name_error = "Please provide both Username and Password";
    header("Location: login.php?name_error=$name_error");
    exit();
}

$len = strlen($userid);

if ($len == 5) {
    $sql_u = "SELECT * FROM customer WHERE customer_id='$userid'";
    $sql_p = "SELECT password FROM customer WHERE customer_id='$userid'";
    $res_u = mysqli_query($conn, $sql_u);
    $res_p = mysqli_query($conn, $sql_p);
    
    if (mysqli_num_rows($res_u) > 0) {
        $row = mysqli_fetch_assoc($res_p);
        if ($row['password'] == $password_cus) { 
            header("Location: menu.php?userid=$userid"); // Redirect to the home page
            exit();
        } else {
            $name_error = "Password Invalid";
            header("Location: login.php?name_error=$name_error");
            exit();
        }
    } else {
        $name_error = "UserID Invalid";
        header("Location: login.php?name_error=$name_error");
        exit();
    }
} else {
    $emp_sql_u = "SELECT * FROM employee WHERE employee_id='$userid'";
    $emp_sql_p = "SELECT password FROM employee WHERE employee_id='$userid'";
    $emp_res_u = mysqli_query($conn, $emp_sql_u);
    $emp_res_p = mysqli_query($conn, $emp_sql_p);
    
    if (mysqli_num_rows($emp_res_u) > 0) {
        $row = mysqli_fetch_assoc($emp_res_p);
        if ($row['password'] == $password_cus) { 
            header("Location: employee_menu.php?userid=$userid"); // Redirect to the home page
            exit();
        } else {
            $name_error = "Password Invalid";
            header("Location: login.php?name_error=$name_error");
            exit();
        }
    } else {
        $name_error = "UserID Invalid";
        header("Location: login.php?name_error=$name_error");
        exit();
    }   
}
?>
