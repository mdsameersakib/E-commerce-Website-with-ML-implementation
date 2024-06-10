<?php
include 'dbconnect.php';
$username=$_POST['username'];
$password_cus=$_POST['password'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
if(empty($username) || empty($password_cus)|| empty($phone)|| empty($email)|| empty($address)) {
  $name_error = "Please give all credentials";
  header("Location: reg_form.php?name_error=$name_error");
  exit();
}
//checking if username or email is already in database
$sql_u="SELECT * FROM customer WHERE cname='$username'";
$sql_e="SELECT * FROM customer WHERE email='$email'";
$res_u = mysqli_query($conn, $sql_u);
$res_e = mysqli_query($conn, $sql_e);
if (mysqli_num_rows($res_u) > 0) {
  $name_error = "Sorry... Username already taken";  
  header("Location: reg_form.php?name_error=$name_error");
  exit();  
} else if(mysqli_num_rows($res_e) > 0){
  $name_error = "Sorry... Email already taken";
  header("Location: reg_form.php?name_error=$name_error");
  exit();
} else {
//inserting data in database
  $sql = "insert into customer(cname,password,phone,email,address) values ('$username','$password_cus','$phone','$email','$address')";
  $result1 = $conn->query($sql);
  if ($result1) {
    // Get the auto-generated customer_id
    $customer_id = $conn->insert_id;}
    $success = "Account Created!! Your ID is " . str_pad($customer_id, 5, '0', STR_PAD_LEFT);

  header("Location: reg_form.php?success=$success");
  exit();
}
$conn->close();
?>
