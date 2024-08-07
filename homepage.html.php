<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>

    <!-- Link to your external CSS file -->
    <link href="css/styles.css" rel="stylesheet"> <!--header and footer styles-->
    <link href="css/home.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">


</head>
<div id="loader" class="loading">
    <!-- Your loading GIF or animation goes here -->
    <img src="images/eye_layers.gif" alt="Loading...">
</div>
<body>


<header class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-bottom header-visible">
    <!-- Logo and Header Text -->
    <div class="logo">
        <img src="images/Logo%20header.png" alt="Tolksdorf Optometry Logo" class="logo-img">
    </div>

    <!-- Navigation -->
    <div class="nav-center">
        <nav class="nav-container">
            <ul class="nav">
                <li class="nav-item"><a href="homepage.html.php" class="nav-link active" aria-current="page"><b>Home</b></a></li>
                <li class="nav-item"><a href="about%20us.html" class="nav-link active"><b>About us</b></a></li>
                <!-- Dropdown Services item -->
                <li class="nav-item dropdown">
                    <div class="dropdown">
                        <button class="dropbtn nav-link"><b>Services</b></button>
                        <div class="dropdown-content">
                            <a href="services.html">Child Exams</a>
                            <a href="services.html">Diabetic Exams</a>
                            <a href="services.html">Adult & Senior Exams</a>
                            <a href="services.html">Fittings</a>
                            <a href="services.html">Medical Aid</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <div class="dropdown">
                        <button class="dropbtn nav-link"><b>Shop</b></button>
                        <div class="dropdown-content">
                            <a href="shop.html">Prescription Glasses</a>
                            <a href="shop.html#contact-lenses">Contact Lenses</a>
                        </div>
                    </div>
                </li>
                <!-- End of Dropdown Services item -->
                <li class="nav-item dropdown">
                    <div class="dropdown">
                        <button class="dropbtn nav-link"><b>Contact Us</b></button>
                        <div class="dropdown-content">
                            <a href="contact%20us.html">Book an Appointment</a>
                            <a href="contact%20us.html">Enquire</a>
                            <a href="contact%20us.html">Contact Information</a>
                            <a href="contact%20us.html">Location</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item"><a href="blog.html" class="nav-link active"><b>Blog</b></a></li>
            </ul>
        </nav>
    </div>

    <div class="auth-cart">
        <a href="register.html" class="nav-link active login-register"><b>Login/Register</b></a>
        <a href="cart.html" class="nav-link"><img src="images/icons8-fast-cart-24.png" alt="Cart" class="cart-icon"></a>
    </div>
</header>

<hr>
<!-- Intro to the practice-->
<div class="intro-container1">
<div class="Intro">
    <div class="intro-img">
        <img src="images/the%20chair.jpg" alt="opening pic" class="intro-pic">
    </div>
    <div class ="intro-container">
        <h2><b>Welcome to Tolksdorf Optometry</b></h2>
        <br>
        <p>
            For over a decade, Tolksdorf Optometry has been Malvern's go-to practice for comprehensive eye care, particularly specializing in diabetic eye care. Founded by Mr. Jurgen Tolksdorf, the practice has built a reputation for excellence in contact lenses, pediatrics, and binocular vision.
<br>
            In 2019, Ms. Aalia, a graduate of the University of KwaZulu-Natal (UKZN) in Durban, took the helm after being mentored by Mr. Tolksdorf. Together, they boast over 30 years of combined experience. Ms. Aalia's passion for eye health, particularly for diabetic patients, led her to further specialize in this crucial area after her graduation in BSC Honors in Optometry in 2013.
<br>
            This commitment to diabetic eye care, combined with the existing expertise, ensures Tolksdorf Optometry remains at the forefront of vision care solutions in Durban.  They've also introduced popular brands like Ray Ban, PRADA, and Ted Baker, offering a stylish selection alongside their exceptional services.
    </div>

    </div>
</div>
<hr>

<div class="featured">
    <h2>Discover our range of prescription glasses and contact lenses!</h2>
    <br>

    <div class="images">
        <div class="image">
            <img src="images/lenses.jpg" alt="Prescription Spectacles">
            <p>Fashion Frames</p>
            <nav>
                <a href="shop.html" class="nav-products">View</a>
            </nav>
        </div>

        <div class="image">
            <img src="images/eye%20contact%20lenses.png" alt="Contact Lenses">
            <p>Daily Disposables</p>
            <nav>
                <a href="shop.html#contact-lenses" class="nav-products">View</a>
            </nav>
        </div>
    </div>

</div>

<hr>


    <!-- reviews -->
<div class="reviews">


    <div class="container1">
        <h1><b>Book an Appointment:</b></h1><br>
        <form id="appointment-form">
            <div class="form-group">
<br>

            </div>
            <div class="form-container">
                <div class="form-group">
                    <label for="name">Name and Surname:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group" id="reason-group">
                    <label for="reason">Reason for appointment:</label>
                    <input type="text" id="reason" name="reason">
                </div>
                <div class="form-group" id="date-group">
                    <label for="date">Preferred Date:</label>
                    <input type="date" id="date" name="date">
                </div>
                <div class="form-group" id="time-group">
                    <label for="time">Preferred Time (08:00 - 16:00):</label>
                    <input type="time" id="time" name="time" min="08:00" max="16:00">
                </div>
                <div class="form-group" id="enquiry-group" style="display: none;">
                    <label for="enquiry">Enquiry:</label>
                    <textarea id="enquiry" name="enquiry" rows="4"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>


    <!-- footer -->


