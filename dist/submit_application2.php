<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = htmlspecialchars($_POST['full-name']);
    $email = htmlspecialchars($_POST['email']);
    $organization = htmlspecialchars($_POST['organization']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = 'info@rw.Andersen.com'; // Your email address
    $subjectToAdmin = 'New Contact Form Submission';
    $messageToAdmin = "You have received a new message from the contact form:\n\n".
        "Full Name: $fullName\n".
        "Email: $email\n".
        "Organization: $organization\n".
        "Phone: $phone\n".
        "Subject: $subject\n".
        "Message:\n$message";
    $headersToAdmin = "From: info@rw.Andersen.com\r\nReply-To: info@rw.Andersen.com\r\n";
    
    // Send notification to admin
    if (mail($to, $subjectToAdmin, $messageToAdmin, $headersToAdmin)) {
        // Send acknowledgment to visitor
        $subjectToVisitor = 'Thank You for Your Message';
        $messageToVisitor = "Dear $fullName,\n\n".
            "Thank you for contacting us. We have received your message and will get back to you soon.\n\n".
            "Kind regards,\n".
            "Andersen Rwanda";
        $headersToVisitor = "From: info@rw.Andersen.com\r\nReply-To: info@rw.Andersen.com\r\n";
        
        mail($email, $subjectToVisitor, $messageToVisitor, $headersToVisitor);
        
        // Redirect to thank_you_careers.html
        header("Location: thank_you_careers.html");
        exit();
    } else {
        echo "error";
    }
} else {
    echo "Invalid request.";
}
?>
