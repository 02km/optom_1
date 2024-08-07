<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $address2 = htmlspecialchars($_POST['address2']);
    $country = htmlspecialchars($_POST['country']);
    $state = htmlspecialchars($_POST['state']);
    $zip = htmlspecialchars($_POST['zip']);
    $sameAddress = isset($_POST['same-address']) ? "Yes" : "No";
    $saveInfo = isset($_POST['save-info']) ? "Yes" : "No";

    // Example: Send email to shop
    $shopEmail = "mokaka821@gmail.com";
    $subject = "New Order - Customer Information";
    $message = "New order details:\n\n";
    $message .= "Name: $firstName $lastName\n";
    $message .= "Email: $email\n";
    $message .= "Billing Address: $address, $address2, $country, $state, $zip\n";
    $message .= "Shipping Address Same as Billing: $sameAddress\n";
    $message .= "Save Info for Next Time: $saveInfo\n";

    // Send email to shop
    mail($shopEmail, $subject, $message);

    // Example: Send confirmation email to customer
    $customerEmail = $email;
    $subject = "Order Confirmation";
    $message = "Dear $firstName,\n\n";
    $message .= "Thank you for your order!\n";
    $message .= "Here are your order details:\n\n";
    $message .= "Billing Address: $address, $address2, $country, $state, $zip\n";
    $message .= "Shipping Address Same as Billing: $sameAddress\n";
    $message .= "Save Info for Next Time: $saveInfo\n";

    // Send email to customer
    mail($customerEmail, $subject, $message);

    // Redirect back to checkout page or show a confirmation message
    header("Location: checkout_confirmation.php");
    exit();
}

?>