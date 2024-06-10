<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div style="margin-right: 80px;">
            <h1>Create New Account </h1>
    </div>
    <br>
    <div>
    <form action="test.php" method="post">
    <label for="username">Username:</label>
            <input type="text" class="box2" id="username" name="username">
            <label for="password">Password:</label>
            <input type="password" class="box2" id="password" name="password">
            <br>
            <label for="phone">Phone Number:</label>
            <input type="tel" class="box2" id="phone" name="phone">
            <label for="email">Email:</label>
            <input type="email" class="box2" id="email" name="email">
            <br>
            <label for="address">Home Address:</label>
            <input type="text" class="box2" style=" width:70%;" id="address" name="address">
            <br>
            <input type="submit" class="button-5" style="background-color: slategray; width: 100%;" value="Submit">
    <?php if(isset($_GET['name_error'])) { ?>
        <h2 id="message"><?php echo $_GET['name_error'] ?></h2>
    <?php } ?>
    <?php if(isset($_GET['success'])) { ?>
        <h2 class="message1" id="message1"><?php echo $_GET['success'] ?></h2>
        <script>
            setTimeout(function() {
                window.location.href = "login.php";
            }, 2000); // Redirect to login.php after 2 seconds
        </script>
    <?php } ?>
    </form>
    </div>

</body>
</html>
