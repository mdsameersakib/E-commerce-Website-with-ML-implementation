<?php

    // Include database connection file
    include 'dbconnect.php';
     // Exclude products with order_id assigned
    $customer_id = $_GET['customer'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund</title>
    <link rel="stylesheet" href="menustyle.css">
    <script src="https://kit.fontawesome.com/d3eca7cd97.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

</head>

<body>
    <section class="body">
        <header class="header">
            <div class="logo">
                <span class="logotext"><i class="fa-solid fa-holly-berry"></i></span>
            </div>

            <div class="menu_icon">
                <i class="fa-solid fa-bars"></i>
            </div>

            <nav class="navbar">
                <a href="menu.php?userid=<?php echo  $customer_id; ?>">Menu</a>
                
                <div class="dropdown">
                    <a href="">Categories</a>
                    <div class="dropdown-content">
                      <a href="category_electronics.php?userid=<?php echo  $customer_id; ?>">Electronics</a>
                      <a href="category_accessories.php?userid=<?php echo  $customer_id; ?>">Accessories</a>
                      <a href="category_clothes.php?userid=<?php echo  $customer_id; ?>">Clothes</a>
                      <a href="category_stationery.php?userid=<?php echo  $customer_id; ?>">Stationery</a>
                      <a href="category_selfcare.php?userid=<?php echo  $customer_id; ?>">Self Care</a>
                      <a href="category_healthcare.php?userid=<?php echo  $customer_id; ?>">Health Care</a>
                      <a href="category_food.php?userid=<?php echo  $customer_id; ?>">Food Items</a>
                      <a href="category_household.php?userid=<?php echo  $customer_id; ?>">Household</a>
                    </div>
                  </div>
            </nav>

            <div class="nav_icon">
                <a href="wishlist.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-heart"></i></a>
                <a href="cart.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="profile.php?customer=<?php echo $customer_id; ?>"><i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <div class="cart-container">
            <div class="gap"></div>
            <h1 class="title">Upload image of the product</h1>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <main class="main_full">
                <div class="container2">
                    <div class="panel">
                        <div class="button_outer">
                            <div class="btn_upload">
                                <input type="file" id="upload_file" name="">
                                Upload Image
                            </div>
                            <div class="processing_bar"></div>
                            <div class="success_box"></div>
                        </div>
                    </div>
                    <div class="error_msg"></div>
                    <div class="uploaded_file_view" id="uploaded_view">
                        <span class="file_remove">X</span>
                    </div>
                </div>
                <div ><h1 class="title">Cause of refund</h1></div>
                <div><textarea class="refund_text" name="" id="" cols="100" rows="10"></textarea></div>
                <div style="width: 10%; margin: auto;"><button class="button-5" >Submit</button></div>
                <div class="gap"></div>
                
            </main>

        </div>

    </section>
    <script>
   $(document).ready(function() {
    var btnUpload = $("#upload_file"),
        btnOuter = $(".button_outer");

    // Function to handle image upload
    btnUpload.on("change", function(e) {
        var ext = btnUpload.val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            $(".error_msg").text("Not an Image...");
        } else {
            $(".error_msg").text("");
            btnOuter.addClass("file_uploading");
            setTimeout(function() {
                btnOuter.addClass("file_uploaded");
            }, 3000);
            var reader = new FileReader(); // Create a FileReader object
            reader.onload = function(event) {
                var uploadedFile = event.target.result; // Get the data URL
                setTimeout(function() {
                    $("#uploaded_view").append('<img src="' + uploadedFile + '" />').addClass("show");
                }, 500);
            };
            reader.readAsDataURL(e.target.files[0]); // Read the file as data URL
        }
    });

    // Function to handle removing uploaded image
    $(".file_remove").on("click", function(e) {
        $("#uploaded_view").removeClass("show");
        $("#uploaded_view").find("img").remove();
        btnOuter.removeClass("file_uploading");
        btnOuter.removeClass("file_uploaded");
    });

    // Function to handle form submission
    $(".button-5").on("click", function() {

        var product_id = "<?php echo $_GET['product_id']; ?>"; 
        var order_id ="<?php echo $_GET['order_id']; ?>"; 
        var customer_id = "<?php echo $customer_id; ?>"; 
        var reason = $(".refund_text").val(); 
        var fileInput = $("#upload_file")[0].files[0]; // Get the file from the file input
        var formData = new FormData(); // Create FormData object // Append other form data
        formData.append('product_id', product_id); // Append other form data
        formData.append('customer_id', customer_id);
        formData.append('reason', reason);
        formData.append('order_id', order_id);
        // Convert the image file to a Blob
        var reader = new FileReader();
        reader.onload = function(event) {
            var blob = new Blob([event.target.result], { type: fileInput.type });
            formData.append('img', blob, fileInput.name); // Append the Blob
            // Send data to another PHP file using AJAX
            $.ajax({
                url: 'process_refund.php',
                type: 'POST',
                data: formData, // Use FormData object
                contentType: false, // Set contentType to false when sending FormData
                processData: false, // Set processData to false when sending FormData
                success: function(response) {
                    // Handle success response
                    alert(response); // Example: Display response from process_refund.php
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        };
        reader.readAsArrayBuffer(fileInput); // Read the file as ArrayBuffer
    });
});


</script>
</body>

</html>