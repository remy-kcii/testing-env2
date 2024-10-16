<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturing the form inputs using the correct field names
    $fullName = htmlspecialchars($_POST['full_name']); // Matches the form field name
    $email = htmlspecialchars($_POST['email']);
    $organization = htmlspecialchars($_POST['organization']); // Matches the form field name
    $phone = htmlspecialchars($_POST['phone']); // Matches the form field name
    $subject = htmlspecialchars($_POST['subject']); // Matches the form field name
    $message = htmlspecialchars($_POST['message']); // Matches the form field name
    
    // Your email address to receive the submission
    $to = 'info@rw.Andersen.com';
    $subjectToAdmin = 'New Contact Form Submission';
    
    // Message to be sent to the admin
    $messageToAdmin = "You have received a new contact form submission:\n\n".
        "Full Name: $fullName\n".
        "Email: $email\n".
        "Organization: $organization\n".
        "Phone Number: $phone\n".
        "Subject: $subject\n".
        "Message:\n$message\n";
    
    // Admin email headers
    $headersToAdmin = "From: info@rw.Andersen.com\r\nReply-To: info@rw.Andersen.com\r\n";
    
    // Send notification to admin
    if (mail($to, $subjectToAdmin, $messageToAdmin, $headersToAdmin)) {
        // Acknowledgment email to the visitor
        $subjectToVisitor = 'Thank You for Your Inquiry';
        $messageToVisitor = "Dear $fullName,\n\n".
            "Thank you for contacting us. We have received your message and will get back to you shortly.\n\n".
            "Kind regards,\n".
            "Andersen Rwanda";
        $headersToVisitor = "From: info@rw.Andersen.com\r\nReply-To: info@rw.Andersen.com\r\n";
        
        // Send acknowledgment email
        mail($email, $subjectToVisitor, $messageToVisitor, $headersToVisitor);
        
        // Redirect to thank you page
        header("Location: thank_you_contact.html");
        exit();
    } else {
        echo "There was an error submitting your message. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
