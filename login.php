<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>   
     <link rel="stylesheet" href="style.css">
</head>
<body>


<form action="login_test.php" method="post">
        <div class="welcome-message">
                <h1><b>WElCOME TO OUR WEBSITE, PLEASE LOGIN..</b></h1>
            </div>
        <label for="userid">User ID:</label>
        <input type="text"  class="box2"s id="userid" name="userid">
        <label for="password">Password:</label>
        <input type="password" class="box2"s id="password" name="password">
        <div style="height: 30px;"></div>
        <input type="submit" class="button-5" style="background-color: slategray; width: 100%;" value="Submit">
        <div style="height: 30px;"></div>
        <?php if(isset($_GET['name_error'])) { ?>
            <h2 id="message"><?php echo $_GET['name_error'] ?></h2>
        <?php } ?>
        <div class="create-account">
            No account? <a href="reg_form.php">Create Account</a>
        </div>
    </form>
</body>
</html>