<div class="footer">
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">

            <div>
                <img src="images/Logo%20header.png" alt="Logo" class="logo-img">
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                </a>
            </div>


            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <!-- Social Media Icons -->
                <li class="ms-3"><a class="text-body-secondary" href="https://www.instagram.com/tolksdorf_optom?igsh=MTl6aGd2MzB6Zzljeg==" target="_blank"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="https://www.facebook.com/share/YwUThYXZpDg9MMRd/?mibextid=qi2Omg" target="_blank"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="https://www.tiktok.com/@tolksdorf.optom?lang=en&is_from_webapp=1&sender_device=mobile&sender_web_id=7374813703915865606" target="_blank"><svg class="bi" width="24" height="24"><use xlink:href="#tiktok"/></svg></a></li>
            </ul>

            <div class="map-container">
                <a href="https://www.google.com/maps/place/TOLKSDORF+OPTOMETRIST/@-29.8815146,30.9190293,15z/data=!4m6!3m5!1s0x1ef7aabd8f8ec467:0x4c2b4e3e2295918d!8m2!3d-29.8815146!4d30.9190293!16s%2Fg%2F1pzrnv89q?entry=ttu" target="_blank">
                    <img src="images/optom%20map.png" width="200" height="auto" class="map-button" alt="">
                </a>
            </div>
        </footer>
    </div>

    <div class="container">
        <footer class="py-3 my-4">
            <!-- Navigation Links -->
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Privacy Policy</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Copy Right</a></li>
                <li class="nav-item"><a href="contact%20us.html" class="nav-link px-2 text-body-secondary">Contact Us</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sign in</a></li>
            </ul>
            <!-- Map Image -->

         <!--   <p class="text-center text-body-secondary">&copy; 2024 Company, Inc</p> -->
        </footer>
    </div>
</div>
<!-- Include Bootstrap Icons SVG -->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="bootstrap" viewBox="0 0 118 94">
        <title>Footer</title>
    </symbol>
    <symbol id="facebook" viewBox="0 0 16 16">
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
    </symbol>
    <symbol id="instagram" viewBox="0 0 16 16">
        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
    </symbol>
    <symbol id="tiktok" viewBox="0 0 449.45 515.38">
    <path fill-rule="nonzero" d="M382.31 103.3c-27.76-18.1-47.79-47.07-54.04-80.82-1.35-7.29-2.1-14.8-2.1-22.48h-88.6l-.15 355.09c-1.48 39.77-34.21 71.68-74.33 71.68-12.47 0-24.21-3.11-34.55-8.56-23.71-12.47-39.94-37.32-39.94-65.91 0-41.07 33.42-74.49 74.48-74.49 7.67 0 15.02 1.27 21.97 3.44V190.8c-7.2-.99-14.51-1.59-21.97-1.59C73.16 189.21 0 262.36 0 352.3c0 55.17 27.56 104 69.63 133.52 26.48 18.61 58.71 29.56 93.46 29.56 89.93 0 163.08-73.16 163.08-163.08V172.23c34.75 24.94 77.33 39.64 123.28 39.64v-88.61c-24.75 0-47.8-7.35-67.14-19.96z"/>
    </symbol>
</svg>

    <!-- end of footer -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Remove the loading screen after everything is loaded
        var loader = document.getElementById('loader');
        setTimeout(function () {
            loader.style.display = 'none';
        }, 500); // Adjust timeout as needed
    });

    function validateForm() {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var reason = document.getElementById('reason').value;
        var date = document.getElementById('date').value;
        var time = document.getElementById('time').value;

        // Check if any field is empty
        if (!name || !email || !phone || !reason || !date || !time) {
            alert("All fields must be filled out");
            return false; // Prevent form submission
        }

        return true; // Allow form submission if all fields are valid
    }

    // Attach the validation function to the form's submit event
    document.getElementById('bookingForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission
        if (!validateForm()) {
            return; // Exit if validation fails
        }
        // Proceed with form submission or further actions
        alert("Thank you! We will be in touch soon.");
    });


</script>

<!-- Include JavaScript files -->
<script src="bootstrap.min.js"></script>
<script src="bootstrap.bundle.min.js.map"></script>
<?php
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $reason = htmlspecialchars($_POST['reason']);
        $date = htmlspecialchars($_POST['date']);
        $time = htmlspecialchars($_POST['time']);

        $to = "mokaka821@gmail.com"; // Replace with the optometry email address
        $subject = "New Appointment Booking";
        $message = "Name: $name \nEmail: $email \nPhone: $phone \nReason for Appointment: $reason \nPreferred Date: $date \nPreferred Time: $time";
        $headers = "From: $email";

        if (mail($to, $subject, $message, $headers)) {
            echo "<script>alert('Your appointment request has been sent successfully.');</script>";
} else {
echo "<script>alert('Failed to send your appointment request. Please try again.');</script>";
}
}
?>

</body>
</html>
