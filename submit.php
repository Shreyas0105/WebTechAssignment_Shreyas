<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve data
    $fullname = htmlspecialchars(strip_tags($_POST['fullname']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $phone = htmlspecialchars(strip_tags($_POST['phone']));
    $address = htmlspecialchars(strip_tags($_POST['address']));
    $course = htmlspecialchars(strip_tags($_POST['course']));

    // Simulate processing delay (optional)
    // sleep(1);

    // Prepare HTML output
    $output = "<h3>Registration Successful!</h3>";
    $output .= "<p>Thank you for registering. Here are your details:</p><br>";
    
    $output .= "<div class='result-item'><strong>Name:</strong> " . $fullname . "</div>";
    $output .= "<div class='result-item'><strong>Email:</strong> " . $email . "</div>";
    $output .= "<div class='result-item'><strong>Phone:</strong> " . $phone . "</div>";
    $output .= "<div class='result-item'><strong>Address:</strong> " . nl2br($address) . "</div>";
    $output .= "<div class='result-item'><strong>Course:</strong> " . ucfirst(str_replace('-', ' ', $course)) . "</div>";

    echo $output;
} else {
    echo "Invalid Request";
}
?>
